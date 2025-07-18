<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\IntervenantController;
use App\Http\Controllers\SponsorController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return 'Bienvenue dans le dashboard';
    });
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('/dashboard/evenements', [EvenementController::class, 'index'])->name('evenements.index');
    Route::post('/dashboard/evenements', [EvenementController::class, 'store'])->name('evenements.store');
    Route::put('/dashboard/evenements/{evenement}', [EvenementController::class, 'update'])->name('evenements.update');
    Route::delete('/dashboard/evenements/{evenement}', [EvenementController::class, 'destroy'])->name('evenements.destroy');

    Route::get('/dashboard/sponsors', [SponsorController::class, 'index'])->name('sponsors.index');
    Route::post('/dashboard/sponsors', [SponsorController::class, 'store'])->name('sponsors.store');
    Route::put('/dashboard/sponsors/{sponsor}', [SponsorController::class, 'update'])->name('sponsors.update');
    Route::delete('/dashboard/sponsors/{sponsor}', [SponsorController::class, 'destroy'])->name('sponsors.destroy');

    Route::get('/dashboard/intervenants', [IntervenantController::class, 'index'])->name('intervenants.index');
    Route::post('/dashboard/intervenants', [IntervenantController::class, 'store'])->name('intervenants.store');
    Route::put('/dashboard/intervenants/{intervenant}', [IntervenantController::class, 'update'])->name('intervenants.update');
    Route::delete('/dashboard/intervenants/{intervenant}', [IntervenantController::class, 'destroy'])->name('intervenants.destroy');
});
