<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(12);

        return view('backend.articles.list', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create', ['tags' => Tag::lists('title', 'id')]);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        Session::put('url.intended', url(URL::previous()));
        $tags = Tag::lists('title', 'id');

        return view('backend.articles.edit', compact('article', 'tags'));
    }

    public function update($id)
    {
        return $this->saveArticle($id, $this->request);
    }

    public function store()
    {
        return $this->saveArticle(null, $this->request);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            return json_encode(['message' => 'Record not found']);
        } else {
            $article->tags()->sync([]);
            $article->delete();
        }

        return json_encode(['success' => 'ok']);
    }

    public function publish($id)
    {
        return $this->changePublishStatus($id, 1);
    }

    public function unpublish($id)
    {
        return $this->changePublishStatus($id, 0);
    }

    private function saveArticle($id)
    {
        if (!$id) {
            $id = $this->request->get('id');
        }
        $validation = $this->validateData($this->request, $id);

        if ($validation['success']) {
            $validation['message'] = '<i class="ui green check icon"></i>Сохранено';
            if ($this->request->get('do_redirect')) {
                $validation['redirect'] = Session::pull('url.intended',
                    url(config('app.admin_segment_name') . '/articles'));
            }

            if ($id) {
                $article = Article::findOrFail($id);
            } else {
                $article = new Article;
                $article->save();
            }

            $validation['id'] = $article->id;

            $article->update($this->request->all());

            $article_tags = $this->request->get('article_tags');
            if (is_null($article_tags)) {
                $article_tags = [];
            }
            $article->tags()->sync($article_tags);
        }

        return $validation;
    }

    private function validateData($request, $id = null)
    {
        $v = Validator::make($request->all(), [
            'slug' => 'required|unique:Article,slug,' . $id . ',id',
            'title' => 'required'
        ]);

        $data = [];

        if ($v->fails()) {
            $data['success'] = 0;
            $data['message'] = '<ul>';
            $messages = $v->errors()->all();
            foreach ($messages as $m) {
                $data['message'] .= '<li>' . $m . '</li>';
            }
            $data['message'] .= '</ul>';
        } else {
            $data['success'] = 1;
        }

        return $data;
    }

    private function changePublishStatus($id, $status)
    {
        $article = Article::find($id);

        if (is_null($article)) {
            return json_encode(['message' => 'Record not found']);
        } else {
            $article->is_published = $status;
            if ($status) {
                // проверяем все ли заполнено для публикации
                $messages = [];
                if (!$article->seo_title || !$article->seo_description || !$article->seo_keywords) {
                    $messages[] = '<li>Не все SEO поля заполнены</li>';
                }
                if ($article->id__Image && !$article->image->alt) {
                    $messages[] = '<li>Отсутствует описание для главного изображения статьи для блога</li>';
                }
                if ($messages) {
                    $messages = '<ul>' . implode('', $messages) . '</ul>';
                    return json_encode(['message' => $messages]);
                }
            }
            $article->save();
        }

        return json_encode(['success' => 'ok']);
    }
}
