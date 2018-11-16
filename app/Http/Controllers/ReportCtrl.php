<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPartnerInv = DB::table('invests')->select(DB::raw('SUM(amount) as amount'))->get();
        $total = DB::select("SELECT (SELECT Sum(amount) as total FROM invests)+(SELECT Sum(debit) as totoal FROM accounts)-(SELECT sum(credit) as total FROM accounts) as total,(SELECT Sum(debit) as totoal FROM accounts) as total_debit,(SELECT Sum(credit) as totoal FROM accounts) as total_credit");
        $avg = DB::select('select count(*) as total_account, sum(debit) as debit ,SUM(credit) as credit, (sum(debit)-SUM(credit)) as differance,DATE_FORMAT(created_at, "%Y-%m-%d") as date
from accounts
group by DATE_FORMAT(created_at, "%Y-%m-%d")');

        return view('reports', compact('total','totalPartnerInv','avg'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allDetail = DB::select("SELECT a.id,a.tab_id,b.name,a.debit,a.credit,a.total,a.created_at FROM accounts a,tabs b WHERE a.tab_id=b.id AND a.created_at LIKE '".$id."%'");
        $total_detail = DB::select("SELECT count(*) as total_tran,Sum(debit) as total_debit,Sum(credit) as total_credit FROM accounts WHERE created_at LIKE  '".$id."%'");

        return view('reportDetails', compact('allDetail','total_detail'));
        //return view('welcome');
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
