@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-primary rounded-pill" href="{{ route('transactions') }}">All Transactions</a>        
            <div class="card">

            <form action="{{ route('reset-pay-cycle') }}" method="post">
                @csrf
                @method('post')
                <button type="submit" class="btn btn-primary" onclick="confirmReset()">Reset Pay Cycle for All Records</button>
            </form>

            <script>
                function confirmReset() {
                    if (window.confirm('Are you sure you want to reset the pay cycle for all records?')) {
                        document.getElementById('reset-pay-cycle-form').submit();
                    }
                }
            </script>

                <div class="card-header">Record Payments</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    


                    <form method="post" action="{{ route('record.payment') }}" enctype="multipart/form-data"> 
                        @csrf

                    <div class="form-group">
                        <label for="studentid">Student Id</label>
                        <input type="text" class="form-control" name="student_id" id="studentid" placeholder="Enter Student Id">
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount" min="0" step="0.01">
                    </div>

                    <div class="form-group">
                        <label for="classid">Class ID</label>
                        <input type="number" class="form-control" name="classid" id="amount" placeholder="Enter Class ID" min="0" step="0.01">
                    </div>
  
                    <button type="submit" class="btn btn-primary">Record Payment</button>
                
                </form>

                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">Payments Report</div>

                <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Payment ID</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Last Amount Paid</th>
                        <th scope="col">Last Class Paid</th>
                        <th scope="col">Status</th>
                        <th scope="col">Due Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($Payments as $Payment)

                    <tr>
                        <th scope="row">{{$Payment->id}}</th>
                        <td>{{$Payment->student_id}}</td>
                        <td>{{ $Payment->amount != 0 ? $Payment->amount : 'N/A' }}</td>
                        <td>{{ $Payment->classid != 0 ? $Payment->classid : 'N/A' }}</td>
                        <td>{{$Payment->status}}</td>
                        <td>{{$Payment->due_date}}</td>                         
                    </tr>
                    @endforeach
                    </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- end -->




