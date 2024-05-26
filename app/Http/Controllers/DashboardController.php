<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $start_month = Carbon::now()->startOfMonth();
        $end_month = Carbon::now()->endOfMonth();
        $current_month_budget = DB::table('projects')->whereBetween('created_at',[$start_month, $end_month])->sum('budget');
        $last_month = Carbon::now()->subMonth()->startOfMonth();
        $lastMonth_end = Carbon::now()->subMonth()->endOfMonth();
        $last_month_budget = DB::table('projects')->whereBetween('created_at',[$last_month, $lastMonth_end])->sum('budget');
    
        if ($last_month_budget != 0) {
            $percentageChange = (($current_month_budget - $last_month_budget) / $last_month_budget) * 100;
        } else {
            // Handle the case where the previous month's budget sum is zero to avoid division by zero
            $percentageChange = $current_month_budget > 0 ? 100 : 0;
        }
        $percentageChange = round($percentageChange, 2);
        return view('dashboard.index',[
            'current_month_budget' => $current_month_budget,
            'last_month_budget' => $last_month_budget,
            'percentageChange' => $percentageChange,
        ]);
    }
}
