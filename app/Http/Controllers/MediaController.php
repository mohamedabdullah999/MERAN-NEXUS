<?php

namespace App\Http\Controllers;

use App\Models\MediaCategory;
use App\Models\Setting;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        $categories = MediaCategory::whereHas('media')->with('media')->get();
        $settings = Setting::first();

        return view('media', compact('categories', 'settings'));
    }
}
