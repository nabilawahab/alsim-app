<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::post('schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
Route::post('schedule/check', [ScheduleController::class, 'check'])->name('schedule.check');
Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule.index');

Route::get('log', [LogController::class, 'index'])->name('log.index');
Route::post('log/store', [LogController::class, 'store'])->name('log.store');
