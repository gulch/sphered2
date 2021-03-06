<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Page;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function jsonResponse($data)
    {
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
