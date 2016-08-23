<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class ImagesController extends Controller
{
    public function index()
    {
        return view('backend.images.list');
    }
}
