<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class PosController extends Controller
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
        $contents=Cart::content();
        $products=DB::table('products')->get();
        return view('pos.index',compact('contents','products'));
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
        $product=DB::table('products')->where('barcode',$request->barcode)->first();
        if($product->product_qty>=$request->qty){
            $cart=array(
                "id"=>$product->id,
                "name"=>$product->product_name,
                "qty"=>$request->qty,
                "price"=>$product->selling_price,
                "weight"=>0,
                "options"=>["image"=>$product->image,"barcode"=>$request->barcode],
            );

            Cart::add($cart);
            $notification=array(
                'messege'=>'Product Added SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('pos.index')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Oppss!! This Quantity Not Available. Available Quantity is '. $product->product_qty,
                'alert-type'=>'error'
                );
            return Redirect()->route('pos.index')->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $product=DB::table('products')->where('barcode',$request->barcode)->first();
        if($product->product_qty>=$request->qty){
            Cart::update($id,$request->qty);
            $notification=array(
                'messege'=>'Updated SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('pos.index')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Oppss!! This Quantity Not Available. Available Quantity is '. $product->product_qty,
                'alert-type'=>'error'
                );
            return Redirect()->route('pos.index')->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Cart::remove($id);
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->route('pos.index')->with($notification);
    }

    public function invoice(Request $request){
        $request->validate([
            'customer_name' => 'required',
        ]);

        $customer=DB::table('customers')->where('id',$request->customer_name)->first();
        $contents=Cart::content();
       return view('pos.invoice',compact('customer','contents'));
    }
}
