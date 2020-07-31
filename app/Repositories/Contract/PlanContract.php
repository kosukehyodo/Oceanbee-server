<?php

namespace App\Repositories\Contract;

use Illuminate\Http\Request;

/**
 * Interface PlanContract
 * @package App\Repositories\Contract
 */
interface PlanContract
{
    public function persist(Request $data);
}
