<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
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

//CRUD

    Route::redirect('/', '/works')->name('works');

    Route::get('works', [WorkController::class, 'index'])->name('works');
    Route::get('works/create', [WorkController::class, 'create'])->name('works.create');
    Route::post('works', [WorkController::class, 'store'])->name('works.store');
    Route::delete('works/{work}', [WorkController::class, 'delete'])->name('works.destroy');


    Route::get('works/check', [WorkController::class, 'check'])->name('works.check');
    Route::post('works/check', [WorkController::class, 'checkId'])->name('works.check.id');

    Route::put('works/{work}', [WorkController::class, 'startWork'])->name('works.startWork');
    Route::get('works/{work}/start', [WorkController::class, 'edit'])->name('works.startWorkPage');

    Route::get('works/{work}', [WorkController::class, 'cancel'])->name('works.cancel');
    //Route::get('works/start/{work}', [WorkController::class, 'startWork'])->name('works.startWork');

