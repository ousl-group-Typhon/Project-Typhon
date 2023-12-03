@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">               

            <div class="card">
                <div class="card-header">All Transactions</div>

                

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">Student ID</th>
                                <th scope="col">Amount Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $Transaction)
                                <tr>
                                    <th scope="row">{{ $Transaction->id }}</th>
                                    <td>{{ $Transaction->student_id }}</td>
                                    <td>{{ $Transaction->amount }}</td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No transactions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        
                    </table>

                    {{ $transactions->links() }}

                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
