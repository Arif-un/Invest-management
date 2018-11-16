<?php

namespace App\Http\Controllers;

use App\Invest;
use Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InvestCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $all= $request->all();
        Invest::create($all);

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
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $up = Invest::findOrFail($request->id);
        $up->update($request->all());

        Session::flash('message', "Successfully Updated");
        Session::flash('title', "Saved Changes");
        Session::flash('type', 'warning');
        return redirect(url('/partner'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $del = Invest::findOrFail($request->id);
        $del->delete();

        Session::flash('message', "Successfully Deleted");
        Session::flash('title', "Deleted");
        Session::flash('type', 'error');
        return back();
    }
}
