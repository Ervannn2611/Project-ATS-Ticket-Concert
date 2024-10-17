<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\LandingPageController;



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


Route::get('/',[LandingPageController::class, 'index'])->name('landing');

Route::prefix('admin')->name('admin.')->group(function () { 
  Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');
  Route::get('/tickets/create', [TicketController::class, 'create'])->name('create');
  Route::post('/tickets/store', [TicketController::class, 'store'])->name('store');
  Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('show');
  Route::get('/tickets/{id}/edit', [TicketController::class, 'edit'])->name('edit');
  Route::put('/tickets/{id}', [TicketController::class, 'update'])->name('update');
  Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('destroy');
});
