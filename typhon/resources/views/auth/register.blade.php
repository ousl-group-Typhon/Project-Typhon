@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-3 mb-5" style="border:transparent; box-shadow">
                <div class="card-header border border-0 text-center"style="background-color:transparent;">
                <h1 class="fw-bold">{{ __('Register') }}</h1>
                <p class="fw-light">Create your accout at typhon and worry no more!</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  placeholder="Name" autofocus>
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" required autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">{{ __('Password') }}</label>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating mb-3 ">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                               
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
