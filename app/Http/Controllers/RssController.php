<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use Thujohn\Rss\Rss;

class RssController extends Controller
{
    public function generate()
    {
        $feed = null;
        $feed = new Rss();
        $feed->feed('2.0', 'UTF-8');
        $feed->channel([
            'title' => 'Sphered',
            'description' => 'Sphered [сферед] - проект популяризации VR решений',
            'link' => url('/'),
            'language' => 'ru',
            'copyright' => 'sphered.com.ua'
        ]);

        // статьи блога
        $articles = Article::with('image')
            ->published()
            ->latest()
            ->take(10)
            ->get();

        foreach ($articles as $article) {
            $link = url('/blog/' . $article->slug);
            $item = [
                'title' => $article->title,
                'category' => 'Блог',
                'description|cdata' => str_limit(strip_tags($article->content), 255) . '<p><a target="_blank" href="' . $link . '">Читать дальше</a></p>',
                'link' => $link,
                'pubDate' => $article->created_at->format('r')
            ];
            $feed->item($item);
        }

        return response($feed)->header('Content-type', 'application/rss+xml; charset=UTF-8');
    }
}
