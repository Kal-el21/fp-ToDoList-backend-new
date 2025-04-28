@extends('auth.base_auth')

@section('content')
<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mb-4 mx-4">
            <div class="card-body p-4">
              <h1>Register</h1>
              <p class="text-body-secondary">Create your account</p>

              <form action="" method="post">
                @csrf
                  <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                          <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                      </svg></span>
                      <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Username" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                          <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}"></use>
                      </svg></span>

                      <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                          <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                      </svg></span>

                      <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="new-password">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="input-group mb-4"><span class="input-group-text">
                      <svg class="icon">
                          <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                      </svg></span>
                      <input id="password-confirm" class="form-control" name="password_confirmation" type="password" placeholder="Repeat password" required autocomplete="new-password">
                  </div>

                  {{-- <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button> --}}
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
