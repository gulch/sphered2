<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\PortfolioController;

use App\Http\Requests;

class MainController extends Controller
{
    public function showPage($page_name = null)
    {
        $data = array();

        if (!$page_name) {
            // if $page_name is NULL - this is INDEX page
            $page_name = 'index';
            $gallery_controller = new PortfolioController($this->request);
            
            $data['works'] = $gallery_controller->getGalleryItems('RUS',' is_commercial = 1 AND show_in_gallery = 1 ', 0, 4);
        }
        $data['pageMetadata'] = $this->getPageMetaData();

        $view_name = 'frontend.pages.' . $page_name;
        if (!view()->exists($view_name)) {
            abort(404);
        }

        return view($view_name, $data);
    }
}
