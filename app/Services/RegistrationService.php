<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Repositories\Contract\UserContract;
use App\Mail\EmailVerification;

class RegistrationService
{
    public function __construct(
        UserContract $user_contract
    ) {
        $this->user = $user_contract;
    }

    public function create(array $data)
    {
        $user = $this->user->create($data);

        Mail::to($user->email)->send(new EmailVerification($user));
    }
}
