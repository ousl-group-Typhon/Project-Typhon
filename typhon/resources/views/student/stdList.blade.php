@extends('layouts.app')
@section('content')

<div class="container-xxl px-5">
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Student Name</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)

      <tr>
        <th scope="row">{{$student->id}}</th>
        
        <td>{{$student->student_fname}} {{$student->student_lname}}</td>
        <td>@if ($student->acc_status == 'active')
            <span class="badge rounded-pill text-bg-success">Active</span>
        @else
            <span class="badge rounded-pill text-bg-success">Active</span>
        @endif</td>
        <td><a href="{{route ('students.edit', $student->id)}}" class="btn btn-sm btn-dark py-0">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
    
</div>
    
@endsection