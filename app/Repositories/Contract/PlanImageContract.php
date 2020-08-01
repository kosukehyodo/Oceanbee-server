<?php

namespace App\Repositories\Contract;

use Illuminate\Http\Request;

/**
 * Interface PlanImageContract
 * @package App\Repositories\Contract
 */
interface PlanImageContract
{
    public function register(Request $data, Object $plan);
}
