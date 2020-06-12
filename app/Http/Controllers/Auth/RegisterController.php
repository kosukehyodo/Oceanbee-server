<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Services\RegistrationService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegistrationService $registration_service)
    {
        $this->registration_service = $registration_service;
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('project.pre_register.index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $this->registration_service->create($data);
    }

    /**
     * 仮登録
     * @param Request $request
     * @return view
     */
    public function Preregister(Request $request)
    {
        event(new Registered($this->create($request->all())));

        return view('project.pre_register.complete');
    }

    /**
     * メール認証
     *
     * @param  mixed $token
     * @return view
     */
    public function verify(Request $request)
    {
        $token = $request->input('token');
        $this->registration_service->verify($token);

        return view('project.register.index');
    }
    
    /**
     * 本登録
     *
     * @param  Request $request
     * @return redirect
     */
    public function register(Request $request)
    {
        $this->registration_service->register($request->all(), $request);
        
        return redirect('mypage');
    }
}
