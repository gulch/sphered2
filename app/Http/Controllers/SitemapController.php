<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;

class SitemapController extends Controller
{
    public function generateSitemap()
    {
        $links = [];
        $sitemap = \App::make('sitemap');

        // add items to the sitemap (url, date, priority, freq)
        $sitemap->add(url('/'), date('Y-m-d H:i:s'), '1.0', 'weekly');
        $sitemap->add(url('whatwedo'), date('Y-m-d H:i:s'), '0.5', 'weekly');
        $sitemap->add(url('history'), date('Y-m-d H:i:s'), '0.5', 'weekly');
        $sitemap->add(url('lab'), date('Y-m-d H:i:s'), '0.5', 'weekly');
        $sitemap->add(url('faq'), date('Y-m-d H:i:s'), '0.5', 'weekly');
        $sitemap->add(url('contacts'), date('Y-m-d H:i:s'), '0.5', 'weekly');
        $sitemap->add(url('gallery'), date('Y-m-d H:i:s'), '0.7', 'weekly');
        $sitemap->add(url('portfolio'), date('Y-m-d H:i:s'), '0.7', 'weekly');

        $items = Item::with('itemCategory', 'itemType')->latest()->get();
        foreach ($items as $item) {
            $sitemap->add(url($item->getUrlPath()), date('Y-m-d H:i:s'), '1.0', 'weekly');
        }
        
        $sitemap->store();

        return link_to('sitemap.xml');
    }
}
