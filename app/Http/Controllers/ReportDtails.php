<?php

namespace App\Http\Controllers;
use App\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportDtails extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allDetail = DB::select("SELECT a.id,a.tab_id,b.name,a.debit,a.credit,a.total,a.created_at FROM accounts a,tabs b WHERE a.tab_id=b.id AND a.created_at LIKE '".$_GET['date']."%'");
        $total_detail = DB::select("SELECT count(*) as total_tran,Sum(debit) as total_debit,Sum(credit) as total_credit FROM accounts WHERE created_at LIKE  '".$_GET['date']."%'");

        return view('reportDetails', compact('allDetail','total_detail'));
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
        //
    }


    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
