<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Page;
use App\Gallery;
use App\Type;
use App\Category;
use DB;

class PortfolioController extends Controller
{
    public function showPortfolioRUS($type = null, $category = null)
    {
        return view('frontend.portfolio', $this->getGalleryData('RUS', $type, $category, 1));
    }

    public function showGalleryRUS($type = null, $category = null)
    {
        return view('frontend.gallery', $this->getGalleryData('RUS', $type, $category, 0));
    }

    public function showWorkRUS($type, $category, $slug)
    {
        return view('frontend.work', $this->getWorkData($type, $category, $slug, 'RUS'));
    }

    public function getGalleryData(
        $lang = 'RUS',
        $type = null,
        $category = null,
        $is_commercial = 0,
        $limit_skip = 0,
        $limit_count = 25
    ) {
        $where_raw = ' is_commercial = ' . $is_commercial . ' AND show_in_gallery = 1 ';
        if ($type) {
            $type_id = Type::where('url_segment', $type)->firstOrFail()->id;
            $where_raw .= ' AND id__Type = ' . $type_id;
        } else {
            $type = '';
        }

        if ($category) {
            $where_raw .= ' AND id__Category = ' . Category::where('url_segment', $category)->firstOrFail()->id;
        } else {
            $category = '';
        }

        $categories = null;
        if (isset($type_id)) {
            $categories = $this->getAllIssetGalleryItemCategories($type_id, $is_commercial);
        }

        $data = Array();
        $data['categories'] = $categories;
        $data['types'] = $this->getAllIssetGalleryItemTypes($is_commercial);
        $data['selected_type'] = $type;

        $data['gallery_items'] = $this->getGalleryItems($lang, $where_raw, $limit_skip, $limit_count);

        /*$data['pageMetadata'] = $this->getPageMetaData();*/

        return $data;
    }

    public function getGalleryItems($lang, $where_raw, $limit_skip = 0, $limit_count = 25)
    {
        return Gallery::with('item' . $lang, 'itemType', 'itemCategory')
            ->whereRaw($where_raw)
            ->take($limit_count)
            ->skip($limit_skip)
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function getAllIssetGalleryItemCategories($type_id = null, $is_commercial = 0)
    {
        if ($type_id) {
            return Gallery::with('itemCategory')
                ->whereRaw(' id__Type =  ? AND is_commercial = ? ', array($type_id, $is_commercial))
                ->groupBy('id__Category')
                ->get();

            $items = Gallery::whereRaw(' id__Type =  ? AND is_commercial = ? ', array($type_id, $is_commercial))
                ->select('id__Category')
                ->groupBy('id__Category')
                ->get();

            if (sizeof($items)) {
                $g = array();
                foreach ($items as $item) {
                    $g[] = $item->category_id;
                }
                return GalleryCategory::with('itemCategory')
                    ->whereRaw(' id IN ( ' . implode(' , ', $g) . ' ) ')
                    ->get();
            }

        }
        return Gallery::with('itemCategory')
            ->groupBy('id__Category')
            ->get();
    }

    public function getAllIssetGalleryItemTypes($is_commercial = 0)
    {
        return Gallery::with('itemType')
            ->where('is_commercial', $is_commercial)
            ->groupBy('id__Type')
            ->get();
    }

    private function getCategoryTitleBySlug($slug)
    {
        return GalleryCategory::with('GalleryCategoryRUS')
            ->where('url_segment', $slug)
            ->first();
    }

    private function getWorkData($type, $category, $slug, $lang = 'RUS')
    {
        if ($type && $category && $slug) {
            $data = array();
            $data['pageMetadata'] = $this->getPageMetaData();
            $data['item'] = Gallery::with('item'.$lang, 'itemType', 'itemType'.$lang, 'itemCategory', 'itemCategory'.$lang)
                ->where('url_segment', '=', $slug)
                ->firstOrFail();

            $where_raw = ' show_in_gallery = 1 AND url_segment <> "' . $slug . '"';
            if ($type) {
                $type_id = GalleryType::where('url_segment', $type)->firstOrFail()->id;
                $where_raw .= ' AND id__Type = ' . $type_id;
            } else {
                $type = '';
            }
            $data['similar_items'] = Gallery::with('item' . $lang, 'itemType', 'itemCategory')
                ->whereRaw($where_raw)
                ->take(3)
                ->skip(0)
                ->orderBy(DB::raw('RAND()'))
                ->get();

            return $data;
        }
    }
}
