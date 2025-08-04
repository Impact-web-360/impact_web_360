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
                        Bienvenue, {{ Auth::user()->nom }} ! <br> Boostons vos connaissances aujourd'hui et apprenons de nouvelles choses
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
                            <a href="{{ route('cours') }}" class="text-decoration-none text-primary">Tout voir</a>
                        </div>
                        <div class="row mb-4">
                            @forelse($userFormations as $formation)
                                <div class="col-md-6 mb-4">
                                    <div class="card bg-dark-card border-secondary text-white shadow-sm h-100 course-card">
                                        <div class="d-flex align-items-center p-3">
                                            <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Formation Logo"
                                                class="course-logo me-3 rounded-circle" style="max-height: 80px; max-width: 80px;">
                                            
                                            <div class="flex-grow-1">
                                                <h5 class="card-title fw-bold mb-1">{{ Str::limit($formation->title, 40) }}</h5>
                                                <p class="text-secondary mb-1">
                                                    <i class="fas fa-user-tie me-1"></i> {{ $formation->mentor ?? 'Nom du mentor' }}
                                                </p>
                                                <p class="text-secondary mb-0">
                                                    <i class="fas fa-book-open me-1"></i> {{ $formation->modules->count() }} modules
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="progress-section p-3 pt-0">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <small class="text-secondary">Progression</small>
                                                <small class="text-secondary">{{ $formation->pivot->progress ?? 0 }}%</small>
                                            </div>
                                            <div class="progress bg-secondary" style="height: 5px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: {{ $formation->pivot->progress ?? 0 }}%;"
                                                    aria-valuenow="{{ $formation->pivot->progress ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-end p-3">
                                            <a href="{{ route('formation.show', ['formation' => $formation->id]) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-play me-1"></i> Continuer
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-secondary text-center">Vous n'êtes inscrit à aucune formation pour le moment.</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-white mb-0">Tâche du jour</h4>
                            <a href="{{ route('calendrier') }}" class="text-decoration-none text-primary">Tout voir</a>
                        </div>
                        <div class="task-list">
                            @forelse($todayTasks as $task)
                                <div class="card bg-dark-card border-secondary text-white shadow-sm mb-3 task-item">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="task-icon me-3 bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="fas fa-book-open text-white"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 fw-bold">{{ $task->title }}</p>
                                                <small class="text-secondary">
                                                    {{ $task->formation->title }} 
                                                    <i class="fas fa-circle ms-1 me-1 text-xs"></i> 
                                                    {{ $task->start_time->format('H:i') }} - {{ $task->end_time->format('H:i') }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="task-{{ $task->id }}">
                                            <label class="form-check-label text-secondary ms-2" for="task-{{ $task->id }}">Fait</label>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-secondary text-center mt-3">Pas de tâches prévues pour aujourd'hui.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-white mb-0">Mon emploi du temps</h4>
                            <button
                                class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 30px; height: 30px;"
                                data-bs-toggle="modal" data-bs-target="#addEventModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="schedule-list">
                            @if($todayEvents->isEmpty())
                                <div class="card bg-dark-card border-secondary text-white shadow-sm schedule-event text-center">
                                    <div class="card-body py-4 px-3">
                                        <p class="mb-0 text-secondary">Aucun événement prévu pour aujourd'hui.</p>
                                    </div>
                                </div>
                            @else
                                @php
                                    // Générer une plage horaire pour afficher tous les événements
                                    $startHour = 8;
                                    $endHour = 24;
                                @endphp
                                @for ($hour = $startHour; $hour <= $endHour; $hour++)
                                    <div class="schedule-item mb-3">
                                        <div class="schedule-time text-secondary me-3">{{ sprintf('%02d:00', $hour) }}</div>
                                        <div class="schedule-content flex-grow-1">
                                            @php
                                                $eventForThisHour = $todayEvents->first(function ($event) use ($hour) {
                                                    return $event->start_time->hour === $hour;
                                                });
                                            @endphp
                                            @if($eventForThisHour)
                                                <div class="card shadow-sm schedule-event" style="background-color: {{ $eventForThisHour->color }}; border-color: {{ $eventForThisHour->color }};">
                                                    <div class="card-body py-2 px-3">
                                                        <p class="mb-0 fw-bold">{{ $eventForThisHour->title }}</p>
                                                        <small class="text-white-50">{{ $eventForThisHour->start_time->format('H:i') }} - {{ $eventForThisHour->end_time->format('H:i') }}</small>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="card bg-dark-card border-secondary text-white shadow-sm schedule-event">
                                                    <div class="card-body py-2 px-3">
                                                        <small class="text-secondary">{{ sprintf('%02d:00', $hour) }} - {{ sprintf('%02d:00', $hour + 1) }}</small>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark-card text-white">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="addEventModalLabel">{{ __('Ajouter un nouvel événement') }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('events.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">{{ __('Titre de l\'événement') }}</label>
                            <input type="text" class="form-control bg-dark text-white border-secondary" id="eventTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control bg-dark text-white border-secondary" id="eventDescription" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="eventFormation" class="form-label">{{ __('Formation') }}</label>
                            <select class="form-select bg-dark text-white border-secondary" id="eventFormation" name="formation_id" required>
                                <option selected disabled>{{ __('Sélectionnez une formation') }}</option>
                                @foreach($formations as $formation)
                                    <option value="{{ $formation->id }}">{{ $formation->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eventStartDate" class="form-label">{{ __('Date de début') }}</label>
                                <input type="date" class="form-control bg-dark text-white border-secondary" id="eventStartDate" name="start_date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="eventStartTime" class="form-label">{{ __('Heure de début') }}</label>
                                <input type="time" class="form-control bg-dark text-white border-secondary" id="eventStartTime" name="start_time" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eventEndDate" class="form-label">{{ __('Date de fin') }}</label>
                                <input type="date" class="form-control bg-dark text-white border-secondary" id="eventEndDate" name="end_date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="eventEndTime" class="form-label">{{ __('Heure de fin') }}</label>
                                <input type="time" class="form-control bg-dark text-white border-secondary" id="eventEndTime" name="end_time" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="eventColor" class="form-label">{{ __('Couleur de l\'événement') }}</label>
                            <input type="color" class="form-control form-control-color bg-dark border-secondary" id="eventColor" name="color" value="#FF0000" title="Choisissez une couleur">
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary animate-button">{{ __('Enregistrer') }}</button>
                    </div>
                </form>
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