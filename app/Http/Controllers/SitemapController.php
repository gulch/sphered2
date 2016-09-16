<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;
use App\Article;
use App\Tag;

class SitemapController extends Controller
{
    public function generateSitemap()
    {
        $links = [];
        $sitemap = \App::make('sitemap');

        // add items to the sitemap (url, date, priority, freq)
        $sitemap->add(url('/'), date('Y-m-d H:i:s'), '1.0', 'weekly');
        $sitemap->add(url('gallery'), date('Y-m-d H:i:s'), '0.7', 'weekly');
        $sitemap->add(url('portfolio'), date('Y-m-d H:i:s'), '0.7', 'weekly');
        $sitemap->add(url('lab'), date('Y-m-d H:i:s'), '0.6', 'weekly');
        $sitemap->add(url('whatwedo'), date('Y-m-d H:i:s'), '0.4', 'weekly');
        $sitemap->add(url('faq'), date('Y-m-d H:i:s'), '0.3', 'weekly');
        $sitemap->add(url('contacts'), date('Y-m-d H:i:s'), '0.2', 'weekly');
        $sitemap->add(url('history'), date('Y-m-d H:i:s'), '0.1', 'weekly');

        $items = Item::with('itemCategory', 'itemType')->latest()->get();
        foreach ($items as $item) {
            $sitemap->add(url($item->getUrlPath()), date('Y-m-d H:i:s'), '1.0', 'weekly');
        }

        $articles = Article::latest()->get();
        foreach ($articles as $article) {
            $sitemap->add(url('blog/' . $article->slug), $article->updated_at->format('Y-m-d H:i:s'), '1.0', 'weekly');
        }

        $tags = Tag::latest()->get();
        foreach ($tags as $tag) {
            $sitemap->add(url('blog/tag/' . $tag->slug), $tag->updated_at->format('Y-m-d H:i:s'), '0.8', 'weekly');
        }
        
        $sitemap->store();

        return link_to('sitemap.xml');
    }
}
