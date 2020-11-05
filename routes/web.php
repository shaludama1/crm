<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PlanController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/' , function() { return redirect('/login'); });


Route::resource('shops', ShopController::class);
Route::resource('plans', PlanController::class)->except(['store' , 'create']);
Route::resource('clients', ClientController::class)->except(['store' , 'create']);

Route::get('shops/{id}/plans/create' , [PlanController::class , 'create'])->name('plans.create');
Route::get('shops/{id}/clients/create' , [ClientController::class , 'create'])->name('clients.create');

Route::post('shops/{id}/plan/store' , [PlanController::class , 'store']);
Route::post('shops/{id}/client/store' , [ClientController::class , 'store']);

Route::post('plans/{id}/add' , [PlanController::class , 'addClient'])->name('plans.add_client');
Route::post('clients/{id}/add' , [ClientController::class , 'addPlan'])->name('clients.add_plan');

Route::get('plans/{id}/change' , [PlanController::class , 'changePlanStatus'])->name('plans.change');
