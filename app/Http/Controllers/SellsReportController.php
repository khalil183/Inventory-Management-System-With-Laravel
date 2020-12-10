<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SellsReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function daily(){
        $products=DB::table('order_products')
                        ->where('details_date',date('Y-m-d'))
                        ->get();
        $sell=DB::table('order_products')
                    ->where('details_date',date('Y-m-d'))
                    ->sum('details_total_amount');
        $purchase=DB::table('order_products')
                    ->where('details_date',date('Y-m-d'))
                    ->sum('purchase_total_amount');
        $profit=$sell - $purchase;

        return view('SalesReport.daily',compact('products','profit','sell'));
    }

    public function search(Request $req){
        $products=DB::table('order_products')
                        ->where('details_date',$req->date)
                        ->get();
        $sell=DB::table('order_products')
                    ->where('details_date',$req->date)
                    ->sum('details_total_amount');
        $purchase=DB::table('order_products')
                    ->where('details_date',$req->date)
                    ->sum('purchase_total_amount');
        $profit=$sell - $purchase;
        $date=date('d-F-Y',strtotime($req->date));

        return view('SalesReport.daily',compact('products','profit','sell','date'));
    }

    public function monthly(){
        $products=DB::table('order_products')
                        ->where('details_month',date('F-Y'))
                        ->get();
        $sell=DB::table('order_products')
                    ->where('details_month',date('F-Y'))
                    ->sum('details_total_amount');
        $purchase=DB::table('order_products')
                    ->where('details_month',date('F-Y'))
                    ->sum('purchase_total_amount');
        $profit=$sell - $purchase;

        return view('SalesReport.monthly',compact('products','profit','sell'));
    }

    public function monthlySearch(Request $req){
        $month=$req->month.'-'.$req->year;
        $products=DB::table('order_products')
                        ->where('details_month',$month)
                        ->get();
        $sell=DB::table('order_products')
                    ->where('details_month',$month)
                    ->sum('details_total_amount');
        $purchase=DB::table('order_products')
                    ->where('details_month',$month)
                    ->sum('purchase_total_amount');
        $profit=$sell - $purchase;

        return view('SalesReport.monthly',compact('products','profit','sell','month'));

    }

    public function yearly(){
        $products=DB::table('order_products')
                        ->where('details_year',date('Y'))
                        ->get();
        $sell=DB::table('order_products')
                    ->where('details_year',date('Y'))
                    ->sum('details_total_amount');
        $purchase=DB::table('order_products')
                    ->where('details_year',date('Y'))
                    ->sum('purchase_total_amount');
        $profit=$sell - $purchase;

        return view('SalesReport.yearly',compact('products','profit','sell'));
    }

    public function yearlySearch(Request $req){
        $year=$req->year;
        $products=DB::table('order_products')
                        ->where('details_year',$year)
                        ->get();
        $sell=DB::table('order_products')
                    ->where('details_year',$year)
                    ->sum('details_total_amount');
        $purchase=DB::table('order_products')
                    ->where('details_year',$year)
                    ->sum('purchase_total_amount');
        $profit=$sell - $purchase;

        return view('SalesReport.yearly',compact('products','profit','sell','year'));

    }
}
