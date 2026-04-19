<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\HomePageService;
use App\Services\ServiceService;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __construct(
        protected ServiceService $serviceService,
        protected HomePageService $HomePageService,
    ) {}

    public function index(): View
    {
        $featuredServices = $this->serviceService->getFeaturedServices();
        $settings = Setting::first();

        return view('services', compact('featuredServices', 'settings'));
    }
}
