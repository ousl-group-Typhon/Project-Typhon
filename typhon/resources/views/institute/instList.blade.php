@extends('layouts.app')
@section('content')
@extends('sidebar')
<div class="container-xxl px-5">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Owner's ID</th>
        <th scope="col">Institiute Name</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      {{-- {{$institutes}} --}}
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                    @endif
                </div>
        @foreach ($institutes as $institute)

      <tr>
        <th scope="row">{{$institute->owner}}</th>
        
        <td>{{$institute->institiute_name}}</td>
       
        <td><a href="{{route ('institute.edit', $institute->id)}}" class="btn btn-sm btn-dark py-0">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
    
</div>
    
@endsection