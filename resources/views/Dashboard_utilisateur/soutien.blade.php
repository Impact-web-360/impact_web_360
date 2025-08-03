<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Soutien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variables CSS pour faciliter la gestion des couleurs et espacements */
        :root {
            --primary-color: #FF0000; /* Rouge vif pour correspondre à la maquette */
            --secondary-color: #6c757d; /* Gris de Bootstrap pour les textes secondaires */
            --dark-bg: #1A1A1A; /* Fond principal plus sombre */
            --dark-sidebar-bg: #212121; /* Fond de la sidebar */
            --dark-navbar-bg: #212121; /* Fond de la navbar (same as sidebar for consistency) */
            --dark-card-bg: #2C2C2C; /* Fond des cartes et sections */
            --border-color: #3A3A3A; /* Bordures subtiles */
            --text-color-light: #F8F9FA; /* Texte principal clair */
            --text-color-secondary: #B0B0B0; /* Texte secondaire, plus clair que --secondary-color */
            --hero-section-bg-start: #3B2E74; /* Début du dégradé du hero (from Découvrir page) */
            --hero-section-bg-end: #5A4893; /* Fin du dégradé du hero (from Découvrir page) */
            --hero-text-color: #FFFFFF; /* Couleur du texte dans le hero (from Découvrir page) */
            --hero-circle-color-1: rgba(100, 80, 150, 0.4); /* Cercles de fond du hero (from Découvrir page) */
            --hero-circle-color-2: rgba(130, 110, 180, 0.4); /* (from Découvrir page) */
            --button-active-bg: var(--primary-color); /* Couleur de fond des boutons actifs */
            --button-inactive-bg: var(--dark-card-bg); /* Couleur de fond des boutons inactifs */
            --button-text-inactive: var(--text-color-secondary);
            --stars-gold: gold; /* Gold color for stars */

            /* Specific to Settings Page */
            --save-button-bg: #007bff; /* Blue for save button */
            --save-button-hover: #0056b3;
            --upload-area-bg: #2b2b3f;
            --upload-area-border: #4a4a60;
            --input-group-bg: #3A3A3A; /* Background for the eye icon in password fields */
            --switch-bg-off: #4F4F4F; /* Off state of the toggle switch */
            --switch-bg-on: #34C759; /* Green for on state of toggle switch */
            --social-link-bg: #444; /* Background for social link input */
            --social-link-border: #555;
            --social-link-icon-bg: #3A3A3A;
            --social-link-icon-color: #B0B0B0;


            /* Specific to Payment Success Page */
            --payment-card-bg: #2C2C2C; /* Slightly darker than main background for the card */
            --payment-card-border: #3A3A3A;
            --secondary-button-border: var(--border-color);

            /* Theme specific colors */
            --theme-light-bg: #F8F9FA;
            --theme-light-text: #1A1A1A;
            --theme-dark-bg: #1A1A1A;
            --theme-dark-text: #F8F9FA;
            --theme-dark-card: #2C2C2C;
            --theme-dark-sidebar: #212121;
        }

        body {
            overflow-x: hidden;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            font-family: Arial, sans-serif;
            font-weight: 400; /* Poids de police par défaut */
        }

        /* Base layout with flexbox */
        #wrapper {
            display: flex;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -17rem; /* Hidden by default on mobile */
            transition: margin .25s ease-out;
            width: 16rem;
            background-color: var(--dark-sidebar-bg) !important;
            border-right: 1px solid var(--border-color);
            position: fixed; /* Fixed sidebar on screen */
            z-index: 1030; /* Above content */
            overflow-y: auto; /* Enable scrolling for long content */
            scrollbar-width: thin; /* Firefox */
            scrollbar-color: var(--primary-color) var(--dark-sidebar-bg); /* Firefox */
        }

        /* Webkit scrollbar for Chrome/Safari */
        #sidebar-wrapper::-webkit-scrollbar {
            width: 8px;
        }

        #sidebar-wrapper::-webkit-scrollbar-track {
            background: var(--dark-sidebar-bg);
        }

        #sidebar-wrapper::-webkit-scrollbar-thumb {
            background-color: var(--primary-color);
            border-radius: 10px;
            border: 2px solid var(--dark-sidebar-bg);
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            background-color: var(--dark-sidebar-bg);
        }

        #sidebar-wrapper .list-group {
            width: 92%; /* Adjusted for inset active item */
            margin: 0 auto; /* Center the list group */
        }

        #sidebar-wrapper .list-group-item {
            padding: 0.75rem 1.25rem;
            background-color: var(--dark-sidebar-bg);
            color: var(--text-color-secondary);
            border: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px; /* Consistent border-radius for all items */
        }

        #sidebar-wrapper .list-group-item.active {
            background-color: var(--primary-color) !important;
            color: var(--text-color-light) !important;
            border-radius: 5px;
            margin: 0px; /* Inset effect */
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-color-light);
        }

        .sidebar-section-title {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-color-secondary) !important;
            padding: 10px 20px 5px; /* Adjust padding to align with links */
        }

        .sidebar-promo {
            background-color: var(--primary-color);
            color: var(--text-color-light);
            border-radius: 10px;
            padding: 15px;
            margin-top: 30px;
            width: 85%;
        }

        .sidebar-promo .star-rating i {
            color: var(--stars-gold);
        }

        .sidebar-promo .btn-primary {
            background-color: #fff !important;
            color: var(--primary-color) !important;
            border: none !important;
            font-weight: bold;
            padding: 8px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar-promo .btn-primary:hover {
            background-color: #eee !important;
            color: var(--primary-color) !important;
        }

        /* Page Content */
        #page-content-wrapper {
            min-width: 100vw; /* Takes full width initially */
            background-color: var(--dark-bg);
            transition: margin-left .25s ease-out; /* For push effect */
            padding-left: 0; /* Remove default padding */
        }

        /* Adjust content position when sidebar is open on mobile */
        #wrapper.toggled #page-content-wrapper {
            margin-left: 17rem; /* Pushes content to the right when sidebar is visible */
        }

        /* Top Navbar */
        .navbar-dark {
            background-color: var(--dark-bg) !important;
        }

        .bg-dark-secondary {
            background-color: var(--dark-navbar-bg) !important; /* Use same color as sidebar for consistency */
        }

        /* Dropdown menus in Navbar */
        .dropdown-menu {
            background-color: var(--dark-card-bg) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 0.5rem;
        }

        .dropdown-item {
            color: var(--text-color-light) !important;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: var(--primary-color) !important;
            color: var(--text-color-light) !important;
        }

        .dropdown-divider {
            border-top: 1px solid var(--border-color) !important;
        }

        /* Main Content Area */
        .main-content {
            flex-grow: 1;
            padding: 1.5rem !important;
        }

        /* Support Page Specific Styles */
        .support-header {
            text-align: center;
            padding: 2rem 0;
            margin-bottom: 2rem;
            background-color: var(--dark-card-bg);
            border-radius: 10px;
        }
        .support-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-color-light);
        }
        .support-header p {
            font-size: 1.1rem;
            color: var(--text-color-secondary);
        }

        .support-section {
            margin-bottom: 3rem;
        }
        .support-section h2 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-color-light);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .accordion-item {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .accordion-button {
            background-color: var(--dark-card-bg) !important;
            color: var(--text-color-light) !important;
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .accordion-button:not(.collapsed) {
            color: var(--primary-color) !important;
            background-color: var(--dark-card-bg) !important;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.125);
        }
        .accordion-button:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }
        .accordion-button::after {
            filter: invert(1);
        }

        .accordion-body {
            background-color: var(--dark-card-bg);
            color: var(--text-color-secondary);
        }

        .contact-form-card {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 2rem;
        }

        .form-control {
            background-color: var(--dark-bg);
            border: 1px solid var(--border-color);
            color: var(--text-color-light);
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 0, 0, 0.25);
        }
        .form-control::placeholder {
            color: var(--text-color-secondary);
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-size: 1.1em;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-submit:hover {
            background-color: #cc0000;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Animations */
        .animation-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0; /* Starts hidden */
        }

        .animation-slide-in-up {
            animation: slideInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            opacity: 0; /* Starts hidden */
        }

        /* Keyframes for animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }


        /* Responsive Adjustments */
        @media (min-width: 992px) {
            #sidebar-wrapper {
                margin-left: 0; /* Sidebar visible on large screens */
                position: relative; /* Allow flow on desktop */
            }
            #page-content-wrapper {
                min-width: 0;
                width: 100%;
                margin-left: 0; /* Reset margin for desktop */
            }
            #sidebarToggle {
                display: none !important; /* Hamburger button hidden on desktop */
            }
        }

        @media (max-width: 991.98px) {
            /* Sidebar is hidden by default due to margin-left: -17rem; */
            /* #wrapper.toggled takes care of showing it. */

            #page-content-wrapper {
                width: 100%;
            }
            .navbar h2 {
                font-size: 1.5rem;
            }

            .settings-menu-col {
                border-right: none; /* Remove border on smaller screens */
                padding-right: 15px;
                margin-bottom: 30px; /* Add space below menu */
            }
        }

        @media (max-width: 767.98px) {
            .navbar-collapse {
                display: none !important; /* Hide notification/user icons on very small screens */
            }
            .support-header h1 {
                font-size: 2rem;
            }
            .support-header p {
                font-size: 1rem;
            }
            .support-section h2 {
                font-size: 1.5rem;
            }
            #sidebar-wrapper {
                position: absolute; /* Allow flow on desktop */
            }
        }

        @media (max-width: 575.98px) {
            .sidebar-promo {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
        }

         :root {
        --primary-color: #FF0000;
        --secondary-color: #6c757d;
        --dark-bg: #1A1A1A;
        --dark-sidebar-bg: #212121;
        --dark-card-bg: #2C2C2C;
        --border-color: #3A3A3A;
        --text-color-light: #F8F9FA;
        --text-color-secondary: #B0B0B0;
        --save-button-bg: #007bff;
        --save-button-hover: #0056b3;
        --switch-bg-off: #4F4F4F;
        --input-group-bg: #3A3A3A;
        }

        body {
        background-color: var(--dark-bg);
        color: var(--text-color-light);
        }

        .bg-dark,
        .bg-dark-secondary {
        background-color: var(--dark-sidebar-bg) !important;
        }

        .list-group-item {
        background-color: var(--dark-sidebar-bg);
        color: var(--text-color-secondary);
        }

        .themes-card {
        background-color: var(--dark-card-bg);
        border-color: var(--border-color);
        }

        /* --- Thème Clair --- */
        body.theme-light {
        --primary-color: #0d6efd;
        --secondary-color: #6c757d;
        --dark-bg: #F0F2F5; /* Fond principal clair */
         --dark-sidebar-bg: #000; /* Sidebar plus sombre */
        --dark-card-bg: #FFFFFF; /* Cartes blanches */
        --border-color: #CED4DA;
        --text-color-light: #212529; /* Texte sombre */
        --text-color-secondary: #6c757d;
        --save-button-bg: #0d6efd;
        --save-button-hover: #0a58ca;
        --switch-bg-off: #ADB5BD;
        --input-group-bg: #E9ECEF;
        }

        body.theme-light .list-group-item {
        background-color: var(--dark-sidebar-bg);
        color: var(--text-color-light);
        }

        body.theme-light .list-group-item:hover {
        background-color: #DEE2E6;
        color: var(--primary-color);
        }

        body.theme-light .list-group-item.active {
        background-color: var(--primary-color) !important;
        color: #FFFFFF !important;
        }

        /* --- Thème Sepia --- */
        body.theme-sepia {
        --primary-color: #8B4513;
        --secondary-color: #708090;
        --dark-bg: #F4EEDD;
        --dark-sidebar-bg: #A39686;
        --dark-card-bg: #E8E0D2;
        --border-color: #CDB7A3;
        --text-color-light: #5C4C42;
        --text-color-secondary: #708090;
        --save-button-bg: #8B4513;
        --save-button-hover: #65300F;
        --switch-bg-off: #BDB7A3;
        --input-group-bg: #CDB7A3;
        }

        /* --- Thème Contrast (Haut Contraste) --- */
        body.theme-contrast {
        --primary-color: #00FF00;
        --secondary-color: #FFFFFF;
        --dark-bg: #000000;
        --dark-sidebar-bg: #111111;
        --dark-card-bg: #1c1c1c;
        --border-color: #00FF00;
        --text-color-light: #FFFFFF;
        --text-color-secondary: #00FF00;
        --save-button-bg: #00FF00;
        --save-button-hover: #00CC00;
        --switch-bg-off: #FFFFFF;
        --input-group-bg: #222222;
        }

        /* --- Thème Blue (Bleu) --- */
        body.theme-blue {
        --primary-color: #3498db;
        --secondary-color: #90A4AE;
        --dark-bg: #1e2c4a;
        --dark-sidebar-bg: #1a2a4b;
        --dark-card-bg: #2c426b;
        --border-color: #3e5c91;
        --text-color-light: #e8eaf6;
        --text-color-secondary: #90a4ae;
        --save-button-bg: #3498db;
        --save-button-hover: #2980b9;
        --switch-bg-off: #3e5c91;
        --input-group-bg: #2c426b;
        }


    </style>
</head>
<body class="theme-{{ $userTheme ?? 'dark' }}">
    <div class="d-flex" id="wrapper">
        <div class="bg-dark sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading text-white p-3 border-bottom border-secondary d-flex align-items-center">
                <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Impact Web Logo" style="max-height: 140px;">
            </div>
            <div class="list-group list-group-flush">
                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">GENERAL</div>
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-home me-2"></i> Tableau de bord
                </a>
                <a href="{{ route('calendrier') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-calendar-alt me-2"></i> Calendrier
                </a>
                <a href="{{ route('paiement1') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-credit-card me-2"></i> Paiement
                </a>

                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">COURS</div>
                <a href="{{ route('cours') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-book me-2"></i> Mes cours
                </a>
                <a href="{{ route('decouvrir') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-search me-2"></i> Découvrir
                </a>

                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">OTHER</div>
                <a href="{{ route('soutien') }}" class="list-group-item list-group-item-action bg-dark text-white active">
                    <i class="fas fa-question-circle me-2"></i> Soutien
                </a>
                <a href="{{ route('parametres') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-cog me-2"></i> Paramètre
                </a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark-secondary border-bottom border-secondary py-3">
                <div class="container-fluid">
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle" aria-label="Toggle sidebar"><i class="fas fa-bars"></i></button>
                    <h2 class="text-white mb-0 ms-3">Soutien</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}" aria-label="Notifications"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('parametres') }}">
                                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('logo.png') }}" alt="Photo de profil" style="max-height: 50px;" class="rounded-circle profile-img-preview me-4">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid py-4 main-content">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="support-header animation-fade-in" style="animation-delay: 0.2s;">
                            <h1 class="mb-2">Centre d'aide et de soutien</h1>
                            <p class="mb-0">Trouvez des réponses à vos questions ou contactez-nous directement.</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="support-section animation-fade-in" style="animation-delay: 0.4s;">
                            <h2 class="text-center">Questions fréquemment posées</h2>
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Comment puis-je modifier mon profil ?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Pour modifier votre profil, allez dans les *Paramètres, puis sélectionnez **Modifier le profil*. Vous pourrez y mettre à jour vos informations personnelles.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Quels modes de paiement sont acceptés ?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Nous acceptons les cartes de crédit (Visa, Mastercard, American Express), PayPal, ainsi que les virements bancaires pour les abonnements annuels.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Comment puis-je signaler un problème technique ?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Vous pouvez signaler un problème en utilisant le formulaire de contact ci-dessous. Décrivez le problème en détail et notre équipe vous répondra dans les plus brefs délais.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="support-section animation-fade-in" style="animation-delay: 0.6s;">
                            <h2 class="text-center">Contacter le support</h2>
                            <div class="contact-form-card">
                                <form action="{{ route('soutien.contact') }}" method="POST">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="inputName" class="form-label">Votre nom</label>
                                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Entrez votre nom complet" value="{{ old('name') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEmail" class="form-label">Adresse e-mail</label>
                                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Entrez votre adresse e-mail" value="{{ old('email') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputSubject" class="form-label">Sujet</label>
                                        <input type="text" class="form-control" id="inputSubject" name="subject" placeholder="Ex: Problème de connexion, question de facturation..." value="{{ old('subject') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputMessage" class="form-label">Votre message</label>
                                        <textarea class="form-control" id="inputMessage" name="message" rows="5" placeholder="Décrivez votre problème ou question en détail...">{{ old('message') }}</textarea>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-submit">Envoyer le message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Sidebar Toggle Script
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("sidebarToggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>