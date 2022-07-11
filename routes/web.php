<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TestController;
use App\Http\Livewire\InvoiceTable;

Route::get('/', [ContractorController::class, 'index'])->name('contractor.index');

Route::group(['prefix' => '/contractor'], function() {

    Route::get('/', [ContractorController::class, 'index'])->name('contractor.index');
    Route::get('/add', [ContractorController::class, 'add_view'])->name('contractor.add.get');
    Route::post('/add', [ContractorController::class, 'add'])->name('contractor.add.post');

    Route::get('/edit/{id}', [ContractorController::class, 'edit'])->name('contractor.edit.get');
    Route::post('/edit', [ContractorController::class, 'edit'])->name('contractor.edit.post');

    Route::post('/delete', [ContractorController::class, 'delete'])->name('contractor.delete.post');

});

Route::group(['prefix' => '/invoice'], function() {

    Route::get('/', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/add', [InvoiceController::class, 'add_view'])->name('invoice.add.get');
    Route::post('/add', [InvoiceController::class, 'add'])->name('invoice.add.post');

    Route::get('/edit/{id}', [InvoiceController::class, 'edit'])->name('invoice.edit.get');
    Route::post('/edit', [InvoiceController::class, 'edit'])->name('invoice.edit.post');

    Route::post('/delete', [InvoiceController::class, 'delete'])->name('contractor.delete.post');

});

Route::get('/test', [InvoiceTable::class, 'render'])->name('test.index');
