<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceService
{
    public function getFeaturedServices(): Collection
    {
        return Service::where('is_top', true)
            ->latest()
            ->get();
    }

    public function getRegularServices(): Collection
    {
        return Service::where('is_top', false)
            ->latest()
            ->get();
    }
}
