<?php

namespace App\Http\Controllers;
use App\Invest;
use App\Partner;
use Session;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PartnerCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = Partner::all();
        $allInv = DB::select("SELECT invests.id,invests.partner_id,partners.name,invests.amount,invests.created_at FROM `invests`,`partners` WHERE invests.partner_id= partners.id");
        $totalPartnerInv = DB::table('invests')->select(DB::raw('SUM(amount) as amount'))->get();
        return view('partner&invest',compact('allData','allInv','totalPartnerInv'));
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
        $request['partner_id']="P".time();
        $request['pass']="P-123";
        $all=$request->all();
        Partner::create($all);

        Session::flash('message', "Successfully Addes");
        Session::flash('title', "'Success'");
        Session::flash('type', 'success');
        return back();
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
    public function update(Request $request)
    {
        $update = Partner::findOrFail($request->u_id);
        $update->update($request->all());

        Session::flash('message', "Successfully Updated");
        Session::flash('title', "Saved Changes");
        Session::flash('type', 'warning');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $del = Partner::findOrFail($request->id);
        $del->delete();

        Session::flash('message', "Successfully Deleted");
        Session::flash('title', "Deleted");
        Session::flash('type', 'error');
        return back();
    }
}
