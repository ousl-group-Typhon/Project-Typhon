@extends('layouts.app')
@extends('sidebar')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

  
            <div class="card">
                <div class="card-header">Analaytics</div>

                <div class="container text-center">

                <div class="row">
                    <div class="col">
                    Total Students: {{ $studentsCount }}
                    </div>
                    <div class="col">
                    Total Payments This Month: Rs: {{ $totalPayments }}
                    </div>
                    <div class="col">
                    No Of Sts Payme: {{ $duePaymentsCount }}
                    </div>
                    {{-- Due Payment %: {{ $DuePaymentsPercentage }} --}}
                </div>
                </div>

                
            </div>
        </div>
    </div>
</div>

@endsection
