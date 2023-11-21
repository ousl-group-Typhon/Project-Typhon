@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-1 mb-5" style="border:transparent; box-shadow">
                 <div class="fs-2 ps-3 pt-2 fw-semibold">{{__('Edit Student Profile')}}</div>
                 <div class="fs-4 ps-3 pt-2 fw-semibold opacity-75">#{{$student->id}}</div>
                <div class="card-body">
                    
                
                    <form method="GET" action="{{ route('students.update', $student->id) }}">
                        @csrf
                       
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="fName" type="text" class="form-control" name="fName" value="{{$student->student_fname}}" required autocomplete="fName" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('First Name') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="lName" type="text" class="form-control" name="lName" value="{{$student->student_lname}}" required autocomplete="lName" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Last Name') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="email" type="email" class="form-control" name="email" value="{{$student->email}}" required autocomplete="email" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Email Address') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" value="{{$student->phone_number}}" required autocomplete="phoneNumber" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Phone Number') }}</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input id="guardiansPnumber" type="text" class="form-control" name="guardiansPnumber" value="{{$student->guardians_pnumber}}" required autocomplete="guardiansPnumber" autofocus placeholder="Jhon">
                                <label for="floatingInput">{{ __('Guardians Phone Number') }}</label>
                            </div>
                        </div>
                        <div class="row mb-2 mt-4">
                            <div class="col-md-12">
                                        <div class="d-grid">
                                        <button type="submit" class="btn btn-primary fw-medium fs-5">
                                            {{ __('Save Changes') }}
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