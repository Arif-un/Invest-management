<?php

namespace App\Http\Controllers;

use App\Tabs;
use App\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;

class TabsCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = DB::select("SELECT `id`,`name`, CASE WHEN type= 0 THEN 'Debit' WHEN type = 1 THEN 'Credit' END as type ,`created_at`,`updated_at` FROM `tabs`");
        $total = DB::select("SELECT (SELECT Sum(amount) as total FROM invests)+(SELECT Sum(debit) as totoal FROM accounts)-(SELECT sum(credit) as total FROM accounts) as total");
        $total_invst = DB::select("SELECT SUM(amount) as amount FROM `invests`");
        $allAcc= DB::select('SELECT a.id,a.tab_id,b.name,a.debit,a.credit,a.credit,a.total,a.created_at FROM accounts a,tabs b WHERE a.tab_id=b.id');
        return view('adminAddTab', compact('allData','total','allAcc','total_invst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        print_r($_POST);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        Tabs::create($all);
        return "saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $get_last_id = DB::table('tabs')->latest()->first()->id;
        return  json_encode($get_last_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = $request->all();
        $update = Tabs::findorfail($id);
        $update->update($new);

        return json_encode("edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_id = Tabs::findorfail($id);
        $delete_id->delete();
        return "deleted";
    }
}
