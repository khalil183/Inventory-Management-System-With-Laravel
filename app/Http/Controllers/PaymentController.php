<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=DB::table('payments')
                        ->join('customers','payments.customer_id','customers.id')
                        ->get();
        return view('customer.history',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentCode=rand(9999,99999);
        $payment=array(
            'customer_id'=>$request->customer_id,
            'payment_code'=>$paymentCode,
            'befor_payment_amount'=>$request->total_due,
            'payment_amount'=>$request->payable_amount,
            'after_payment_amount'=>$request->update_due,
            'payment_date'=>date('Y-m-d'),
            'payment_month'=>date('Y-M'),
            'payment_year'=>date('Y'),
        );

        DB::table('payments')->insert($payment);
        DB::table('customers')->where('id',$request->customer_id)->update(['due'=>$request->update_due]);

        $customer=DB::table('customers')->where('id',$request->customer_id)->first();

        // return view('customer.print',compact('customer','payment'));
        $pdf = PDF::loadView('customer.print', compact('customer','payment'));
        return $pdf->stream('payment.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=DB::table('customers')->where('id',$id)->first();
        return view('customer.payment',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
