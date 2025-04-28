@extends('auth.base_auth')

@section('content')
<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body">

                  <h1>Login</h1>
                  <p class="text-body-secondary">Sign In to your account</p>

                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                        <div class="input-group mb-3"><span class="input-group-text">
                            <svg class="icon">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                            </svg></span>
                        <input placeholder="Username" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="input-group mb-4"><span class="input-group-text">
                            <svg class="icon">
                            <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                            </svg></span>
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                        </div>
                        <div class="col-6 text-end">
                            {{-- <button class="btn btn-link px-0" type="button">Forgot password?</button> --}}

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('register') }}
                            </a>
                        </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
