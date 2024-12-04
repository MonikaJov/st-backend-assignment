<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');

Route::get('/invoice/add', [InvoiceController::class, 'create'])->name('invoice.create');

Route::post('/invoice/add', [InvoiceController::class, 'store'])->name('invoice.store');

Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');

Route::put('/invoice/{id}/edit', [InvoiceController::class, 'update'])->name('invoice.update');

Route::delete('/invoice/{id}/delete', [CourseController::class, 'destroy'])->name('invoice.destroy');

