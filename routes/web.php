<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishesController;
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

Route::get('/', [DishesController::class, 'step1'])->name('step1');
Route::post('/2', [DishesController::class, 'step2'])->name('step2');
Route::post('/3', [DishesController::class, 'step3'])->name('step3');
Route::post('/4', [DishesController::class, 'step4'])->name('step4');

