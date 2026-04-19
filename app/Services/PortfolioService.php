<?php

namespace App\Services;

use App\Enums\PortfolioType;
use App\Models\Client;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Collection;

class PortfolioService
{
    public function getTechnologies(): Collection
    {
        return Portfolio::where('type', PortfolioType::Technology)->latest()->get();
    }

    public function getTools(): Collection
    {
        return Portfolio::where('type', PortfolioType::Tool)->latest()->get();
    }

    public function getMethodologies(): Collection
    {
        return Portfolio::where('type', PortfolioType::Methodology)->oldest()->get();
    }

    public function getClients(): Collection
    {
        return Client::latest()->get();
    }
}
