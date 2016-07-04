<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\PortfolioController;

use App\Http\Requests;

class MainController extends Controller
{
    public function showPage()
    {
        $data = array();
        $page_name = $this->request->segment(1);

        if (!$page_name) {
            // if segment is "/" - main page
            $page_name = 'main';
            $gallery_controller = new PortfolioController($this->request);
            
            $data['works'] = $gallery_controller->getGalleryItems('RUS',
                ' is_commercial = 1 AND show_in_gallery = 1 ', 0, 4);
        }
        $data['pageMetadata'] = $this->getPageMetaData();

        return view('frontend.pages.' . $page_name, $data);
    }
}
