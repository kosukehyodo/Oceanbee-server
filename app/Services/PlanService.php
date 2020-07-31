<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Repositories\Contract\UserContract;
use App\Mail\EmailVerification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Contract\PlanContract;
use App\Repositories\Contract\PlanImageContract;
use Illuminate\Support\Facades\Hash;

class PlanService
{
    protected $plan;
    protected $plan_image;

    public function __construct(
        PlanContract $planContract,
        PlanImageContract $planImageContract
    ){
        $this->plan = $planContract;
        $this->plan_image = $planImageContract;
    }

    public function register(Request $request)
    {
        // $this->plan->persist($request);
        $this->plan_image->persist($request);

    }
}
