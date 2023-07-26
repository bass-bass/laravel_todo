@extends('layouts.app')

@section('content')
<!-- Container START -->
<div class="container">
    <div class="row justify-content-center align-items-center vh-50 py-5">
      <!-- Main content START -->
      <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
        <!-- Sign in START -->
        <div class="card card-body text-center p-4 p-sm-5">
          <!-- Title -->
          <h1 class="mb-2">Login</h1>
          <p class="mb-0">アカウントをまだ持っていない方は<a href="{{ route('register')}}">こちら</a></p>
          <!-- Form START -->
          <form class="mt-sm-4" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
              @csrf
            <!-- Email -->
            <div class="mb-3 input-group-lg">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <!-- New password -->
            <div class="mb-3 position-relative">
                <!-- Password -->
                <div class="input-group input-group-lg">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"　placeholder="パスワード" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <!-- Remember me -->
            <div class="form-check mb-3 d-sm-flex justify-content-between">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                                        {{ __('パスワードを記憶する') }}
                </label>
            </div>
            <!-- Button -->
            <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">{{ __('Login') }}</button></div>
            <!-- Copyright -->
            <p class="mb-0 mt-3">©2022 Team amore</a></p>
          </form>
          <!-- Form END -->
        </div>
        <!-- Sign in START -->
      </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->
@endsection
