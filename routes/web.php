<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

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


Route::get('/', function () {
    return view('adminLogin');
});
Route::group(['name' => 'admin', 'middleware' => 'userRestriction'], function() {
    Route::get('/admin', function () {
        return view('mainsection.accountlayout');
    });
    Route::get('/invoice', function () {
        return view('mainsection.invoiceForm');
    });
    Route::get('/tax', function () {
        return view('mainsection.taxInvoice');
    });
    Route::get('/purchase', function () {
        return view('mainsection.purchaseOrder');
    });
    Route::get('/quotation', function () {
        return view('mainsection.quotation');
    });
    Route::get('/payslip', function () {
        return view('mainsection.paySlip');
    });
    Route::get('/purchase-invoice', function () {
        return view('mainsection.purchaceOrderForm');
    });
    Route::get('/account-table',[AccountController::class,'accountTable'])->name('account-table');
    Route::get('/account-form',[AccountController::class,'accountForm'])->name('account-form');
    Route::post('/account-store',[AccountController::class,'accountStore'])->name('account-store');


});
Route::post('/check', [UserController::class, 'userCheck'])->name('check');
