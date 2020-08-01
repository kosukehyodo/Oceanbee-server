<?php

namespace App\Repositories;

use App\Models\PlanPrice;

use App\Repositories\Contract\PlanPriceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EloquentPlanPriceRepository implements PlanPriceContract
{
    public function __construct(PlanPrice $planPrice)
    {
        $this->plan_price = $planPrice;
    }

    public function register(Request $request, Object $plan)
    {
        $check_price = $request->input('check_price');
        $price = $request->input('price');

        $prices = array_combine($check_price, $price) ;

        DB::beginTransaction();
        try {
            foreach ($prices as $key => $price) {
                $planPrice = new PlanPrice();

                $planPrice->plan_id = $plan->id;
                $planPrice->price = $price;
                $planPrice->charge_id = $key;
            
                $planPrice->save();
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
