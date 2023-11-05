@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-3 mb-5" style="border:transparent; box-shadow">
                <div class="card-header border border-0 text-center"style="background-color:transparent;"><h1 class="fw-bold" >{{ __('Welocme back ; )') }}</h1>
                    <p class="fw-light">Happy to see you again.</p>
                </div>
                  
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">{{ __('Email Address') }}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3 ">
                                <input type="password" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password">{{ __('Password') }}</label>
                            </div>
                       
                        <!-- <div class="row mb-3">
                        
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                      
                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                
                            </div>
                        </div> -->
                    <div class="container">
                        <div class="row ">
                
                                <div class="col ">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="col col-pull-1">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                                </div>
                            
                        </div>
                    </div>
                    </div>
                    <div class="row mb-2 mt-4">
                    <div class="col-md-12">
                                <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-medium fs-5">
                                    {{ __('Login') }}
                                </button>
                                </div>
                                
                                </div>
                                
                         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
