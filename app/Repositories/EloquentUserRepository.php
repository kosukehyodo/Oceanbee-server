<?php

namespace App\Repositories;

use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Repositories\Contract\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EloquentUserRepository implements UserContract
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
       return $this->user->firstOrCreate([
            'email' => $data['email'],
            'email_verify_token' => Hash::make(Str::uuid()),
        ]);

    }

    public function first(string $token)
    {
        return $this->user->where('email_verify_token', $token)->first();
    }

    public function update(Request $request, int $id)
    {
        $path = ImageHelper::store($request->file('image'), "user/$id");

        return $this->user->where('id', $id)->update([
            'profile' => $request->input('profile'),
            'image' => $path
        ]);
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function hasStripeAccount()
    {
        return !is_null($this->user->find(Auth::id())->stripe_user_id);
    }
}