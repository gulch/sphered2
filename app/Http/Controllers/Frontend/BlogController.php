<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            'articles' => Article::with('image')->published()->latest()->get(),
            'tags' => $this->getPublishedTags()
        ];

        return view('frontend.blog.index', $data);
    }

    public function show($slug)
    {
        $data = [
            'article' => Article::slug($slug)->firstOrFail(),
            'tags' => $this->getPublishedTags()
        ];

        return view('frontend.blog.item', $data);
    }

    public function indexByTag($slug)
    {
        $data = [
            'tag' => Tag::slug($slug)->firstOrFail(),
            'tags' => $this->getPublishedTags()
        ];

        return view('frontend.blog.tag', $data);
    }

    private function getPublishedTags()
    {
        return Tag::published()->get();
    }
}
