<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
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
        $products=DB::table('products')->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barcode' => 'required|unique:products',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'purchase_price' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'selling_price' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'purchase_date' => 'required',
            'image' => 'required',

        ]);

        $product=array(
            'barcode' => $request->barcode,
            'product_name' => $request->product_name,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'purchase_date' => $request->purchase_date,
            'product_qty' => $request->product_quantity,
            'purchase_month' => date('F-Y',strtotime($request->purchase_date)),
            'purchase_year' => date('Y',strtotime($request->purchase_date)),
        );

        $image=$request->file('image');
        if($image){
            $image_name=date('d-m-y-h-i-s-').rand(9999,99999);
            $img_ext=strtolower($image->getClientOriginalExtension());
            $img_full_name=$image_name.'.'.$img_ext;
            $path='public/productImages/';
            $url=$path.$img_full_name;
            $image->move($path,$img_full_name);
            $product['image']=$url;

            DB::table('products')->insert($product);
            $notification=array(
                'messege'=>'Product Purchase SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something Went Wrong!!',
                'alert-type'=>'error'
                );
            return Redirect()->back()->with($notification);
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
        $product=DB::table('products')->where('id',$id)->first();
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        return view('product.edit',compact('product'));
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

        $request->validate([
            'barcode' => 'required|unique:products,barcode,'.$id,
            'product_name' => 'required',
            'product_quantity' => 'required',
            'purchase_price' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'selling_price' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'purchase_date' => 'required',
        ]);

        $newImage=$request->file('new_image');
        if($newImage){
            $image_name=date('d-m-y-h-i-s-').rand(9999,99999);
            $img_ext=strtolower($newImage->getClientOriginalExtension());
            $img_full_name=$image_name.'.'.$img_ext;
            $path='public/productImages/';
            $url=$path.$img_full_name;
            $newImage->move($path,$img_full_name);
            $data=DB::table('products')->where('id',$id)->first();
            unlink($data->image);
            $product['image']=$url;
            DB::table('products')->where('id',$id)->update($product);
            $notification=array(
                'messege'=>'Product Updated SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('product.index')->with($notification);
        }else{
            $product=array(
                'barcode' => $request->barcode,
                'product_name' => $request->product_name,
                'purchase_price' => $request->purchase_price,
                'selling_price' => $request->selling_price,
                'purchase_date' => $request->purchase_date,
                'product_qty' => $request->product_quantity,
                'purchase_month' => date('F-Y',strtotime($request->purchase_date)),
                'purchase_year' => date('Y',strtotime($request->purchase_date)),
            );

            DB::table('products')->where('id',$id)->update($product);
            $notification=array(
                'messege'=>'Product Updated SuccessfullY',
                'alert-type'=>'success'
                );
            return Redirect()->route('product.index')->with($notification);

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

        $product=DB::table('products')->where('id',$id)->first();
        unlink($product->image);
        DB::table('products')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }
}
