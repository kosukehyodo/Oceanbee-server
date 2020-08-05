<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Contract\UserContract;

class ProfileService
{
    protected $user;

    public function __construct(UserContract $userContract)
    {
        $this->user = $userContract;
    }
    public function register(Request $request, Int $id)
    {
        $this->user->update($request, $id);
    }
}
