<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Item;

class MainController extends Controller
{
    public function showPage($page_name = null)
    {
        $data = array();

        if (!$page_name) {
            // if $page_name is NULL - this is INDEX page
            $page_name = 'index';
            
            $data['works'] = $this->getIndexPageItems();
        }

        $view_name = 'frontend.pages.' . $page_name;
        if (!view()->exists($view_name)) {
            abort(404);
        }

        return view($view_name, $data);
    }

    private function getIndexPageItems()
    {
        return Item::with('itemType', 'itemCategory')
            ->where('is_commercial', 1)
            ->take(4)
            ->latest()
            ->get();
    }
}