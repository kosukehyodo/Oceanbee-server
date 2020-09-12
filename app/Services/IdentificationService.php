<?php

namespace App\Services;

use App\Repositories\Contract\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IdentificationService
{
    protected $stripe;
    protected $user;

    public function __construct(UserContract $userContract)
    {
        $this->user = $userContract;
        $this->stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
    }

    public function register($request)
    {
        $res = $this->stripe->accounts->create([
            'country' => 'JP',
            'type' => 'custom',
            'business_type' => 'individual',
            'tos_acceptance' => [
                'date' => now()->timestamp,
                'ip' => $_SERVER['REMOTE_ADDR']
            ],
            'external_account' => [
                'object' => 'bank_account',
                'currency' => 'jpy',
                'country' => 'jp',
                'account_number' => $request->input('account_number'),
                'routing_number' => $request->input('routing_number'),
                'account_holder_name' => $request->input('account_holder_name'),
            ],
            'individual' => [
                'first_name_kanji' => $request->input('first_name_kanji'),
                'last_name_kanji' => $request->input('last_name_kanji'),
                'first_name_kana' => $request->input('first_name_kana'),
                'last_name_kana' => $request->input('last_name_kana'),

                'dob' => [
                    'year' => $request->input('year'),
                    'month' => $request->input('month'),
                    'day' => $request->input('day'),
                ],

                'address_kanji' => [
                    'postal_code' => $request->input('postal_code'),
                    'state' => $request->input('state'),
                    'country' => 'JP',
                    'city' => $request->input('city'),
                    'town' => $request->input('town'),
                    'line1' => $request->input('line1'),
                    'line2' => $request->input('line2'),
                ],

                'address_kana' => [
                    'postal_code' => $request->input('postal_code'),
                    'state' => 'カナガワケン',
                    'country' => 'JP',
                    'city' => $request->input('city_kana'),
                    'town' => $request->input('town_kana'),
                    'line1' => $request->input('line1_kana'),
                    'line2' => $request->input('line2_kana'),
                ],

                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),

            ],
            'requested_capabilities' => ['card_payments', 'transfers'],
        ]);

        $user = $this->user->find(Auth::id());
        $user->stripe_user_id = $res->id;
        $user->save();
    }

    public function retrieve()
    {
        $user = $this->user->find(Auth::id());
        return $this->stripe->accounts->retrieve($user->stripe_user_id);
    }

    public function check()
    {
        return $this->user->hasStripeAccount();
    }
}
