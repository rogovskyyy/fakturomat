<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TestController;

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

Route::get('/', [ContractorController::class, 'index'])->name('contractor.index');


Route::group(['prefix' => '/contractor'], function() {

    Route::get('/', [ContractorController::class, 'index'])->name('contractor.index');
    Route::get('/add', [ContractorController::class, 'add_view'])->name('contractor.add.get');
    Route::post('/add', [ContractorController::class, 'add'])->name('contractor.add.post');

});


Route::get('/test', [TestController::class, 'index'])->name('test.index');

