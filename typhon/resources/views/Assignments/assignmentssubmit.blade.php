@extends('layouts.app')
@extends('sidebar')
@section('content')
@extends('navigation')
<style>
    .card{
        position: relative;
        top: 50%;
        left: 10%;
    }
    </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Submit Your Assignments</div>

                <div class="card-body">
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                    <form method="post" action="{{ route('post.submissions') }}" enctype="multipart/form-data"> 
                        @csrf

                    <div class="form-group">
                        <label for="studentid">Student Id</label>
                        <input type="text" class="form-control" name="student_id" id="studentid" aria-describedby="emailHelp" placeholder="Enter Student Id">
                    </div>

                    <div class="form-group">
                        <label for="courcecode">Cource Code</label>
                        <input type="text" class="form-control" name="cource_id" id="courcecode" aria-describedby="emailHelp" placeholder="Enter Cource Code">
                    </div>
  
                    <div class="form-group">
                        <label for="submission">Upload Your Submission</label>
                        <input name="submission" type="file" class="form-control-file" id="submission">
                    </div>
  
                    <button type="submit" class="btn btn-primary fw-medium">Submit</button>
                
                </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- end -->




