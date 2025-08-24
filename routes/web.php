<?php

use App\Http\Controllers\AssociationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoatingController;
use App\Http\Controllers\ChainsawController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidentReportController;
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

//waste bottle
Route::get('/wastebottle/view', [WasteBottleController::class, 'wastebottle_view'])->name('wastebottle_view');
Route::post('/wastebottle/save_new_wastebottle', [WasteBottleController::class, 'save_new_wastebottle'])->name('save_new_wastebottle');
Route::post('/wastebottle/getwastebottles', [WasteBottleController::class, 'getwastebottles'])->name('getwastebottle');
Route::post('/wastebottle/deletewastebottle', [WasteBottleController::class, 'deletewastebottle'])->name('deletewastebottle');

//incident report
Route::get('/incidentreport/view', [IncidentReportController::class, 'incidentreport_view'])->name('incidentreport_view');
Route::post('/incidentreport/save_new_incidentreport', [IncidentReportController::class, 'save_new_incidentreport'])->name('save_new_incidentreport');
Route::post('/incidentreport/getincidentreports', [IncidentReportController::class, 'getincidentreports'])->name('getincidentreport');
Route::post('/incidentreport/deleteincidentreport', [IncidentReportController::class, 'deleteincidentreport'])->name('deleteincidentreport');
