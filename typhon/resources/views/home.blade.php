@extends('layouts.app')


@section('content')

<a class="nav-link" href="{{ route('assignments') }}"></a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


           
           
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary rounded-pill" href="{{ route('assignments') }}">Assignments</a>
                    <a class="btn btn-primary rounded-pill" href="{{ route('student.add') }}">Add Student</a>
                    <a class="btn btn-primary rounded-pill" href="{{ route('students.index') }}">All Students</a>
                    <a class="btn btn-primary rounded-pill" href="{{ route('institute.add') }}">Add Institute</a>
                    <a class="btn btn-primary rounded-pill" href="{{ route('institute.classlist') }}">Institute class list</a>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
