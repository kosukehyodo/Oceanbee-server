<?php

use App\Models\Plan;
use App\Models\PlanImage;
use App\Models\PlanPrice;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create()->each(function ($user) {
            factory(Plan::class, 2)->create(['user_id' => $user->id])->each(function ($plan) {
                factory(PlanImage::class, 2)->create(['plan_id' => $plan->id]);
                factory(PlanPrice::class, 2)->create(['plan_id' => $plan->id]);
            });
        });
    }
}
