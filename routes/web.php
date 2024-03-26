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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::prefix('warehouses')->group(function(){
        Route::get('/', [App\Http\Controllers\WarehouseController::class, 'index'])->name('warehouse.index');
        Route::get('/add', [App\Http\Controllers\WarehouseController::class, 'create'])->name('warehouse.create');
        Route::post('/add', [App\Http\Controllers\WarehouseController::class, 'store'])->name('warehouse.store');
        Route::get('/{id}', [App\Http\Controllers\WarehouseController::class, 'edit'])->name('warehouse.edit');
        Route::put('/{id}', [App\Http\Controllers\WarehouseController::class, 'update'])->name('warehouse.update');
        Route::delete('/{id}', [App\Http\Controllers\WarehouseController::class, 'destroy'])->name('warehouse.destroy');
    });

    Route::prefix('machines')->group(function(){
        Route::get('/', [App\Http\Controllers\MachineController::class, 'index'])->name('machine.index');
        Route::get('/add', [App\Http\Controllers\MachineController::class, 'create'])->name('machine.create');
        Route::post('/add', [App\Http\Controllers\MachineController::class, 'store'])->name('machine.store');
        Route::get('/{id}', [App\Http\Controllers\MachineController::class, 'edit'])->name('machine.edit');
        Route::put('/{id}', [App\Http\Controllers\MachineController::class, 'update'])->name('machine.update');
        Route::delete('/{id}', [App\Http\Controllers\MachineController::class, 'destroy'])->name('machine.destroy');
    });

    Route::prefix('type-downtimes')->group(function(){
        Route::get('/', [App\Http\Controllers\TypeDowntimeController::class, 'index'])->name('type-downtime.index');
        Route::get('/add', [App\Http\Controllers\TypeDowntimeController::class, 'create'])->name('type-downtime.create');
        Route::post('/add', [App\Http\Controllers\TypeDowntimeController::class, 'store'])->name('type-downtime.store');
        Route::get('/{id}', [App\Http\Controllers\TypeDowntimeController::class, 'edit'])->name('type-downtime.edit');
        Route::put('/{id}', [App\Http\Controllers\TypeDowntimeController::class, 'update'])->name('type-downtime.update');
        Route::delete('/{id}', [App\Http\Controllers\TypeDowntimeController::class, 'destroy'])->name('type-downtime.destroy');
    });
    
    Route::prefix('downtimes')->group(function(){
        Route::get('/', [App\Http\Controllers\DowntimeController::class, 'index'])->name('downtime.index');
        Route::get('/add', [App\Http\Controllers\DowntimeController::class, 'create'])->name('downtime.create');
        Route::post('/add', [App\Http\Controllers\DowntimeController::class, 'store'])->name('downtime.store');
        Route::get('/{id}', [App\Http\Controllers\DowntimeController::class, 'edit'])->name('downtime.edit');
        Route::put('/{id}', [App\Http\Controllers\DowntimeController::class, 'update'])->name('downtime.update');
        Route::delete('/{id}', [App\Http\Controllers\DowntimeController::class, 'destroy'])->name('downtime.destroy');           
    });
    Route::prefix('downtime-details')->group(function(){
        Route::get('/{id}', [App\Http\Controllers\DowntimeDetailController::class, 'index'])->name('downtime-detail.index');
        Route::post('/', [App\Http\Controllers\DowntimeDetailController::class, 'store'])->name('downtime-detail.store');
        Route::delete('/{id}', [App\Http\Controllers\DowntimeDetailController::class, 'destroy'])->name('downtime-detail.destroy');
    });
});
