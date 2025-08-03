<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --primary-color: red;
            /* Couleur principale des boutons/liens actifs (similaire à l'image) */
            --secondary-color: #555;
            --dark-bg: #1c1c1c;
            /* Couleur de fond principale */
            --dark-card-bg: #2a2a2a;
            /* Couleur de fond des cartes */
            --dark-sidebar-bg: #212121;
            /* Couleur de fond de la sidebar */
            --border-color: #333;
            /* Couleur des bordures */
            --text-color-light: #f8f9fa;
            /* Texte clair pour les fonds sombres */
            --text-color-secondary: #aaaaaa;
            /* Texte secondaire, gris */
            --success-color: #28a745;
            /* Couleur de succès (pour la barre de progression) */
            --info-color: #17a2b8;
            /* Couleur d'information (pour la barre de progression) */
        }

        body {
            overflow-x: hidden;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            font-family: Arial, sans-serif;
            /* Police générique pour la compatibilité */
        }

        #wrapper {
            display: flex;
        }

        /* Sidebar */
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -11.3rem;
            /* Cachée par défaut */
            transition: margin .25s ease-out;
            width: 16rem;
            background-color: var(--dark-sidebar-bg) !important;
            border-right: 1px solid var(--border-color);
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            background-color: var(--dark-sidebar-bg);
        }

        #sidebar-wrapper .list-group {
            width: 92%;
        }

        #sidebar-wrapper .list-group-item {
            padding: 0.75rem 1.25rem;
            background-color: var(--dark-sidebar-bg);
            color: var(--text-color-secondary);
            border: none;
            /* Supprime les bordures par défaut des list-group-item */
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #sidebar-wrapper .list-group-item.active {
            background-color: var(--primary-color) !important;
            color: var(--text-color-light) !important;
            border-radius: 5px;
            /* Bordures arrondies pour l'élément actif */
            margin: 0px;
            /* Un peu d'espace sur les côtés */
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-color-light);
        }

        .sidebar-section-title {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-color-secondary) !important;
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
            color: gold;
            /* Couleur des étoiles */
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
        }

        .navbar-dark {
            background-color: var(--dark-bg) !important;
        }

        .bg-dark-secondary {
            background-color: var(--dark-sidebar-bg) !important;
            /* Utilise la même couleur que la sidebar pour le topbar */
        }

        .main-content {
            background-color: var(--dark-bg);
        }

        /* Cards */
        .bg-dark-card {
            background-color: var(--dark-card-bg) !important;
            border-color: var(--border-color) !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .bg-dark-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25) !important;
        }

        .card-title {
            color: var(--text-color-light);
        }

        .card-text {
            color: var(--text-color-secondary);
        }

        .progress {
            background-color: var(--border-color) !important;
        }

        .progress-bar {
            border-radius: 2px;
        }

        .text-xs {
            font-size: 0.65rem;
            /* Pour les petits cercles entre les textes */
            vertical-align: middle;
        }

        /* Task List */
        .task-item .task-icon {
            width: 45px;
            height: 45px;
            background-color: var(--border-color) !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .task-item:hover .task-icon {
            background-color: var(--primary-color) !important;
            transform: scale(1.05);
        }

        .form-switch .form-check-input {
            width: 2.5em;
            height: 1.2em;
            background-color: var(--border-color);
            border-color: var(--border-color);
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .form-switch .form-check-input:checked {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .form-check-label.text-success {
            color: var(--success-color) !important;
        }

        .form-check-label.text-secondary {
            color: var(--text-color-secondary) !important;
        }

        /* Calendar */
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            text-align: center;
        }

        .calendar-day-name {
            font-weight: bold;
            color: var(--text-color-secondary);
            font-size: 0.85rem;
        }

        .calendar-day {
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .calendar-day.text-secondary {
            color: var(--text-color-secondary) !important;
            /* Jours du mois précédent/suivant */
        }

        .calendar-day:not(.text-secondary):hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .calendar-day.highlight {
            background-color: var(--border-color);
            /* Jours avec des événements */
            color: var(--text-color-light);
        }

        .calendar-day.active {
            background-color: var(--primary-color) !important;
            /* Jour actif */
            color: var(--text-color-light);
        }

        /* Schedule */
        .schedule-item {
            display: flex;
            align-items: flex-start;
            /* Alignement en haut pour les horaires */
        }

        .schedule-time {
            min-width: 80px;
            /* Largeur fixe pour l'heure */
            text-align: right;
            font-size: 0.85rem;
            padding-top: 5px;
            /* Pour aligner avec le contenu de la carte */
        }

        .schedule-content {
            border-left: 2px solid var(--border-color);
            /* Ligne verticale */
            padding-left: 15px;
            position: relative;
            flex-grow: 1;
        }

        .schedule-content::before {
            content: '';
            position: absolute;
            left: -7px;
            /* Positionne le cercle sur la ligne */
            top: 10px;
            width: 12px;
            height: 12px;
            background-color: var(--border-color);
            /* Cercle sur la ligne */
            border-radius: 50%;
            z-index: 1;
        }

        .schedule-content .schedule-event {
            margin-bottom: 0.5rem;
            /* Espace entre les événements */
        }

        .schedule-content .schedule-event.bg-primary {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .course-card,
        .task-item,
        .calendar-card,
        .schedule-event {
            animation: fadeIn 0.5s ease-out;
        }

        /* Responsive adjustments */
        @media (min-width: 992px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0rem;
            }

            /* Hide the toggle button on desktop */
            #sidebarToggle {
                display: none !important;
            }
        }

        @media (max-width: 991.98px) {
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                width: 100%;
            }
        }

        /* Custom button for plus sign */
        .btn-primary.btn-sm.rounded-circle {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary.btn-sm.rounded-circle:hover {
            background-color: #e04a40 !important;
            /* Darker shade on hover */
            border-color: #e04a40 !important;
        }

        /* Dropdown menu styling */
        .dropdown-menu.bg-dark-secondary {
            background-color: var(--dark-card-bg) !important;
            /* Use dark card background for dropdown */
            border-color: var(--border-color) !important;
        }

        .dropdown-item.text-white {
            color: var(--text-color-light) !important;
            background-color: transparent !important;
        }

        .dropdown-item.text-white:hover,
        .dropdown-item.text-white:focus {
            background-color: var(--primary-color) !important;
            /* Highlight on hover */
            color: var(--text-color-light) !important;
        }

        .dropdown-divider {
            border-top: 1px solid var(--border-color) !important;
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
            --dark-bg: #F0F2F5;
            /* Fond principal clair */
            --dark-sidebar-bg: #000;
            /* Sidebar plus sombre */
            --dark-card-bg: #FFFFFF;
            /* Cartes blanches */
            --border-color: #CED4DA;
            --text-color-light: #212529;
            /* Texte sombre */
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
                <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Impact Web Logo"
                    style="max-height: 140px;">
            </div>
            <div class="list-group list-group-flush">
                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">GENERAL</div>
                <a href="{{ route('dashboard') }}"
                    class="list-group-item list-group-item-action bg-dark text-white active">
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
                <a href="{{ route('parametres') }}" class="list-group-item list-group-item-action bg-dark text-white">
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
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                    <div class="navbar-text text-white ms-3 d-none d-lg-block">
                        Bienvenue, Peter ! <br> Boostons vos connaissances aujourd'hui et apprenons de nouvelles choses
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}"><i
                                        class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center " href="{{ route('parametres') }}">
                                    <img src="{{ asset(Auth::user()->image && Auth::user()->image !== 'photos/default.svg' ? 'storage/' . Auth::user()->image . '?v=' . time() : 'dossiers/image/default.png') }}"
                                     alt="Photo de profil" class="rounded-circle" style="max-height: 40px; margin-right: 20px;">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid py-4 main-content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-white mb-0">Mes cours</h4>
                            <a href="#" class="text-decoration-none text-primary">Tout voir</a>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-dark-card border-secondary text-white shadow-sm h-100 course-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="logo.png" alt="Impact Web Logo" style="max-height: 100px;"
                                                class="rounded-circle me-2">
                                            <h5 class="card-title mb-0">Envato Mastery</h5>
                                        </div>
                                        <p class="card-text text-secondary mb-2">Créez un revenu passif à partir de...
                                        </p>
                                        <div class="progress bg-secondary mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%;"
                                                aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-secondary">3,2 heures prises / 10 heures</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-dark-card border-secondary text-white shadow-sm h-100 course-card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="logo.png" alt="Impact Web Logo" style="max-height: 100px;"
                                                class="rounded-circle me-2">
                                            <h5 class="card-title mb-0">Google</h5>
                                        </div>
                                        <p class="card-text text-secondary mb-2">Maîtriser Git et l'application Vercel
                                            Devenez Pro...</p>
                                        <div class="progress bg-secondary mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 40%;"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-secondary">2,5 heures prises / 6 heures</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-white mb-0">Tâche du jour</h4>
                            <a href="#" class="text-decoration-none text-primary">Tout voir</a>
                        </div>
                        <div class="task-list">
                            <div class="card bg-dark-card border-secondary text-white shadow-sm mb-3 task-item">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="task-icon me-3 bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-book-open text-white"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Apprendre une nouvelle partie</p>
                                            <small class="text-secondary">Envato Mastery <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Mr. Reynold <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Théorie</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="task1"
                                            checked>
                                        <label class="form-check-label text-success ms-2" for="task1">Fait</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark-card border-secondary text-white shadow-sm mb-3 task-item">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="task-icon me-3 bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-book-open text-white"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Apprendre une nouvelle partie</p>
                                            <small class="text-secondary">Mastering Figma <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Ms. Dyana <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Théorie</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="task2"
                                            checked>
                                        <label class="form-check-label text-success ms-2" for="task2">Fait</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark-card border-secondary text-white shadow-sm mb-3 task-item">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="task-icon me-3 bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-book-open text-white"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Apprendre une nouvelle partie</p>
                                            <small class="text-secondary">Mastering Git & Vercel <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Ms. Gynda <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Théorie</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="task3">
                                        <label class="form-check-label text-secondary ms-2" for="task3">Fait</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-dark-card border-secondary text-white shadow-sm mb-3 task-item">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="task-icon me-3 bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-book-open text-white"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold">Apprendre une nouvelle partie</p>
                                            <small class="text-secondary">Design System Basic <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Ms. Nina <i
                                                    class="fas fa-circle ms-1 me-1 text-xs"></i> Théorie</small>
                                        </div>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="task4">
                                        <label class="form-check-label text-secondary ms-2" for="task4">Fait</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-white mb-0">Mon emploi du temps</h4>
                            <button
                                class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 30px; height: 30px;"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="schedule-list">
                            <div class="schedule-item mb-3">
                                <div class="schedule-time text-secondary me-3">09:00 AM</div>
                                <div class="schedule-content flex-grow-1">
                                    <div class="card bg-dark-card border-secondary text-white shadow-sm schedule-event">
                                        <div class="card-body py-2 px-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item mb-3">
                                <div class="schedule-time text-secondary me-3">10:00 AM</div>
                                <div class="schedule-content flex-grow-1">
                                    <div class="card bg-primary text-white shadow-sm schedule-event">
                                        <div class="card-body py-2 px-3">
                                            <p class="mb-0 fw-bold">UI/UX Design Basic</p>
                                            <small class="text-white-50">Terminez la tâche 12</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item mb-3">
                                <div class="schedule-time text-secondary me-3">11:00 AM</div>
                                <div class="schedule-content flex-grow-1">
                                    <div class="card bg-dark-card border-secondary text-white shadow-sm schedule-event">
                                        <div class="card-body py-2 px-3">
                                            <small class="text-secondary">10H00 - 12H00</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item mb-3">
                                <div class="schedule-time text-secondary me-3">12:00 PM</div>
                                <div class="schedule-content flex-grow-1">
                                    <div class="card bg-dark-card border-secondary text-white shadow-sm schedule-event">
                                        <div class="card-body py-2 px-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item mb-3">
                                <div class="schedule-time text-secondary me-3">01:00 PM</div>
                                <div class="schedule-content flex-grow-1">
                                    <div class="card bg-dark-card border-secondary text-white shadow-sm schedule-event">
                                        <div class="card-body py-2 px-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="schedule-item mb-3">
                                <div class="schedule-time text-secondary me-3">02:00 PM</div>
                                <div class="schedule-content flex-grow-1">
                                    <div class="card bg-dark-card border-secondary text-white shadow-sm schedule-event">
                                        <div class="card-body py-2 px-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("sidebarToggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>