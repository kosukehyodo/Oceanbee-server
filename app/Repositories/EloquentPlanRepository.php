<?php

namespace App\Repositories;

use App\Models\Plan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Repositories\Contract\PlanContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EloquentPlanRepository implements PlanContract
{
    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function persist(Request $request)
    {
        DB::beginTransaction();
        try {
            //Customerの永続化
            $plan = new Plan();

            $plan->user_id = Auth::user()->id;
            $plan->title = $request->input('title');
            $plan->body = $request->input('body');
            $plan->category = $request->input('category');
            $plan->prefecture = $request->input('prefecture');
            $plan->address = $request->input('address');
            $plan->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
