<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Repositories\Contract\UserContract;
use App\Mail\EmailVerification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Contract\PlanContract;
use Illuminate\Support\Facades\Hash;

class PlanService
{
    protected $plan;

    public function __construct(PlanContract $planContract)
    {
        $this->plan = $planContract;
    }

    public function register(Request $request)
    {
        $this->plan->persist($request);
    }
}
