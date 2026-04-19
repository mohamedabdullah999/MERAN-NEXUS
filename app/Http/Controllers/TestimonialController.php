<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::latest()->get();
        $settings = Setting::first();

        return view('testimonials', compact('testimonials', 'settings'));
    }
}
