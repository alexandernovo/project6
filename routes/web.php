<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidentReportController;
use App\Http\Controllers\InventoryReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SituationalReportController;
use App\Http\Controllers\StaffReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WasteCollectController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'dashboard_view'])->name('dashboard');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//waste collection
Route::get('/wastecollect/view', [WasteCollectController::class, 'wastecollect_view'])->name('wastecollect_view');
Route::post('/wastecollect/save_new_wastecollect', [WasteCollectController::class, 'save_new_wastecollect'])->name('save_new_wastecollect');
Route::post('/wastecollect/getwastecollects', [WasteCollectController::class, 'getwastecollects'])->name('getwastecollect');
Route::post('/wastecollect/deletewastecollect', [WasteCollectController::class, 'deletewastecollect'])->name('deletewastecollect');


//incident report
Route::get('/incidentreport/view', [IncidentReportController::class, 'incidentreport_view'])->name('incidentreport_view');
Route::post('/incidentreport/save_new_incidentreport', [IncidentReportController::class, 'save_new_incidentreport'])->name('save_new_incidentreport');
Route::post('/incidentreport/getincidentreports', [IncidentReportController::class, 'getincidentreports'])->name('getincidentreport');
Route::post('/incidentreport/deleteincidentreport', [IncidentReportController::class, 'deleteincidentreport'])->name('deleteincidentreport');

//situational report
Route::get('/situationalreport/view', [SituationalReportController::class, 'situationalreport_view'])->name('situationalreport_view');
Route::post('/situationalreport/save_new_situationalreport', [SituationalReportController::class, 'save_new_situationalreport'])->name('save_new_situationalreport');
Route::post('/situationalreport/getsituationalreports', [SituationalReportController::class, 'getsituationalreports'])->name('getsituationalreport');
Route::post('/situationalreport/deletesituationalreport', [SituationalReportController::class, 'deletesituationalreport'])->name('deletesituationalreport');

//progress report
Route::get('/progressreport/view', [ProgressReportController::class, 'progressreport_view'])->name('progressreport_view');
Route::post('/progressreport/save_new_progressreport', [ProgressReportController::class, 'save_new_progressreport'])->name('save_new_progressreport');
Route::post('/progressreport/getprogressreports', [ProgressReportController::class, 'getprogressreports'])->name('getprogressreport');
Route::post('/progressreport/deleteprogressreport', [ProgressReportController::class, 'deleteprogressreport'])->name('deleteprogressreport');

//inventory report
Route::get('/inventoryreport/view', [InventoryReportController::class, 'inventoryreport_view'])->name('inventoryreport_view');
Route::post('/inventoryreport/save_new_inventoryreport', [InventoryReportController::class, 'save_new_inventoryreport'])->name('save_new_inventoryreport');
Route::post('/inventoryreport/getinventoryreports', [InventoryReportController::class, 'getinventoryreports'])->name('getinventoryreport');
Route::post('/inventoryreport/deleteinventoryreport', [InventoryReportController::class, 'deleteinventoryreport'])->name('deleteinventoryreport');

//staff report
Route::get('/staffreport/view', [StaffReportController::class, 'staffreport_view'])->name('staffreport_view');
Route::post('/staffreport/save_new_staffreport', [StaffReportController::class, 'save_new_staffreport'])->name('save_new_staffreport');
Route::post('/staffreport/getstaffreports', [StaffReportController::class, 'getstaffreports'])->name('getstaffreport');
Route::post('/staffreport/deletestaffreport', [StaffReportController::class, 'deletestaffreport'])->name('deletestaffreport');

//report
Route::get('/report/view', [ReportController::class, 'report_view'])->name('report_view');

//user
Route::get('/user/view', [UserController::class, 'user_view'])->name('user_view');
Route::post('/user/save_new_user', [UserController::class, 'save_new_user'])->name('save_new_user');
Route::post('/user/getusers', [UserController::class, 'getusers'])->name('getuser');
Route::post('/user/activatedeactivate', [UserController::class, 'activatedeactivate'])->name('activatedeactivate');

//profile
Route::get('/profile/view', [ProfileController::class, 'profile_view'])->name('profile_view');

//dashboard
Route::post('/dashboard/getreport', [DashboardController::class, 'getreport'])->name('getreport');

//record
Route::post('/record/deleteRecord', [RecordController::class, 'deleteRecord'])->name('deleteRecord');
