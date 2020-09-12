<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Contract\PlanContract;

class SearchService
{
    protected $plan;

    public function __construct(PlanContract $planContract)
    {
        $this->plan = $planContract;
    }

    public function searchByKeyword(?string $keyword)
    {
        return $this->plan->search($keyword);
    }
}
