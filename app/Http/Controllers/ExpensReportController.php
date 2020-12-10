<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpensReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function daily(){

        $expenses=DB::table('expenses')->where('expense_date',date('Y-m-d'))->get();
        $total=DB::table('expenses')->where('expense_date',date('Y-m-d'))->SUM('expense_amount');
        return view('expenseReport.daily',compact('expenses','total'));
    }
    public function search(Request $req){
        $expenses=DB::table('expenses')->where('expense_date',$req->date)->get();
        $total=DB::table('expenses')->where('expense_date',$req->date)->SUM('expense_amount');
        $date=date('d-F-Y',strtotime($req->date));
        return view('expenseReport.daily',compact('expenses','total','date'));
    }

    public function monthly(){
        $expenses=DB::table('expenses')->where('expense_month',date('F-Y'))->get();
        $total=DB::table('expenses')->where('expense_month',date('F-Y'))->SUM('expense_amount');
        return view('expenseReport.monthly',compact('expenses','total'));
    }

    public function monthlySearch(Request $req){
        $month=$req->month.'-'.$req->year;
        $expenses=DB::table('expenses')->where('expense_month',$month)->get();
        $total=DB::table('expenses')->where('expense_month',$month)->SUM('expense_amount');
        return view('expenseReport.monthly',compact('expenses','total','month'));
    }

    public function yearly(){
        $expenses=DB::table('expenses')->where('expense_year',date('Y'))->get();
        $total=DB::table('expenses')->where('expense_year',date('Y'))->SUM('expense_amount');
        return view('expenseReport.yearly',compact('expenses','total'));
    }

    public function yearlySearch(Request $req){
        $year=$req->year;
        $expenses=DB::table('expenses')->where('expense_year',$year)->get();
        $total=DB::table('expenses')->where('expense_year',$year)->SUM('expense_amount');
        return view('expenseReport.yearly',compact('expenses','total','year'));
    }
}
