<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PdfController;
use App\Models\Tblheader;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblheaderController;

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
// USER CONTROLLER
Route::get('login', [UserController::class, 'login'])->name('login');

Route::post('login', [UserController::class, 'authenticate'])->name('login.post');
Route::get('/', [UserController::class, 'index'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout']);

//TABLE HEADER CONTROLLER

Route::get('/requestform', [TblheaderController::class, 'requestform'])->middleware('auth');
Route::post('/request/store', [TblheaderController::class, 'store'])->middleware('auth');;
Route::get('/edit/{id}', [TblheaderController::class, 'editRequest'])->middleware('auth');;
Route::post('/request/removerow/{index}', [TblheaderController::class, 'removerow']);
Route::post('/submit', [TblheaderController::class, 'submit'])->middleware('auth');;
Route::get('/tableview',[TblheaderController::class, 'getDataTable'])->name('filter-datatable')->middleware('isExecutive');
Route::get('/myrequestview',[TblheaderController::class, 'getMyRequestTable'])->middleware('auth');;
Route::get('/departmenttable',[TblheaderController::class, 'getDepartmentDataTable'])->middleware('isHeaddept');
Route::post('/request/verify/{id}',[TblheaderController::class, 'verifyRequest'])->middleware('isHeaddept');;
Route::post('/request/approve/{id}',[TblheaderController::class, 'approveRequest'])->middleware('isHeaddept');;
Route::post('/request/reject/{id}',[TblheaderController::class, 'rejectRequest'])->middleware('isHeaddept');;
Route::post('/request/nextApprover/{id}',[TblheaderController::class, 'nextApprover'])->middleware('auth');;
Route::get('/prlogs',[TblheaderController::class, 'prlogsTable'])->middleware('isHeaddept');

Route::get('/openpdf',[TblheaderController::class, 'openNewWindow'])->middleware('auth');;

Route::put('/update/{itemid}', [TblheaderController::class, 'updateRequest'])->middleware('auth');;
Route::delete('/delete/{id}', [TblheaderController::class, 'destroyRequest']);

//Route::get('/tablesearch',[TblheaderController::class, 'searchDataTable']);

Route::get('/pdfview/{id}',[PdfController::class, 'index'])->name('pdf')->middleware('auth');;
Route::get('/imageview/{id}',[PdfController::class, 'viewImage']);

Route::get('/testpdf/{id}',[PdfController::class, 'testpdf']);

