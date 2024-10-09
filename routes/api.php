<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\SyncController;

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



// for offline data sync

// Route::get('/sync-account',[SyncController::class,'syncAccount']);
// Route::post('/sync-store-account',[SyncController::class,'syncAccountStore']);

// Route::get('/sync-account-master',[SyncController::class,'syncAccountMaster']);
// Route::post('/sync-store-account-master',[SyncController::class,'syncAccountMasterStore']);

// Route::get('/sync-input-master',[SyncController::class,'syncInputMaster']);
// Route::post('/sync-store-input-master',[SyncController::class,'syncInputMasterStore']);

// Route::get('/sync-employee',[SyncController::class,'syncEmployee']);
// Route::post('/sync-store-employee',[SyncController::class,'syncEmployeeStore']);

// Route::get('/sync-location',[SyncController::class,'syncLocation']);
// Route::post('/sync-store-location',[SyncController::class,'syncLocationStore']);

// Route::get('/sync-attendance',[SyncController::class,'syncAttendance']);
// Route::post('/sync-store-attendance',[SyncController::class,'syncAttendanceStore']);

// Route::get('/sync-quotation',[SyncController::class,'syncQuotation']);
// Route::post('/sync-store-quotation',[SyncController::class,'syncQuotationStore']);

// Route::get('/sync-salary',[SyncController::class,'syncSalary']);
// Route::post('/sync-store-salary',[SyncController::class,'syncSalaryStore']);
