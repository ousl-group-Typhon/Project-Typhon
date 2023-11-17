@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-1 mb-5" style="border:transparent; box-shadow">
                 <div class="fs-2 ps-3 pt-2">{{__('Add institute')}}</div>

                <div class="card-body">
                    
                
                    <form method="POST" action="{{ route('institute.addinstitute') }}">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="instName" type="text" class="form-control" name="instName" value="{{ old('instName') }}" required autocomplete="instName" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Institute Name') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="owner" type="number" class="form-control" name="owner" value="{{ old('owner') }}" required autocomplete="owner" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Owner`s ID') }}</label>
                            </div>
                        </div>
                        

                        {{-- <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Email Address') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" required autocomplete="phoneNumber" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Phone Number') }}</label>
                            </div>
                        </div> --}}

                    
                        <div class="row mb-2 mt-4">
                            <div class="col-md-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary fw-medium fs-5">
                                            {{ __('Add Institute') }}
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