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
            'articles' => Article::with('image')->latest()->get(),
            'tags' => Tag::all()
        ];

        return view('frontend.blog.index', $data);
    }

    public function show($slug)
    {
        $data = [
            'article' => Article::slug($slug)->firstOrFail(),
            'tags' => Tag::all()
        ];

        return view('frontend.blog.item', $data);
    }
}