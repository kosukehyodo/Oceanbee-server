<?php

namespace App\Services;

use App\Repositories\Contract\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreditCardService
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

    public function register($token, $user)
    {
        if (!$user->stripe_customer_id) {

            //Stripe上に顧客情報をtokenを使用することで保存
            try {
                $customer = $this->stripe->customers->create([
                    'card' => $token,
                    'name' => $user->last_name.$user->first_name,
                    'description' => $user->id
                ]);
            } catch (\Stripe\Exception\CardException $e) {
                /*
                 * カード登録失敗時には現段階では一律で別の登録カードを入れていただくように
                 * 促すメッセージで統一。
                 * カードエラーの類としては以下があるとのこと
                 * １、カードが決済に失敗しました
                 * ２、セキュリティーコードが間違っています
                 * ３、有効期限が間違っています
                 * ４、処理中にエラーが発生しました
                 *  */
                return false;
            }

            $user = $this->user->find(Auth::id());
            $user->stripe_customer_id = $customer->id;
            $user->update();
        } else {
            $this->delete($user);
        }
    }

    public function retrieve($user)
    {
        if (!is_null($user->stripe_customer_id)) {
            $customer = $this->stripe->customers->retrieve($user->stripe_customer_id);
            $card = $customer->sources->data[0];
            $default_card = [
                    'number' => str_repeat('*', 8) . $card->last4,
                    'id' => $card->id,
                ];

            return $default_card;
        }
    }

    public function delete($user)
    {
        $this->stripe->customers->delete($user->stripe_customer_id);
        $user = $this->user->find(Auth::id());
        $user->stripe_customer_id = null;
        $user->update();
    }

}
