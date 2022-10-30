<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalEntityController;
use App\Http\Controllers\ShipmentController;

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

Route::get('/', [HomeController::class, 'home'])->name("home");


//General routing for all shipment resources.
Route::resource('shipments', ShipmentController::class)->except([
    'index'
]);

//General routing for all JornalEntity resources.
Route::resource('journal_entities', JournalEntityController::class)->only([
    'create', 'store'
]);
