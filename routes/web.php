<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntervenantController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\SponsorController;
use App\Http\Requests\FormationRequest;

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
    return view('index');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sponsors', [HomeController::class, 'sponsor'])->name('sponsor');

Route::get('/intervenant', [HomeController::class, 'intervenant'])->name('intervenant');

Route::get('/evenement', [HomeController::class, 'evenement'])->name('evenement');


Route::get('/billet', function () {
    return view('billet');
})->name('billet');

Route::get('/boutique', function () {
    return view('boutique');
})->name('boutique');

Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


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
    Route::get('/evenement/{id}', [EvenementController::class, 'show']);

    Route::get('/dashboard/sponsors', [SponsorController::class, 'index'])->name('sponsors.index');
    Route::post('/dashboard/sponsors', [SponsorController::class, 'store'])->name('sponsors.store');
    Route::put('/dashboard/sponsors/{sponsor}', [SponsorController::class, 'update'])->name('sponsors.update');
    Route::delete('/dashboard/sponsors/{sponsor}', [SponsorController::class, 'destroy'])->name('sponsors.destroy');

    Route::get('/dashboard/intervenants', [IntervenantController::class, 'index'])->name('intervenants.index');
    Route::post('/dashboard/intervenants', [IntervenantController::class, 'store'])->name('intervenants.store');
    Route::put('/dashboard/intervenants/{intervenant}', [IntervenantController::class, 'update'])->name('intervenants.update');
    Route::delete('/dashboard/intervenants/{intervenant}', [IntervenantController::class, 'destroy'])->name('intervenants.destroy');

     // Catégories
        Route::resource('categories', CategorieController::class);

        // Formations
        Route::resource('formations', FormationController::class);

        Route::get('formations/{formation}/modules', [ModuleController::class,''])->name('modules.create');
    Route::post('formations/{formation}/modules', [ModuleController::class,'store'])->name('modules.store');
        Route::put('formations/{formation}/modules/{module}', [ModuleController::class,'update'])->name('modules.update');
        Route::delete('formations/{formation}/modules/{module}', [ModuleController::class,'destroy'])->name('modules.destroy');
        Route::patch('formations/{formation}/modules/reorder', [ModuleController::class,'reorder'])->name('modules.reorder');
});
