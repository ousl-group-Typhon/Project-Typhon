@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-3 mb-5" style="border:transparent; box-shadow">
                <div class="card-header border border-0 text-center"style="background-color:transparent;">
                <h1 class="fw-bold">{{ __('Let`s Get Started B)' ) }}</h1>
                <p class="fw-light">Create your accout at Project typhon and worry no more!</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Brad Pitt">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">{{ __('Name') }}</label>
                            </div>
                        </div>
                        
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
                            <div class="col-md-12">
                            <div class="form-floating mb-3 ">
                                <input type="password" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                               
                                <label for="password">{{ __('Confirm Password') }}</label>
                            </div>

                        <div class="row mb-0 mt-4">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-medium fs-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
