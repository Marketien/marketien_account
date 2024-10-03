<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SyncController;

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
// Route::middleware('auth')->group(function () {
// Route::get('/admin', function () {
//     return view('mainsection.accountlayout');
// });
Route::group(['middleware' => ['role:Accountant|Admin']], function () {
    Route::get('/invoice', function () {
        return view('mainsection.invoiceForm');
    });
    Route::get('/tax', function () {
        return view('mainsection.taxInvoice');
    });
    // Route::get('/purchase', function () {
    //     return view('mainsection.purchaseOrder');
    // });
    Route::get('/quotation', function () {
        return view('mainsection.qoutationForm');
    });
    Route::get('/quotation-detail', function () {
        return view('mainsection.quotation');
    });
    // Route::get('/payslip', function () {
    //     return view('mainsection.paySlip');
    // });
    Route::get('/purchase-invoice', function () {
        return view('mainsection.purchaceOrderForm');
    });
    //dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    // Account
    Route::get('/account-table', [AccountController::class, 'accountTable'])->name('account-table');
    Route::get('/account-form', [AccountController::class, 'accountForm'])->name('account-form');
    Route::post('/account-store', [AccountController::class, 'accountStore'])->name('account-store');
    Route::post('/account-edit', [AccountController::class, 'accountEdit'])->name('account-edit');
    Route::get('/account-delete/{id}', [AccountController::class, 'accountDelete'])->name('account-delete');
    Route::get('/account-sms/{id}', [AccountController::class, 'account_sms'])->name('account-sms');
    Route::post('/search-account', [AccountController::class, 'searchAccount'])->name('search-account');
    Route::get('/preview-account', [AccountController::class, 'previewAccount'])->name('preview-account');

    //account master
    Route::get('/account-master-form', [AccountController::class, 'accountMasterForm'])->name('account-master-form');
    Route::get('/account-master-table', [AccountController::class, 'accountMasterTable'])->name('account-master-table');
    Route::get('/master-detail/{id}', [AccountController::class, 'purchaseInvoice'])->name('master-detail');
    Route::get('/account-master-delete/{id}', [AccountController::class, 'accountMasterDelete'])->name('account-master-delete');
    Route::post('/search-master', [AccountController::class, 'searchMaster'])->name('search-master');

    Route::get('/quotation-list', [QuotationController::class, 'quotationList'])->name('quotation-list');
    Route::get('/quotation-detail/{id}', [QuotationController::class, 'quotationDetail']);
    Route::get('/quotation-delete/{id}', [QuotationController::class, 'quotationDelete'])->name('quotation-delete');
});
Route::group(['middleware' => ['role:storekeeper|Admin']], function () {
    //attendance
    Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendance');
    Route::get('/attendance-form', [AttendanceController::class, 'attendanceForm'])->name('attendance-form');
    Route::post('/employee-store', [AttendanceController::class, 'storeEmployee'])->name('employee-store');
    Route::post('/location-store', [AttendanceController::class, 'storeLocation'])->name('location-store');
    Route::post('/attendance-store', [AttendanceController::class, 'storeAttendance'])->name('attendance-store');
});
Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/employee-location', [AttendanceController::class, 'employeeLocation'])->name('employee-location');
    Route::get('/employee-detail/{id}', [AttendanceController::class, 'employeeDetail']);
    Route::get('/employee-delete/{id}', [AttendanceController::class, 'employeeDelete'])->name('employee-delete');
    Route::get('/location-delete/{id}', [AttendanceController::class, 'locationDelete'])->name('location-delete');
    Route::get('/payslip/{id}', [AttendanceController::class, 'payslip']);




    //Role-Permission

    // permission
    Route::get('/permission-index', [PermissionController::class, 'index']);
    Route::get('/permission-form', [PermissionController::class, 'create']);
    Route::get('/permission-edit/{id}', [PermissionController::class, 'edit']);
    Route::get('/permission-delete/{id}', [PermissionController::class, 'destroy']);
    Route::post('/permission-store', [PermissionController::class, 'store']);
    Route::put('/permission-update/{permission}', [PermissionController::class, 'update']);

    //  role
    Route::get('/role-index', [RoleController::class, 'index']);
    Route::get('/role-form', [RoleController::class, 'create']);
    Route::get('/role-edit/{id}', [RoleController::class, 'edit']);
    Route::get('/role-delete/{id}', [RoleController::class, 'destroy']);
    Route::post('/role-store', [RoleController::class, 'store']);
    Route::put('/role-update/{role}', [RoleController::class, 'update']);

    Route::get('/role-permission/{id}', [RoleController::class, 'addPermissionToRole']);
    Route::put('/give-permission/{id}', [RoleController::class, 'updatePermissionToRole']);

    //User
    Route::get('/user-list', [UserController::class, 'userList']);
    Route::get('/user-form', [UserController::class, 'userCreate']);
    Route::get('/user-edit/{id}', [UserController::class, 'userEdit']);
    Route::get('/user-delete/{id}', [UserController::class, 'userDestroy']);
    Route::post('/user-store', [UserController::class, 'userStore']);
    Route::put('/user-update/{user}', [UserController::class, 'userUpdate']);
});




Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// });
Route::post('/check', [UserController::class, 'userCheck'])->name('check');

Route::get('/sync-test',[SyncController::class,'syncData']);
