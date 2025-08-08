<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\ParametresController;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\FormationRequest;
use App\Http\Controllers\PaymentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmploieController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ReplayController;
use App\Http\Controllers\ProduitPublicController;

// -----------------------------------------------------------------------------
// Web Routes
// -----------------------------------------------------------------------------

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public pages
Route::get('/sponsors', [HomeController::class, 'sponsor'])->name('sponsor');
Route::get('/intervenant', [HomeController::class, 'intervenant'])->name('intervenant');
Route::get('/evenement', [HomeController::class, 'evenement'])->name('evenement');
Route::get('/evenement/{id}/replays', [ReplayController::class, 'parEvenement'])->name('replays_evenement');

// Paramètres / vues statiques (avec middleware auth)
Route::middleware('auth')->group(function () {
    Route::view('/modifier-profil', 'dashboard_utilisateur.modifier_profil')->name('modifier_profil');
    Route::view('/billet', 'Dashboard.Ticket.CodePromo')->name('billet');
    Route::view('/changer-mot-de-passe', 'dashboard_utilisateur.changer_mot_de_passe')->name('changer_mot_de_passe');
    Route::view('/notification', 'dashboard_utilisateur.notification')->name('notification');
});

// Profil update (avec auth)
Route::middleware('auth')->group(function () {
    Route::post('/parametres/update', [ParametresController::class, 'update'])->name('parametres.update');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
});

// Media upload (avec auth)
Route::middleware('auth')->post('/media/store', [MediaController::class, 'store'])->name('media.store');

// ------------------------------
// Tickets
// ------------------------------

// Billetterie publique
Route::get('/billetterie', [TicketController::class, 'index'])->name('billetterie.index');
Route::get('/billetterie/create', [TicketController::class, 'create'])->name('billetterie.create');
Route::post('/billetterie/store', [TicketController::class, 'store'])->name('billetterie.store');

// Dashboard tickets (admin or auth)
Route::middleware('auth')->get('/dashboard/tickets', [TicketController::class, 'index'])->name('tickets.index');

// Promo code validation
Route::post('/valider-code-promo', [TicketController::class, 'validerCodePromo'])->name('code.promo.valider');

// Étapes réservation (public)
Route::get('/step1', [TicketController::class, 'step1'])->name('step1');
Route::post('/step1', [TicketController::class, 'postStep1'])->name('step1.post');
Route::get('/step2', [TicketController::class, 'step2'])->name('step2');
Route::post('/step2', [TicketController::class, 'postStep2'])->name('step2.post');
Route::get('/step3', [TicketController::class, 'step3'])->name('step3');

// Routes REST tickets (excluant create, store, index)
Route::resource('tickets', TicketController::class)->except(['create', 'store', 'index']);

// ------------------------------
// Boutique / Produits publics
// ------------------------------
Route::get('/boutique', function () {
    $query = \App\Models\article::query();

    if (request()->hasAny(['type', 'size', 'color', 'max_price'])) {
        if (request('type')) {
            $query->where('type', request('type'));
        }
        if (request('size')) {
            $query->where('taille', request('size'));
        }
        if (request('color')) {
            $query->where('couleur', request('color'));
        }
        if (request('max_price')) {
            $query->where('prix', '<=', request('max_price'));
        }
    }

    $articles = $query->get();
    $couleurs = \App\Models\article::whereNotNull('couleur')->where('couleur', '!=', '')->distinct('couleur')->pluck('couleur');

    return view('boutique', compact('articles', 'couleurs'));
})->name('boutique');

Route::controller(ProduitPublicController::class)->group(function () {
    Route::get('/produits/{produit}', 'show')->name('boutique_plus');
    Route::post('/produits/{produit}/commentaires', 'ajouterCommentaire')->name('produit.commentaire');
    Route::post('/newsletter', 'newsletter')->name('newsletter.inscription');
});

// Social Auth (Google)
Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

// Auth routes (login/register/password)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');

// **Route renommée ici pour éviter conflit**
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset.update');

// Localization group (routes traduites / dashboard utilisateur)
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function() {
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [UtilisateurController::class, 'index'])->name('dashboard');

        Route::view('/cours/details', 'dashboard_utilisateur.details_cours')->name('cours.details');
        Route::view('/notifications', 'dashboard_utilisateur.notification')->name('notifications');
        Route::view('/parametres', 'dashboard_utilisateur.parametre')->name('parametres');
        Route::view('/themes', 'dashboard_utilisateur.themes')->name('themes');
        Route::view('/media', 'dashboard_utilisateur.media')->name('media');

        // Support
        Route::get('/soutien', [SupportController::class, 'index'])->name('soutien');
        Route::post('/soutien', [SupportController::class, 'submitContactForm'])->name('soutien.contact');

        Route::view('/changer-mot-de-passe', 'dashboard_utilisateur.changer_mot_de_passe')->name('changer_mot_de_passe');
        Route::view('/modifier-profil', 'dashboard_utilisateur.modifier_profil')->name('modifier_profil');

        // Découvrir / Formations
        Route::get('/decouvrir', [DiscoverController::class, 'index'])->name('decouvrir');
        Route::get('/formation_gratuite/{formationId}', [FormationController::class, 'showContenu'])->name('formation_gratuite');
        Route::get('/formations/{id}', [FormationController::class, 'show'])->name('details');

        // Paiement / Caisse / Monero / NOWPayments
        Route::get('/fedapay/callback', [PaymentController::class, 'fedapayCallback'])->name('fedapay.callback');
        Route::post('/monero/payment', [PaymentController::class, 'moneroPayment'])->name('monero.payment');
        Route::post('/nowpayments/callback', [PaymentController::class, 'nowpaymentsCallback'])->name('nowpayments.callback');
    });
});

// ------------------------------
// Admin ou Backoffice routes
// ------------------------------
// À adapter avec middleware admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('themes', ThemeController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategorieController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('formateurs', IntervenantController::class);
    Route::resource('formations', FormationController::class);
    Route::resource('evenements', EvenementController::class);
    Route::resource('sponsors', SponsorController::class);
    Route::resource('employes', UtilisateurController::class);
    Route::resource('replays', ReplayController::class);
    Route::resource('produits', ProduitPublicController::class);
    Route::resource('cours', CoursController::class);
    Route::resource('calendriers', CalendrierController::class);
    Route::resource('events', EventController::class);
    Route::resource('emploies', EmploieController::class);
});

// -----------------------------------------------------------------------------
// Toutes les autres routes spécifiques, API, etc. peuvent suivre ici...
// -----------------------------------------------------------------------------

