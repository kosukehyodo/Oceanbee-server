<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Repositories\Contract\UserContract;

class EloquentUserRepository implements UserContract
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
       return User::create([
            'email' => $data['email'],
            'email_verify_token' => Hash::make(Str::uuid()),
        ]);

    }

    public function first(string $token)
    {
        return $this->user->where('email_verify_token', $token)->first();
    }
}