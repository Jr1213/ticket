<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Tickets\TicketTypeController;
use Illuminate\Support\Facades\Route;

//auth
Route::get('sign-up', [AuthController::class, 'singUpForm'])->name('signUp.form');
Route::post('sign-up', [AuthController::class, 'singUp'])->name('signUp.action');
Route::get('sign-in', [AuthController::class, 'singInForm'])->name('login');
Route::post('sign-in', [AuthController::class, 'singIn'])->name('signIn.action');


Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('ticketTypes', TicketTypeController::class)->names('ticketTpye');
});
