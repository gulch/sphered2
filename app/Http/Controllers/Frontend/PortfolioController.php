<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Item;
use App\Type;
use App\Category;
use DB;

class PortfolioController extends Controller
{
    public function showPortfolio($type = null, $category = null)
    {
        return view('frontend.gallery.portfolio', $this->getGalleryData($type, $category, 1));
    }

    public function showGallery($type = null, $category = null)
    {
        return view('frontend.gallery.gallery', $this->getGalleryData($type, $category, 0));
    }

    public function showWork($type, $category, $slug)
    {
        return view('frontend.gallery.work', $this->getWorkData($type, $category, $slug));
    }

    private function getGalleryData($type_slug = null, $category_slug = null, $is_commercial = 0)
    {
        $data = array();
        $items = Item::with('itemType', 'itemCategory')->where('is_commercial', $is_commercial);

        if ($type_slug) {
            $type = Type::where('url_segment', $type_slug)->firstOrFail();
            $data['selected_type'] = $type;
            $items->where('id__Type', $type->id);
            $data['categories'] = $this->getAllIssetItemCategories($type->id, $is_commercial);

            if ($category_slug) {
                $category = Category::where('url_segment', $category_slug)->firstOrFail();
                $data['selected_category'] = $category;
                $items->where('id__Category', $category->id);
            }
        }

        $data['types'] = $this->getAllIssetItemTypes($is_commercial);
        $data['items'] = $items->latest()->get();

        return $data;
    }

    private function getAllIssetItemCategories($type_id, $is_commercial = 0)
    {
        return DB::select('SELECT DISTINCT c.id, c.title, c.url_segment
                           FROM Item as i
                           INNER JOIN Category as c ON c.id = i.id__Category
                           WHERE i.id__Type = ?
                             AND i.is_commercial = ?', [$type_id, $is_commercial]);
    }

    private function getAllIssetItemTypes($is_commercial = 0)
    {
        return DB::select('SELECT DISTINCT t.id, t.title, t.url_segment
                           FROM Item as i
                           INNER JOIN Type as t ON t.id = i.id__Type
                           WHERE i.is_commercial = ?', [$is_commercial]);
    }

    private function getWorkData($type_slug, $category_slug, $slug)
    {
        $data = array();

        $item = Item::with('itemType', 'itemCategory')
            ->where('url_segment', $slug)
            ->firstOrFail();

        if($type_slug !== $item->itemType->url_segment) {
            abort(404);
        }

        if($category_slug !== $item->itemCategory->url_segment) {
            abort(404);
        }

        $data['similar_items'] = Item::with('itemType', 'itemCategory')
            ->where('url_segment', '<>', $item->url_segment)
            ->where('id__Type', $item->id__Type)
            ->take(3)
            ->orderBy(DB::raw('RAND()'))
            ->get();

        $data['item'] = $item;

        return $data;
    }
}
