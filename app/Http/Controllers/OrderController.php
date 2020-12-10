<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use PDF;
class OrderController extends Controller
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
        $orders=DB::table('orders')
                    ->join('customers','orders.customer_id','customers.id')
                    ->orderBy('orders.order_id','DESC')
                    ->get();
        return view('order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderCode=rand(9999,999999);
        $order=array(
            'customer_id'=>$request->customer_id,
            'order_code'=>$orderCode,
            'total_amount'=> $request->due_amount + $request->payable_amount,
            'payable_amount'=>$request->payable_amount,
            'due_amount'=>$request->due_amount,
            'payment_method'=>$request->payment_method,
            'total_product'=>Cart::count(),
            'order_date'=>date('Y-m-d'),
            'order_month'=>date('F-Y'),
            'order_year'=>date('Y')
        );
        $orderId=DB::table('orders')->insertGetId($order);

        foreach(Cart::content() as $row){

            // manage Stok
            $stock=DB::table('products')->where('id',$row->id)->first();
            $qty=$stock->product_qty-$row->qty;
            DB::table('products')->where('id',$row->id)->update(['product_qty'=>$qty]);
            // End Manage Stok

            $details=array(
                'order_id'=>$orderId,
                'customer_id'=>$request->customer_id,
                'product_id'=>$row->id,
                'product_name'=>$row->name,
                'product_price'=>$row->price,
                'product_qty'=>$row->qty,
                'details_total_amount'=>$row->qty*$row->price,
                'purchase_total_amount'=>$stock->purchase_price * $row->qty,
                'details_date'=>date('Y-m-d'),
                'details_month'=>date('F-Y'),
                'details_year'=>date('Y')
            );
            DB::table('order_products')->insert($details);
        }

        $customer_info=DB::table('customers')->where('id',$request->customer_id)->first();
        $customer=array(
            'total'=>$customer_info->total + ($request->due_amount + $request->payable_amount),
            'due'=>$customer_info->due + $request->due_amount,
        );
        DB::table('customers')->where('id',$request->customer_id)->update($customer);

        Cart::destroy();

        $notification=array(
            'messege'=>'Order SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->route('order.show',$orderId)->with($notification);
        // return Redirect()->route('pos.index')->with($notification);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=DB::table('orders')
                    ->join('customers','orders.customer_id','customers.id')
                    ->where('order_id',$id)->first();
        $products=DB::table('order_products')->where('order_id',$id)->get();
        return view('order.show',compact('order','products'));
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

    public function print($id){
        $order=DB::table('orders')
                    ->join('customers','orders.customer_id','customers.id')
                    ->where('order_id',$id)->first();
        $products=DB::table('order_products')
                    ->join('products','order_products.product_id','products.id')
                    ->select('order_products.*','products.barcode')
                    ->where('order_id',$id)->get();

        // return view('pos.pdf',compact('order','products'));
        $pdf = PDF::loadView('pos.pdf', compact('order','products'));
        return $pdf->stream('invoice.pdf');
    }
}
