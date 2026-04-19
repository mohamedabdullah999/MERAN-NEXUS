<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Setting;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->get();
        $settings = Setting::first();

        return view('articles', compact('articles', 'settings'));
    }
}
