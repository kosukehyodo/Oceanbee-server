<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Repositories\Contract\UserContract;
use App\Mail\EmailVerification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegistrationService
{
    use AuthenticatesUsers; 

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
    
    /**
     * 本登録
     *
     * @param  array $data
     * @param  Request $request
     * @return void
     */
    public function register(array $data, Request $request)
    {
        $user = $this->user->first($data['email_verify_token']);

        try {
            $user->last_name = $data['last_name'];
            $user->first_name = $data['first_name'];
            $user->display_name = $data['last_name'].$data['first_name'];
            $user->password = Hash::make($data['password']);
            $user->status = config('user.status.register');
            $user->save();

            $this->login($user, $request);
        } catch (\Exception $e) {
            // todo::エラーハンドリング
        }
    }
    
    /**
     * ログイン
     *
     * @param  User $user
     * @param  Request $request
     * @return void
     */
    private function login(User $user, Request $request)
    {
        $request->merge(['email' => $user->email]);
        $this->attemptLogin($request);
    }
    
}
