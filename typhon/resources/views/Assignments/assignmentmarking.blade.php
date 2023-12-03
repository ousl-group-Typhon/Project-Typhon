@extends('layouts.app')
@section('content')
@extends('sidebar')


<div class="container-xxl px-5">

<!-- Display flash message if present -->
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">Assignment ID</th>
        <th scope="col">Student ID</th>
        <th scope="col">Cource ID</th>
        <th scope="col">Submission</th>
        <th scope="col">Update Marks</th>
        <th scope="col">Marks</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($submissions as $submission)

      <tr>
        <th scope="row">{{$submission->id}}</th>
        
        <td>{{$submission->student_id}}</td>
        <td>{{$submission->cource_id}}</td>

        <td>
            <a href="{{url('uploads/submissions/'.$submission->submission)}}" download>
                Download
            </a>
        </td>

        <td>
            <form action="{{ route('mark.submit') }}" method="post">
            @csrf
                <input type="hidden" name="assignment_id" value="{{ $submission->id }}">
                <input type="hidden" name="student_id" value="{{ $submission->student_id }}">
                <input type="text" name="marks">
                <button type="submit" class="btn btn-primary">Submit Marks</button>
            </form>
        </td>

        <td>

            <?php
                $marks = \App\Models\marks::where('assignment_id', $submission->id)
                ->where('student_id', $submission->student_id)
                ->value('marks');
                ?>

            {{ $marks ?? 'Not Available' }}
            
        </td>
        
        
      </tr>
      @endforeach
    </tbody>
  </table>
    
</div>
    
@endsection

<!-- end -->