<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/warehouses', [App\Http\Controllers\WarehouseController::class, 'index'])->name('warehouse.index');
Route::get('/warehouses/add', [App\Http\Controllers\WarehouseController::class, 'create'])->name('warehouse.create');
Route::post('/warehouses/add', [App\Http\Controllers\WarehouseController::class, 'store'])->name('warehouse.store');
Route::get('/warehouses/{id}', [App\Http\Controllers\WarehouseController::class, 'edit'])->name('warehouse.edit');
Route::put('/warehouses/{id}', [App\Http\Controllers\WarehouseController::class, 'update'])->name('warehouse.update');
Route::delete('/warehouses/{id}', [App\Http\Controllers\WarehouseController::class, 'destroy'])->name('warehouse.destroy');

Route::get('/machines', [App\Http\Controllers\MachineController::class, 'index'])->name('machine.index');
Route::get('/machines/add', [App\Http\Controllers\MachineController::class, 'create'])->name('machine.create');
Route::post('/machines/add', [App\Http\Controllers\MachineController::class, 'store'])->name('machine.store');
Route::get('/machines/{id}', [App\Http\Controllers\MachineController::class, 'edit'])->name('machine.edit');
Route::put('/machines/{id}', [App\Http\Controllers\MachineController::class, 'update'])->name('machine.update');
Route::delete('/machines/{id}', [App\Http\Controllers\MachineController::class, 'destroy'])->name('machine.destroy');

Route::get('/type-downtimes', [App\Http\Controllers\TypeDowntimeController::class, 'index'])->name('type-downtime.index');
Route::get('/type-downtimes/add', [App\Http\Controllers\TypeDowntimeController::class, 'create'])->name('type-downtime.create');
Route::post('/type-downtimes/add', [App\Http\Controllers\TypeDowntimeController::class, 'store'])->name('type-downtime.store');
Route::get('/type-downtimes/{id}', [App\Http\Controllers\TypeDowntimeController::class, 'edit'])->name('type-downtime.edit');
Route::put('/type-downtimes/{id}', [App\Http\Controllers\TypeDowntimeController::class, 'update'])->name('type-downtime.update');
Route::delete('/type-downtimes/{id}', [App\Http\Controllers\TypeDowntimeController::class, 'destroy'])->name('type-downtime.destroy');

Route::get('/downtimes', [App\Http\Controllers\DowntimeController::class, 'index'])->name('downtime.index');
Route::get('/downtimes/add', [App\Http\Controllers\DowntimeController::class, 'create'])->name('downtime.create');
Route::post('/downtimes/add', [App\Http\Controllers\DowntimeController::class, 'store'])->name('downtime.store');
Route::get('/downtimes/{id}', [App\Http\Controllers\DowntimeController::class, 'edit'])->name('downtime.edit');
Route::put('/downtimes/{id}', [App\Http\Controllers\DowntimeController::class, 'update'])->name('downtime.update');
Route::delete('/downtimes/{id}', [App\Http\Controllers\DowntimeController::class, 'destroy'])->name('downtime.destroy');

Route::get('/downtime-details/{id}', [App\Http\Controllers\DowntimeDetailController::class, 'index'])->name('downtime-detail.index');
Route::post('/downtime-details', [App\Http\Controllers\DowntimeDetailController::class, 'store'])->name('downtime-detail.store');
Route::delete('/downtime-details/{id}', [App\Http\Controllers\DowntimeDetailController::class, 'destroy'])->name('downtime-detail.destroy');