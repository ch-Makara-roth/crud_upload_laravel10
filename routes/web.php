<?php

use App\Http\Controllers\HomeController;
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

Route::get('/' , [HomeController::class , 'index']);

Route::post('/add_product', [HomeController::class, 'create']);
Route::get('/products', [HomeController::class, 'getData']);
Route::get('/update_product/{id}' , [HomeController::class , 'edit']);
Route::put('/edit_product/{id}' , [HomeController::class , 'update'] );

Route::delete('/delete_product/{id}' , [HomeController::class , 'delete']);
