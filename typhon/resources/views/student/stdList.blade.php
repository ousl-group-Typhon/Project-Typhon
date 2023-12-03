@extends('layouts.app')
@extends('navigation')
@section('content')
@extends("sidebar")
<style>
    .table{
        position: relative;
        top: 50%;
        left: 15%;
    }
    
    </style>
<div class="container-xxl px-5">
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                    @endif
                </div>
                
        @foreach ($students as $student)

        <tr>
          <th scope="row">{{$student->id}}</th>
          
          <td>{{$student->student_fname}} {{$student->student_lname}}</td> 
          {{-- <td>{{$student->amount}}</td>  --}}
  
        {{-- <td>@if ($tclass->acc_status == 'active')
            <span class="badge text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill">Active</span>
        @else
            <span class="badge text-success-emphasis bg-danger-subtle border border-danger-subtle rounded-pill">Inactive</span>
        @endif</td> --}}
        <td><a href="{{route ('students.edit', $student->id)}}" class="btn btn-sm btn-dark py-0">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
    
</div>
    
@endsection