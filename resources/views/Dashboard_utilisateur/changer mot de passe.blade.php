<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Paramètres - Changer le mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variables CSS pour faciliter la gestion des couleurs et espacements */
        :root {
            --primary-color: #FF0000;
            --secondary-color: #6c757d;
            --dark-bg: #1A1A1A;
            --dark-sidebar-bg: #212121;
            --dark-navbar-bg: #212121;
            --dark-card-bg: #2C2C2C;
            --border-color: #3A3A3A;
            --text-color-light: #F8F9FA;
            --text-color-secondary: #B0B0B0;
            --hero-section-bg-start: #3B2E74;
            --hero-section-bg-end: #5A4893;
            --hero-text-color: #FFFFFF;
            --hero-circle-color-1: rgba(100, 80, 150, 0.4);
            --hero-circle-color-2: rgba(130, 110, 180, 0.4);
            --button-active-bg: var(--primary-color);
            --button-inactive-bg: var(--dark-card-bg);
            --button-text-inactive: var(--text-color-secondary);
            --stars-gold: gold;
            --save-button-bg: #007bff;
            --save-button-hover: #0056b3;
            --upload-area-bg: #2b2b3f;
            --upload-area-border: #4a4a60;
            --input-group-bg: #3A3A3A;
            --payment-card-bg: #2C2C2C;
            --payment-card-border: #3A3A3A;
            --secondary-button-border: var(--border-color);
        }

        body {
            overflow-x: hidden;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            font-family: Arial, sans-serif;
            font-weight: 400;
        }

        /* Base layout with flexbox */
        #wrapper {
            display: flex;
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -17rem;
            transition: margin .25s ease-out;
            width: 16rem;
            background-color: var(--dark-sidebar-bg) !important;
            border-right: 1px solid var(--border-color);
            position: fixed;
            z-index: 1030;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--primary-color) var(--dark-sidebar-bg);
        }

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
            width: 92%;
            margin: 0 auto;
        }

        #sidebar-wrapper .list-group-item {
            padding: 0.75rem 1.25rem;
            background-color: var(--dark-sidebar-bg);
            color: var(--text-color-secondary);
            border: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
        }

        #sidebar-wrapper .list-group-item.active {
            background-color: var(--primary-color) !important;
            color: var(--text-color-light) !important;
            border-radius: 5px;
            margin: 0px;
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-color-light);
        }

        .sidebar-section-title {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-color-secondary) !important;
            padding: 10px 20px 5px;
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
            min-width: 100vw;
            background-color: var(--dark-bg);
            transition: margin-left .25s ease-out;
            padding-left: 0;
        }

        #wrapper.toggled #page-content-wrapper {
            margin-left: 17rem;
        }

        /* Top Navbar */
        .navbar-dark {
            background-color: var(--dark-bg) !important;
        }

        .bg-dark-secondary {
            background-color: var(--dark-navbar-bg) !important;
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

        /* Settings Page General Styles */
        .settings-menu-col {
            padding-right: 20px;
            border-right: 1px solid var(--border-color);
        }

        .settings-menu {
            margin-top: 0;
            padding-left: 0;
        }

        .settings-menu-title {
            font-size: 0.9em;
            color: var(--text-color-secondary);
            padding: 10px 0 5px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .settings-menu li a {
            padding: 10px 15px;
            font-size: 1em;
            display: block;
            color: var(--text-color-light);
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .settings-menu li a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .settings-menu li a:hover {
            background-color: var(--dark-card-bg);
            color: var(--primary-color);
            transform: translateX(3px);
        }

        .settings-menu li a.active {
            background-color: var(--dark-card-bg);
            color: var(--primary-color);
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logout-item {
            padding-top: 20px;
            margin-top: auto;
        }

        .logout-item a {
            color: var(--primary-color) !important;
        }

        .logout-item a:hover {
            background-color: var(--dark-card-bg);
            color: var(--primary-color) !important;
        }

        .password-settings-form,
        .profile-settings-form {
            padding-left: 30px;
        }

        .form-section-title {
            color: var(--text-color-light);
            font-size: 1.5em;
            font-weight: 600;
        }

        .password-card,
        .profile-card {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .password-card .card-title,
        .profile-card .card-title {
            color: var(--text-color-light);
            font-size: 1.2em;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .password-card .card-subtitle,
        .profile-card .card-subtitle {
            color: var(--text-color-secondary) !important;
            font-size: 0.9em;
        }

        .form-label-custom {
            color: var(--text-color-secondary);
            font-weight: 500;
            font-size: 0.95em;
        }

        .form-control-custom {
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 0, 0, 0.25);
            outline: none;
        }

        /* Password input group with eye icon - MODIFIED FOR BETTER FUNCTIONALITY */
        .password-input-group {
            position: relative;
        }

        .password-input-group .form-control-custom {
            padding-right: 45px;
            /* Space for eye icon */
            border-radius: 8px;
            width: 100%;
        }

        .password-input-group .input-group-text {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            background-color: transparent;
            border: none;
            cursor: pointer;
            z-index: 5;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color-secondary);
            transition: color 0.3s ease;
        }

        .password-input-group .input-group-text:hover {
            color: var(--primary-color);
        }

        /* Profile Photo Upload */
        .profile-photo-upload .profile-img-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-out;
        }

        .upload-area {
            flex-grow: 1;
            border: 2px dashed var(--upload-area-border);
            background-color: var(--upload-area-bg);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            border-color: var(--primary-color);
            background-color: rgba(255, 0, 0, 0.1);
        }

        .upload-icon {
            font-size: 2.5em;
            color: var(--primary-color);
        }

        .upload-text {
            font-size: 0.95em;
            color: var(--text-color-light);
            margin-bottom: 0;
        }

        .upload-info {
            font-size: 0.8em;
            color: var(--text-color-secondary);
            margin-bottom: 0;
        }

        /* Save Button */
        .btn-save {
            background-color: var(--save-button-bg);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-size: 1.1em;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-save:hover {
            background-color: var(--save-button-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        /* Animations */
        .animation-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        .animation-slide-in-up {
            animation: slideInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Adjustments */
        @media (min-width: 992px) {
            #sidebar-wrapper {
                margin-left: 0;
                position: relative;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
                margin-left: 0;
            }

            #sidebarToggle {
                display: none !important;
            }
        }

        @media (max-width: 991.98px) {
            #page-content-wrapper {
                width: 100%;
            }

            .navbar h2 {
                font-size: 1.5rem;
            }

            .settings-menu-col {
                border-right: none;
                padding-right: 15px;
                margin-bottom: 30px;
            }

            .password-settings-form,
            .profile-settings-form {
                padding-left: 15px;
            }

            #sidebar-wrapper {
                position: absolute;
            }
        }

        @media (max-width: 767.98px) {
            .navbar-collapse {
                display: none !important;
            }

            .settings-menu-col,
            .password-settings-form,
            .profile-settings-form {
                width: 100%;
                padding-left: 15px;
                padding-right: 15px;
            }

            #sidebar-wrapper {
                position: absolute;
            }
        }

        @media (max-width: 575.98px) {
            .sidebar-promo {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }

            .profile-photo-upload {
                flex-direction: column;
                align-items: center !important;
            }

            .profile-img-preview {
                margin-bottom: 20px;
                margin-right: 0 !important;
            }

            .upload-area {
                width: 100%;
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
                <a href="{{ route('soutien') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-question-circle me-2"></i> Soutien
                </a>
                <a href="{{ route('parametres') }}" class="list-group-item list-group-item-action bg-dark text-white active">
                    <i class="fas fa-cog me-2"></i> Paramètre
                </a>

                <!--<div class="sidebar-promo p-3 mx-3 mt-4 rounded text-center">
                    <p class="text-white mb-2 fw-bold">Profitez de</p>
                    <p class="text-white fs-3 fw-bold mb-1">-30%</p>
                    <p class="text-white mb-2">sur la Formation en montage vidéo</p>
                    <div class="star-rating mb-3">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                    </div>
                    <button class="btn btn-primary w-100 rounded-pill">Profitez!</button>
                </div>-->
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark-secondary border-bottom border-secondary py-3">
                <div class="container-fluid">
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle" aria-label="Toggle sidebar"><i class="fas fa-bars"></i></button>
                    <h2 class="text-white mb-0 ms-3">Paramètres</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}" aria-label="Notifications"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center " href="{{ route('parametres') }}">
                                    <img src="{{ asset(Auth::user()->image && Auth::user()->image !== 'photos/default.svg' ? 'storage/' . Auth::user()->image . '?v=' . time() : 'dossiers/image/default.png') }}"
                                     alt="Photo de profil" class="rounded-circle" style="max-height: 40px;">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid py-4 main-content">
                <div class="row">
                    <div class="col-md-4 col-lg-3 settings-menu-col animation-slide-in-up">
                        <ul class="list-unstyled settings-menu">
                            <li class="settings-menu-title">Profil de l'entreprise</li>
                            <li><a href="{{ route('parametres') }}"><i class="fas fa-cog me-2"></i> Général général</a></li>
                            <li><a href="{{ route('modifier profil') }}"><i class="fas fa-user-edit me-2"></i> Modifier le profil</a></li>
                            <li><a href="{{ route('changer mot de passe') }}" class="active"><i class="fas fa-key me-2"></i> Changer le mot de passe</a></li>
                            <li><a href="{{ route('notification') }}"><i class="fas fa-bell me-2"></i> Notification</a></li>

                            <li class="settings-menu-title mt-4">préférence</li>
                            <li><a href="{{ route('langues') }}"><i class="fas fa-language me-2"></i> Langue de travail</a></li>
                            <li><a href="{{ route('themes') }}"><i class="fas fa-palette me-2"></i> Thèmes abordés</a></li>

                            <li class="settings-menu-title mt-4">applications</li>
                            <li><a href="{{ route('media') }}"><i class="fas fa-share-alt me-2"></i> Médias sociaux</a></li>

                            <li class="mt-auto logout-item">
                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                    @csrf
                                    <a href="Déconnexion" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Se déconnecter
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-8 col-lg-9 password-settings-form animation-fade-in" style="animation-delay: 0.2s;">
                        <h4 class="form-section-title mb-4">Changer le mot de passe</h4>
                        <p class="text-white-50 mb-4">
                            Pour changer votre mot de passe, veuillez remplir les champs ci-dessous. Votre mot de passe doit contenir au moins 8 caractères, il doit également inclure au moins 1 lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.
                        </p>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="card password-card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Mot de passe actuel</h5>
                                    <p class="card-subtitle mb-3 text-muted">Cela nous aidera à vérifier que c'est vraiment vous</p>

                                    @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif

                                    <div class="password-input-group">
                                        <input type="password" name="current_password" id="current_password" class="form-control form-control-custom" required>
                                        <span class="input-group-text toggle-password" data-target="current_password">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card password-card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Nouveau mot de passe</h5>
                                    <p class="card-subtitle mb-3 text-muted">Suivre nos directives de mot de passe assurera une expérience de connexion forte et protégée.</p>
                                    <div class="password-input-group">
                                        <input type="password" name="new_password" id="new_password" class="form-control form-control-custom" required>
                                        @error('new_password')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                        @enderror
                                        <span class="input-group-text toggle-password" data-target="new_password">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card password-card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Confirmer le nouveau mot de passe</h5>
                                    <p class="card-subtitle mb-3 text-muted">Assurez-vous que ce mot de passe correspond au précédent</p>
                                    <div class="password-input-group">
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control form-control-custom" required>
                                        <span class="input-group-text toggle-password" data-target="new_password_confirmation">
                                            <i class="fas fa-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-save">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Sidebar Toggle Script
        document.getElementById("sidebarToggle").onclick = function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        };

        // Enhanced Password Visibility Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-password');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.replace('fa-eye-slash', 'fa-eye');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.replace('fa-eye', 'fa-eye-slash');
                    }
                });

                // Style du curseur
                button.style.cursor = 'pointer';
            });
        });
    </script>
</body>

</html>