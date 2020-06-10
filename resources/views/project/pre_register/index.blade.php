@extends('layout.app')
@section('title') サーフィンやろう、教えよう | Oceanbee
@endsection
@section('content')
<div class="p-register">
    <div class="p-register__frame">
        <form>
            <h2>アカウント登録</h2>
            <div class="p-register__sns-account">
                <span>SNSアカウントで登録</span>
                <i class="fab fa-line fa-4x line-green"></i>
                <i class="fab fa-facebook-square fa-4x fb-blue"></i>
                <i class="fab fa-twitter-square fa-4x tw-blue"></i>
            </div>
            <div class="p-register__email">
                <span>メールアドレスで登録</span>
                <input type="email" name="email" class="c-input" placeholder="メールアドレスを入力">
                <button type="submit" class="c-register-button">登録する</button>
            </div>

        </form>
    </div>

</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pre_register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection