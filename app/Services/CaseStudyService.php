<?php

namespace App\Services;

use App\Enums\PortfolioType;
use App\Models\Impact;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Collection;

class CaseStudyService
{
    public function getCaseStudies(): Collection
    {
        return Portfolio::where('type', PortfolioType::CaseStudy)
            ->latest()
            ->get();
    }

    public function getImpacts(): Collection
    {
        return Impact::latest()->get();
    }
}
