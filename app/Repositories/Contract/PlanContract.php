<?php

namespace App\Repositories\Contract;

use Illuminate\Http\Request;

/**
 * Interface PlanContract
 * @package App\Repositories\Contract
 */
interface PlanContract
{
    public function register(Request $data);

    public function get(Int $limit = null);

    public function search(?string $keyword);
}
