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
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DiscoverController;
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



// Étapes réservation
Route::get('/step1', [TicketController::class, 'step1'])->name('step1');
Route::post('/step1', [TicketController::class, 'postStep1'])->name('step1.post');
Route::get('/step2', [TicketController::class, 'step2'])->name('step2');
Route::post('/step2', [TicketController::class, 'postStep2'])->name('step2.post');
Route::get('/step3', [TicketController::class, 'step3'])->name('step3');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

// CRUD
Route::resource('tickets', TicketController::class)->except(['create', 'store']);

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
        return view('dashboard_utilisateur.tableau de bord'); // page d'accueil
    })->name('dashboard');

    Route::get('/calendrier', function () {
        return view('dashboard_utilisateur.calendrier');
    })->name('calendrier');

    Route::get('/messages', function () {
        return view('dashboard_utilisateur.message');
    })->name('messages');

    Route::get('/cours', function () {
        return view('dashboard_utilisateur.cours');
    })->name('cours');

    Route::get('/cours/details', function () {
        return view('dashboard_utilisateur.details_cours');
    })->name('cours.details');

    Route::get('/paiement1', function () {
        return view('dashboard_utilisateur.paiement1');
    })->name('paiement1');

    Route::get('/notifications', function () {
        return view('dashboard_utilisateur.notification');
    })->name('notifications');

    Route::get('/parametres', function () {
        return view('dashboard_utilisateur.parametre');
    })->name('parametres');

    Route::get('/changer-mot-de-passe', function () {
        return view('dashboard_utilisateur.changer_mot_de_passe');
    })->name('changer_mot_de_passe');

    Route::get('/modifier-profil', function () {
        return view('dashboard_utilisateur.modifier_profil');
    })->name('modifier_profil');
    //decouvrir
    Route::get('/decouvrir', [DiscoverController::class, 'index'])->name('decouvrir');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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
    Route::get('/dashboard/categories/create', [CategorieController::class, 'create'])
    ->name('Dashboard.categories.create');
    Route::get('/dashboard/categories/index', [CategorieController::class, 'index'])
        ->name('Dashboard.categories.index');
    Route::post('/dashboard/categories/store', [CategorieController::class, 'store'])
        ->name('Dashboard.categories.store');
    Route::Get('/dashboard/categories/{id}/edit', [CategorieController::class, 'edit'])
        ->name('Dashboard.categories.edit');
    Route::post('/dashboard/categories/destroy', [CategorieController::class, 'destroy'])
        ->name('Dashboard.categories.destroy');
    Route::put('/dashboard/categories/{id}', [CategorieController::class, 'update'])
        ->name('Dashboard.categories.update');
    

    // Formations
    Route::resource('formations', FormationController::class);
    Route::get('/dashboard/formations/create', [FormationController::class, 'create'])
    ->name('Dashboard.formations.create');
    Route::get('/dashboard/formations/index', [FormationController::class, 'index'])
        ->name('Dashboard.formations.index');
    Route::Get('/dashboard/formations{id}/edit', [FormationController::class, 'edit'])
        ->name('Dashboard.formations.edit');
    Route::post('/dashboard/formations/store', [FormationController::class, 'store'])
        ->name('Dashboard.formations.store');
    Route::post('/dashboard/formations/destroy', [FormationController::class, 'destroy'])
        ->name('Dashboard.formations.destroy');
     Route::put('/dashboard/formations/{id}', [FormationController::class, 'update'])
        ->name('Dashboard.formations.update');



    Route::get('formations/{formation}/modules', [ModuleController::class, ''])->name('modules.create');
    Route::post('formations/{formation}/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::put('formations/{formation}/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('formations/{formation}/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
    Route::patch('formations/{formation}/modules/reorder', [ModuleController::class, 'reorder'])->name('modules.reorder');
});
