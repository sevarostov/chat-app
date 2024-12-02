<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

/**
 */
class IndexController
{
    public function index(Request $request): Response|ResponseFactory
    {
        // Query parameters
        dd(phpinfo());
    }
}
