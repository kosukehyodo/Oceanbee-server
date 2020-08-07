<?php

namespace App\Services;


use Illuminate\Http\Request;
use App\Repositories\Contract\PlanContract;
use App\Repositories\Contract\PlanImageContract;
use App\Repositories\Contract\PlanPriceContract;
use Illuminate\Support\Facades\Hash;

class PlanService
{
    protected $plan;
    protected $plan_image;
    protected $plan_price;


    public function __construct(
        PlanContract $planContract,
        PlanImageContract $planImageContract,
        PlanPriceContract $planPriceContract
    ){
        $this->plan = $planContract;
        $this->plan_image = $planImageContract;
        $this->plan_price = $planPriceContract;
    }

    public function register(Request $request)
    {
        $plan = $this->plan->register($request);
        $this->plan_image->register($request, $plan);
        $this->plan_price->register($request, $plan);
    }
}
