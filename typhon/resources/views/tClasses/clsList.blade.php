@extends('layouts.app')
@section('content')

<div class="container-xxl px-5">
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Institute</th>
        <th scope="col">Tutor</th>
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
                
        @foreach ($tclass as $t)

        <tr>
          <th scope="row">{{$t->id}}</th>
          
          <td>{{$t->class_name}}</td>
          <td>{{$t->user_name}}</td> 
          <td>{{$t->amount}}</td> 
  
        {{-- <td>@if ($tclass->acc_status == 'active')
            <span class="badge text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill">Active</span>
        @else
            <span class="badge text-success-emphasis bg-danger-subtle border border-danger-subtle rounded-pill">Inactive</span>
        @endif</td> --}}
        <td><a href="{{route ('clsEdit.edit', $t->id)}}" class="btn btn-sm btn-dark py-0">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
    
</div>
    
@endsection