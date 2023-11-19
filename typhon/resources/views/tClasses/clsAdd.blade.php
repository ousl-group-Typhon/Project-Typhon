@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-1 mb-5" style="border:transparent; box-shadow">
                 <div class="fs-2 ps-3 pt-2">{{__('Add Studend')}}</div>

                <div class="card-body">
                    
                
                    <form method="POST" action="{{ route('students.addStudent') }}">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="clsName" type="text" class="form-control" name="clsName" value="{{ old('clsName') }}" required autocomplete="clsName" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Class Name') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="tutorID" type="text" class="form-control" name="tutorID" value="{{ old('tutorID') }}" required autocomplete="tutorID" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Tutor ID') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
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
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="guardiansPnumber" type="text" class="form-control" name="guardiansPnumber"  required autocomplete="guardiansPnumber" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Guardians Phone Number') }}</label>
                            </div>
                        </div>
                        <div class="row mb-2 mt-4">
                            <div class="col-md-12">
                                        <div class="d-grid">
                                        <button type="submit" class="btn btn-primary fw-medium fs-5">
                                            {{ __('Add Student') }}
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