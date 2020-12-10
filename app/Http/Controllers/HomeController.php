<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sell=DB::table('order_products')
                ->where('details_date',date('Y-m-d'))
                ->sum('details_total_amount');
        $expense=DB::table('expenses')
                ->where('expense_date',date('Y-m-d'))
                ->SUM('expense_amount');

        $profit=$sell - $expense;
        return view('home',compact('profit','sell','expense'));
    }

    public function generateBarcode(){

        // return view('barcode.index');
        $pdf = PDF::loadView('barcode.index');
        return $pdf->stream('barcode.pdf');

    }
}
