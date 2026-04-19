<?php

namespace App\Http\Controllers;

use App\Services\HomePageService;

class HomeController extends Controller
{
    public function index(HomePageService $homePageService)
    {
        $data = $homePageService->getHomeData();

        return view('welcome', $data);
    }
}
