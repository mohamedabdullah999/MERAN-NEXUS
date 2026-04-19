<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Impact;
use App\Models\Media;
use App\Models\Service;
use App\Models\Setting;

class HomePageService
{
    public function getHomeData(): array
    {
        return [
            'settings' => Setting::first(),
            'services' => Service::take(3)->where('is_top', true)->get(),
            'impacts' => Impact::where('show_on_home', true)->take(3)->get(),
            'media' => Media::where('show_on_home', true)->take(3)->get(),
            'articles' => Article::where('show_on_home', true)->take(3)->get(),
        ];
    }
}
