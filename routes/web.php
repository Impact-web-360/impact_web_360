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

//Paramètres
Route::get('/modifier profil', function () {
    return view('dashboard_utilisateur.modifier profil');
})->name('modifier profil');

//Changer de mot de passe
Route::get('/changer mot de passe', function () {
    return view('dashboard_utilisateur.changer mot de passe');
})->name('changer mot de passe');

//Notification
Route::get('/notification', function () {
    return view('dashboard_utilisateur.notification');
})->name('notification');

//Profil update
Route::post('/parametres/update', [ParametresController::class, 'update'])->name('parametres.update');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::put('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update')->middleware('auth');

//Media
Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');

//Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Déconnecté avec succès.');
})->name('logout')->middleware('auth');






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
    $query = \App\Models\article::query();
    
    // Appliquer le filtrage seulement si des paramètres de filtre sont présents dans la requête
    // Cela se produit lorsque l'utilisateur clique sur le bouton "Appliquer"
    if (request()->hasAny(['type', 'size', 'color', 'max_price'])) {
        // Filtrage par type
        if (request('type')) {
            $query->where('type', request('type'));
        }
        
        // Filtrage par taille
        if (request('size')) {
            $query->where('taille', request('size'));
        }
        
        // Filtrage par couleur
        if (request('color')) {
            $query->where('couleur', request('color'));
        }
        
        // Filtrage par prix maximum
        if (request('max_price')) {
            $query->where('prix', '<=', request('max_price'));
        }
    }
    
    // Récupérer tous les articles (filtrés seulement si des filtres sont appliqués via le formulaire)
    $articles = $query->get();
    
    // Récupérer les couleurs uniques des articles existants
    $couleurs = \App\Models\article::whereNotNull('couleur')->where('couleur', '!=', '')->distinct('couleur')->pluck('couleur');
    
    return view('boutique', compact('articles', 'couleurs'));
})->name('boutique');

Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// web.php

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function(){
    // Toutes vos routes qui nécessitent d'être traduites
    // seront préfixées par la locale (ex: /en/dashboard, /fr/dashboard)
        Route::middleware('auth')->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard_utilisateur.tableau de bord'); // page d'accueil
            })->name('dashboard');


            

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


            Route::get('/themes', function () {
                return view('dashboard_utilisateur.themes');
            })->name('themes');

            Route::get('/media', function () {
                return view('dashboard_utilisateur.media');
            })->name('media');

            Route::get('/soutien', function () {
                return view('dashboard_utilisateur.soutien');
            })->name('soutien');

            Route::get('/changer-mot-de-passe', function () {
                return view('dashboard_utilisateur.changer_mot_de_passe');
            })->name('changer_mot_de_passe');

            Route::get('/modifier-profil', function () {
                return view('dashboard_utilisateur.modifier_profil');
            })->name('modifier_profil');
            //decouvrir
            Route::get('/decouvrir', [DiscoverController::class, 'index'])->name('decouvrir');

            Route::get('/formation_gratuite/{formationId}', [FormationController::class, 'showContenu'])->name('formation_gratuite');
            Route::get('/formations/{id}', [FormationController::class, 'show'])->name('details');

            //caisse
            Route::get('/fedapay/callback', [PaymentController::class, 'handleFedapayCallback'])->name('fedapay.callback');
            Route::post('/fedapay/webhook', [PaymentController::class, 'handleWebhook'])->name('fedapay.webhook');
            Route::post('/fedapay/callback/{user_formation_id}', [PaymentController::class, 'handleCallback'])->name('fedapay.callback');

            Route::get('/caisse/{formationId}', [PaymentController::class, 'showPaymentForm'])
            ->name('caisse');
            Route::post('/caisse', [PaymentController::class, 'processPayment'])
            ->name('caisse.process');
            
            Route::get('/paiement_success', [PaymentController::class, 'showPaymentSuccess'])
            ->name('Dashboard_utilisateur.paiement_success');
            Route::get('/paiement_failure', [PaymentController::class, 'showPaymentFailure'])
            ->name('Dashboard_utilisateur.paiement_failure');

            // Route pour afficher la page des paramètres de langue
            Route::get('/langues', [ParametresController::class, 'showLanguageSettings'])->name('langues');
            // Route pour traiter la mise à jour de la langue
            Route::post('/langues', [ParametresController::class, 'updateLanguage'])->name('update.language');

            Route::post('/themes', [ThemeController::class, 'update'])->name('themes.update');

            Route::get('/soutien', [SupportController::class, 'index'])->name('soutien');
            Route::post('/soutien', [SupportController::class, 'submitContactForm'])->name('soutien.contact');

            Route::post('/ajouter-cours/{formation}', [CoursController::class, 'ajouterFormation'])
            ->name('ajouter-cours');
            //Route::get('/cours', [CoursController::class, 'index'])->name('cours');
            Route::match(['get', 'post'], '/cours', [CoursController::class, 'index'])->name('cours');
            Route::get('/cours/{formation}', [CoursController::class, 'showFormation'])->name('formation.show');

            Route::get('/calendrier', [CalendrierController::class, 'index'])->name('calendrier')->middleware('auth');
            Route::post('/events', [EventController::class, 'store'])->name('events.store');

    });
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
    Route::delete('/dashboard/categories/{categorie}', [CategorieController::class, 'destroy'])
        ->name('Dashboard.categories.destroy');
    Route::put('/dashboard/categories/{id}', [CategorieController::class, 'update'])
        ->name('Dashboard.categories.update');

        // Articles
    Route::get('/dashboard/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/dashboard/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/dashboard/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/dashboard/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/dashboard/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/dashboard/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');


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
    Route::Delete('/dashboard/formations/{formation}', [FormationController::class, 'destroy'])
        ->name('Dashboard.formations.destroy');
    Route::put('/dashboard/formations/{id}', [FormationController::class, 'update'])
        ->name('Dashboard.formations.update');
    


    //Modules
    Route::resource('modules', ModuleController::class);
    Route::get('/dashboard/modules/create', [ModuleController::class, 'create'])
        ->name('Dashboard.modules.create');
    Route::get('/dashboard/modules/index', [ModuleController::class, 'index'])
        ->name('Dashboard.modules.index');
    Route::get('/dashboard/modules/{module}/edit', [ModuleController::class, 'edit'])
    ->name('Dashboard.modules.edit');
    Route::post('/dashboard/modules/store', [ModuleController::class, 'store'])
        ->name('Dashboard.modules.store');
    Route::delete('/dashboard/modules/{module}', [ModuleController::class, 'destroy'])
        ->name('Dashboard.modules.destroy');
    Route::put('/dashboard/modules/{module}', [ModuleController::class, 'update'])
        ->name('Dashboard.modules.update');




    Route::get('formations/{formation}/modules', [ModuleController::class, ''])->name('modules.create');
    Route::post('formations/{formation}/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::put('formations/{formation}/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('formations/{formation}/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
    Route::patch('formations/{formation}/modules/reorder', [ModuleController::class, 'reorder'])->name('modules.reorder');
});