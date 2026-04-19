<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\CaseStudyService;
use Illuminate\View\View;

class CaseStudyController extends Controller
{
    public function __construct(
        protected CaseStudyService $caseStudyService,
    ) {}

    public function index(): View
    {
        $caseStudies = $this->caseStudyService->getCaseStudies();
        $impacts = $this->caseStudyService->getImpacts();
        $settings = Setting::first();

        return view('case-studies', compact('caseStudies', 'impacts', 'settings'));
    }
}
