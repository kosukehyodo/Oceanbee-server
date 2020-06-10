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

        
    /**
     * 仮登録
     *
     * @param  array $data
     * @return void
     */
    public function create(array $data)
    {
        $user = $this->user->create($data);

        Mail::to($user->email)->send(new EmailVerification($user));
    }

        
    /**
     * メール認証
     *
     * @param  string $token
     * @return void
     */
    public function verify(string $token)
    {
        $user = $this->user->first($token);

        // 本登録済みか
        if ($user->status == config('user.status.register')) {
            // todo::エラーハンドリング
        }

        try {
            // メール認証済のステータスに更新する
            $user->status = config('user.status.mail_authed');
            $user->save();
        } catch (\Exception $e) {
            // todo::エラーハンドリング
        }
    }
}
