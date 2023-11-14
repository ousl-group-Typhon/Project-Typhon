@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Submit Your Assignments</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{ route('post.submissions') }}" method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="form-group">
                        <label for="courcecode">Cource Code</label>
                        <input type="text" class="form-control" name="cource_id" id="courcecode" aria-describedby="emailHelp" placeholder="Enter Cource Code">
                    </div>
  
                    <div class="form-group">
                        <label for="submission">Upload Your Submission</label>
                        <input name="submission" type="file" class="form-control-file" id="submission">
                    </div>
  
                    <button type="submit" class="btn btn-primary">Submit</button>
                
                </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




