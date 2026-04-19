<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\PortfolioService;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __construct(
        protected PortfolioService $portfolioService
    ) {}

    public function index(): View
    {
        $technologies = $this->portfolioService->getTechnologies();
        $tools = $this->portfolioService->getTools();
        $methodologies = $this->portfolioService->getMethodologies();
        $clients = $this->portfolioService->getClients();
        $settings = Setting::first();

        return view('portfolio', compact('technologies', 'tools', 'methodologies', 'clients', 'settings'));
    }
}
