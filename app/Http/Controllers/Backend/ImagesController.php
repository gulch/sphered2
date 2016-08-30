<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Image;
use App\Article;
use Intervention\Image\ImageManagerStatic as InterventionImage;

class ImagesController extends Controller
{
    public function index()
    {
        return view('backend.images.list');
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        if (is_null($image)) {
            return $this->jsonResponse(['message' => 'Изображение не найдено']);
        } else {
            $article = Article::where('image_id', $image->id)->first();
            if (!is_null($article)) {
                return json_encode(['message' => 'Это изображение используется в статье блога "' . $article->title . '". Пока изображение привязано к какой либо статье блога, вы не сможете его удалить.']);
            }

            self::removeImageFile($image->path);

            /* Save original file but rename with prefix "REMOVED_" */
            $original_filepath = public_path() . config('app.original_image_upload_path');
            @rename($original_filepath . $image->path, $original_filepath . 'REMOVED_' . $image->path);

            /* Delete from DB */
            if (!$image->delete()) {
                return $this->jsonResponse(['message' => 'Не удалось удалить изображение']);
            }
        }

        return json_encode(['success' => 'ok']);
    }

    public function upload()
    {
        return json_encode($this->doUploadImage());
    }

    public function uploadAndCreate()
    {
        $result = $this->doUploadImage();
        if (isset($result['path'])) {
            $image = Image::create([
                'path' => $result['path'],
                'type' => $result['type']
            ]);

            if (isset($image->id)) {
                $result['id'] = $image->id;
            }
        }

        return $this->jsonResponse($result);
    }

    private function doUploadImage()
    {
        $result_array = [];
        if ($this->request->get('key')) {
            $result_array['key'] = $this->request->get('key');
        }
        if ($this->request->hasFile('image') || $this->request->hasFile('file')) {
            $image = $this->request->hasFile('image') ? $this->request->file('image') : $this->request->file('file');
            if ($image->isValid()) {
                $filename = $this->addUniqueID($image->getClientOriginalName());

                $filepath_original = self::getFilePath('app.original_image_upload_path');
                if ($image->move($filepath_original, $filename)) {
                    $this->createThumbImage($filepath_original, $filename);
                    $result_array['filelink'] = self::getFileLink('app.thumb_image_upload_path', $filename);

                    if ($setup = $this->request->get('setup')) {
                        switch ($setup) {
                            case 'post':
                                $this->createPostImage($filepath_original, $filename);
                                break;

                            case 'editor':
                                $this->createEditorImage($filepath_original, $filename);
                                $result_array['link'] = self::getFileLink('app.editor_image_upload_path', $filename);
                                break;
                        }
                    }

                    $result_array['success'] = 'OK';
                    $result_array['path'] = date('/Y/m/') . $filename;
                    $result_array['type'] = $setup;
                } else {
                    $result_array['message'] = 'Не могу переместить изображение в папку. Проверьте права доступа к папкам';
                }
            } else {
                $result_array['message'] = 'Неверный формат изображения';
            }
        } else {
            $result_array['message'] = 'Изображение не найдено';
        }

        return $result_array;
    }

    private function manipulateImagebyInvervention(
        $filepath_original,
        $filepath_new,
        $filename,
        $width,
        $height = null,
        $crop = false,
        $quality = 80
    ) {
        $ii = InterventionImage::getManager();
        $ii->configure(['driver' => 'imagick']);
        $img = $ii->make($filepath_original . $filename);
        if ($img) {

            if ($width && $height) {
                if (($img->height() / $img->width()) < ($height / $width)) {
                    $img->resize(null, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        /*$constraint->upsize();*/
                    });
                } else {
                    $img->resize($width, null, function ($constraint) {
                        $constraint->aspectRatio();
                        /*$constraint->upsize();*/
                    });
                }
                if ($crop) {
                    $img->crop($width, $height);
                }
            } else {
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            /* Optimizations */
            $img->getCore()->stripImage();
            //$img->getCore()->setImageProperty('jpeg:sampling-factor', '4:4:1');

            // if image format is PNG
            if(pathinfo($filepath_original . $filename, PATHINFO_EXTENSION) === 'png') {
                $img->encode('png');
                $img->getCore()->setOption('png:compression-filter', '5');
                $img->getCore()->setOption('png:compression-level', '9');
                $img->getCore()->setOption('png:compression-strategy', '1');
                $img->getCore()->setOption('png:exclude-chunk', 'all');
            } else {
                $img->interlace(true);
            }

            $img->save($filepath_new . $filename, $quality);
        }
    }

    /*
     * Post Image
     */
    private function createPostImage($filepath_original, $filename)
    {
        $filepath = self::getFilePath('app.post_image_upload_path');
        $this->manipulateImagebyInvervention($filepath_original, $filepath, $filename, 770, null, false);
    }

    /*
     * Thumb Image
     */
    private function createThumbImage($filepath_original, $filename)
    {
        $filepath_small = self::getFilePath('app.thumb_image_upload_path');
        $this->manipulateImagebyInvervention($filepath_original, $filepath_small, $filename, 175, 130, true);
    }

    /*
     * Editor Image
     */
    private function createEditorImage($filepath_original, $filename)
    {
        $filepath = self::getFilePath('app.editor_image_upload_path');
        $this->manipulateImagebyInvervention($filepath_original, $filepath, $filename, 770, null, false);
    }

    private function addUniqueID($filename)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $name = pathinfo($filename, PATHINFO_FILENAME);

        if (strlen($name) > 100) {
            $name = substr($name, 0, 100);
        }

        return strtolower(str_slug($name) . '-' . uniqid() . '.' . $ext);
    }

    public static function getFilePath($type_path, $prefix = null)
    {
        if (!$prefix) {
            $prefix = date('/Y/m/');
        }
        $file_path = public_path() . config($type_path) . $prefix;

        if (!file_exists($file_path)) {
            mkdir($file_path, 750, true);
        }

        return $file_path;
    }

    public static function getFileLink($type_path, $filename)
    {
        return url('/') . config($type_path) . date('/Y/m/') . $filename;
    }

    public static function removeImageFile($path)
    {
        @unlink(public_path() . config('app.thumb_image_upload_path') . $path);
        @unlink(public_path() . config('app.post_image_upload_path') . $path);
    }
}
