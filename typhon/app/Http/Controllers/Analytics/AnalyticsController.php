<?php

namespace App\Http\Controllers\Analytics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    
    
    public function index()
    {   
        $studentsCount = $this->getStudentCount();
        $totalPayments = $this->getTotalPayments();
        $duePaymentsCount = $this->getDuePaymentsCount();
        $DuePaymentsPercentage = $this->DuePaymentsPercentage($studentsCount,$duePaymentsCount);


        return view('home', [
            'studentsCount' => $studentsCount,
            'totalPayments' => $totalPayments,
            'duePaymentsCount' => $duePaymentsCount,
            'DuePaymentsPercentage' => $DuePaymentsPercentage
        
        ]);
    }

    public function getStudentCount()
    {
        $studentsCount = DB::table('students')->count() ?? 0;
        return $studentsCount;
    }

    public function getTotalPayments()
    {
        $totalPayments = DB::table('payments')->sum('amount') ?? 0;
        return $totalPayments;
    }

    public function getDuePaymentsCount()
    {
        $duePaymentsCount = DB::table('payments')->where('status', 'due')->count() ?? 0;
        return $duePaymentsCount;
    }

    public function DuePaymentsPercentage($studentsCount, $duePaymentsCount)
    {
        if ($studentsCount > 0) {
            $percentage = ($duePaymentsCount / $studentsCount) * 100;
            return round($percentage, 2);
        } else {
            return 0;
        }
    }


}
