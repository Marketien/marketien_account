<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QuotationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/acount-store',[AccountController::class,'accountMasterStore']);
Route::post('/salary-store',[AttendanceController::class,'salary']);
Route::post('/quotation-store',[QuotationController::class,'quotationStore']);
Route::get('/invoice-no',[AccountController::class,'generateInvoice'])->name('invoice-no');
Route::get('/ref-no',[AccountController::class,'generateRefNo'])->name('ref-no');
