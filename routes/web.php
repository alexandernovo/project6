<?php

use App\Http\Controllers\AssociationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoatingController;
use App\Http\Controllers\ChainsawController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidentReportController;
use App\Http\Controllers\SituationalReportController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TreesController;
use App\Http\Controllers\TricycleController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WasteBottleController;
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