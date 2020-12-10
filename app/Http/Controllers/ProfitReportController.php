<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProfitReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function daily(){
        $sell=DB::table('order_products')
                    ->where('details_date',date('Y-m-d'))
                    ->sum('details_total_amount');
        $expense=DB::table('expenses')
                    ->where('expense_date',date('Y-m-d'))
                    ->SUM('expense_amount');

        $profit=$sell - $expense;
        return view('report.daily',compact('profit','sell','expense'));

    }

    public function search(Request $req){

        $sell=DB::table('order_products')
                    ->where('details_date',$req->date)
                    ->sum('details_total_amount');
        $expense=DB::table('expenses')
                    ->where('expense_date',$req->date)
                    ->SUM('expense_amount');

        $profit=$sell - $expense;
        $date=date('d-F-Y',strtotime($req->date));
        return view('report.daily',compact('profit','sell','expense','date'));

    }

    public function monthly(){
        $sell=DB::table('order_products')
                    ->where('details_month',date('F-Y'))
                    ->sum('details_total_amount');
        $expense=DB::table('expenses')
                    ->where('expense_month',date('F-Y'))
                    ->SUM('expense_amount');

        $profit=$sell - $expense;
        return view('report.monthly',compact('profit','sell','expense'));

    }

    public function monthlySearch(Request $req){
        $month=$req->month.'-'.$req->year;
        $sell=DB::table('order_products')
                    ->where('details_month',$month)
                    ->sum('details_total_amount');
        $expense=DB::table('expenses')
                    ->where('expense_month',$month)
                    ->SUM('expense_amount');

        $profit=$sell - $expense;
        return view('report.monthly',compact('profit','sell','expense','month'));

    }

    public function yearly(){
        $sell=DB::table('order_products')
                    ->where('details_year',date('Y'))
                    ->sum('details_total_amount');
        $expense=DB::table('expenses')
                    ->where('expense_year',date('Y'))
                    ->SUM('expense_amount');

        $profit=$sell - $expense;
        return view('report.yearly',compact('profit','sell','expense'));

    }

    public function yearlySearch(Request $req){
        $sell=DB::table('order_products')
                    ->where('details_year',$req->year)
                    ->sum('details_total_amount');
        $expense=DB::table('expenses')
                    ->where('expense_year',$req->year)
                    ->SUM('expense_amount');

        $profit=$sell - $expense;
        $year=$req->year;
        return view('report.yearly',compact('profit','sell','expense','year'));

    }



}
