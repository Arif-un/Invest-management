<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('adminAddTab');
});*/
Route::resource('/tab','TabsCtrl');
Route::resource('/partner','PartnerCtrl');
Route::resource('/partner/inv','InvestCtrl');
Route::resource('/tab/acc','AccountCtrl');
Route::post('/tab/acc/last','AccountCtrl@lastAmnt');
Route::resource('/reports','ReportDtails');
Route::resource('/report','ReportCtrl');
