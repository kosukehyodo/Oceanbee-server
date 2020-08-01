<?php

namespace App\Repositories\Contract;

use Illuminate\Http\Request;

/**
 * Interface PlanPriceContract
 * @package App\Repositories\Contract
 */
interface PlanPriceContract
{
    public function register(Request $data, Object $plan);
}
