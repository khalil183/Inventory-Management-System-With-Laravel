<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ExpenseController extends Controller
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
        $expenses=DB::table('expenses')->get();
        return view('expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');
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
            'expense_amount' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'expense_details' => 'required',
            'expense_date' => 'required'

        ]);

        $expense=array(
            'expense_amount' => $request->expense_amount,
            'expense_details' => $request->expense_details,
            'expense_date' => date('Y-m-d',strtotime($request->expense_date)),
            'expense_month' => date('F-Y',strtotime($request->expense_date)),
            'expense_year' => date('Y',strtotime($request->expense_date)),
        );

        DB::table('expenses')->insert($expense);
        $notification=array(
            'messege'=>'Inserted SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->route('expense.index')->with($notification);
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
        $expense=DB::table('expenses')->where('expense_id',$id)->first();
        return view('expense.edit',compact('expense'));
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
            'expense_amount' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'expense_details' => 'required',
            'expense_date' => 'required'

        ]);

        $expense=array(
            'expense_amount' => $request->expense_amount,
            'expense_details' => $request->expense_details,
            'expense_date' => date('Y-m-d',strtotime($request->expense_date)),
            'expense_month' => date('F-Y',strtotime($request->expense_date)),
            'expense_year' => date('Y',strtotime($request->expense_date)),
        );

        DB::table('expenses')->where('expense_id',$id)->update($expense);
        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->route('expense.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('expenses')->where('expense_id',$id)->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
            );
        return Redirect()->route('expense.index')->with($notification);
    }
}
