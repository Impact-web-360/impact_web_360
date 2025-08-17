<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Formation : {{ $formation->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
         /* Variables CSS pour faciliter la gestion des couleurs et espacements */
        :root {
            --primary-color: red; /* Rouge plus vif pour correspondre à la maquette */
            --secondary-color: #6c757d; /* Gris de Bootstrap pour les textes secondaires */
            --dark-bg: #1A1A1A; /* Fond principal plus sombre */
            --dark-sidebar-bg: #212121; /* Fond de la sidebar */
            --dark-navbar-bg: #212121; /* Fond de la navbar */
            --dark-card-bg: #2C2C2C; /* Fond des cartes et sections */
            --border-color: #3A3A3A; /* Bordures subtiles */
            --text-color-light: #F8F9FA; /* Texte principal clair */
            --text-color-secondary: #B0B0B0; /* Texte secondaire, plus clair que --secondary-color */
            --hero-section-bg-start: #3B2E74; /* Début du dégradé du hero (pour cohérence, non utilisé ici) */
            --hero-section-bg-end: #5A4893; /* Fin du dégradé du hero (pour cohérence, non utilisé ici) */
            --hero-text-color: #FFFFFF; /* Couleur du texte dans le hero (pour cohérence, non utilisé ici) */
            --hero-circle-color-1: rgba(100, 80, 150, 0.4); /* Cercles de fond du hero (pour cohérence, non utilisé ici) */
            --hero-circle-color-2: rgba(130, 110, 180, 0.4); /* Cercles de fond du hero (pour cohérence, non utilisé ici) */
            --button-active-bg: var(--primary-color); /* Couleur de fond des boutons actifs */
            --button-inactive-bg: var(--dark-card-bg); /* Couleur de fond des boutons inactifs */
            --button-text-inactive: var(--text-color-secondary);
            --stars-gold: gold; /* Couleur des étoiles */
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
            min-height: 100vh; /* Ensure wrapper takes full viewport height */
        }

        /* Sidebar */
        #sidebar-wrapper {
            width: 13rem;
            background-color: var(--dark-sidebar-bg) !important;
            border-right: 1px solid var(--border-color);
            flex-shrink: 0; /* Prevent sidebar from shrinking */
            transition: margin .25s ease-out;
            /* Remove position: fixed here */
        }

        #sidebar-wrapper.toggled {
            margin-left: -17rem; /* Use this to hide it when toggled */
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            background-color: var(--dark-sidebar-bg);
        }

        #sidebar-wrapper .list-group {
            width: 92%; /* Ajusté pour qu'il n'y ait pas de marge latérale par défaut */
        }

        #sidebar-wrapper .list-group-item {
            padding: 0.75rem 1.25rem;
            background-color: var(--dark-sidebar-bg);
            color: var(--text-color-secondary);
            border: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #sidebar-wrapper .list-group-item.active {
            background-color: var(--primary-color) !important;
            color: var(--text-color-light) !important;
            border-radius: 5px;
            margin: 0px; /* Ajoute un espace sur les côtés pour l'élément actif */
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
            flex-grow: 1; /* Allows content to take up remaining space */
            background-color: var(--dark-bg);
            min-width: 0; /* Ensures it can shrink if needed */
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

        .navbar-dark {
            background-color: var(--dark-bg) !important;
        }

        .bg-dark-secondary {
            background-color: var(--dark-sidebar-bg) !important;
        }

        .main-content {
            padding: 1.5rem !important;
        }

        .section-header {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-color-light);
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary-color);
            padding-left: 1rem;
        }
        
        .module-list {
            list-style: none;
            padding: 0;
        }
        
        .module-list-item {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .module-list-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .module-header {
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .module-duration {
            font-size: 0.9rem;
            color: var(--text-color-secondary);
        }
        
        .module-video-container {
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        
        .btn-download {
            background-color: var(--primary-color);
            color: var(--text-color-light);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }
        
        .btn-download:hover {
            background-color: #E60000;
        }

        .back-button {
            background-color: var(--dark-card-bg);
            color: var(--text-color-light);
            border: 1px solid var(--border-color);
            transition: background-color 0.3s ease;
        }
        
        .back-button:hover {
            background-color: var(--border-color);
            color: var(--text-color-light);
        }
        
         /* Responsive Adjustments */
        @media (min-width: 992px) {
            #sidebar-wrapper {
                margin-left: 0; /* Sidebar visible on large screens */
            }
            #page-content-wrapper {
                min-width: 0; /* Reset min-width */
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: -17rem; /* Hidden if toggled */
            }
            #sidebarToggle {
                display: none !important; /* Hamburger button hidden on desktop */
            }
        }

        @media (max-width: 991.98px) {
            #sidebar-wrapper {
                margin-left: -17rem; /* Hidden by default on mobile */
                position: fixed; /* Fix sidebar on small screens for toggle effect */
                height: 100vh; /* Ensure it covers full height when open */
                z-index: 1030; /* Above navbar */
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0; /* Sidebar visible if toggled */
            }
            #page-content-wrapper {
                width: 100%;
            }
            .navbar h2 {
                font-size: 1.5rem;
            }
            .course-detail-header h3 {
                font-size: 1.5rem;
            }
            .course-tabs .nav-link {
                padding: 0.5rem 0.75rem;
                font-size: 0.9rem;
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
                <a href="{{ route('cours') }}" class="list-group-item list-group-item-action bg-dark text-white active">
                    <i class="fas fa-book me-2"></i> Mes cours
                </a>
                <a href="{{ route('decouvrir') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-search me-2"></i> Découvrir
                </a>
                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">OTHER</div>
                <a href="" class="list-group-item list-group-item-action bg-dark text-white">
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
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                    <h2 class="text-white mb-0 ms-3">{{ $formation->title }}</h2>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}"><i class="fas fa-bell"></i></a>
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
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('cours') }}" class="btn back-button me-3">
                        <i class="fas fa-arrow-left me-2"></i>
                        Retour à mes cours
                    </a>
                </div>

                <div class="course-section mb-5 p-4 rounded bg-dark-card-bg border border-color">
                    <div class="course-header mb-3">
                        <h3 class="text-white">{{ $formation->title }}</h3>
                        <p class="text-secondary">{{ $formation->modules->count() }} modules disponibles</p>
                    </div>

                    @if($formation->modules->count() > 0)
                        <ul class="module-list">
                            @foreach($formation->modules as $index => $module)
                                <li class="module-list-item d-flex flex-column flex-md-row align-items-md-center">
                                    <div class="flex-grow-1 mb-3 mb-md-0">
                                        <h5 class="module-header text-white">{{ $index + 1 }}. {{ $module->title }}</h5>
                                        <p class="module-duration mb-0"><i class="far fa-clock me-1"></i> Durée : {{ $module->duration }} min</p>
                                    </div>
                                    
                                    <div class="flex-shrink-0 d-flex flex-column flex-md-row align-items-md-center gap-3">
                                        @if(!empty($module->video_path))
                                            <a href="#video-{{ $module->id }}" class="btn btn-danger" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="video-{{ $module->id }}">
                                                <i class="fas fa-play me-1"></i> Voir la vidéo
                                            </a>
                                        @endif
                                        @if(!empty($module->file_path))
                                            <a href="{{ $module->file_path }}" target="_blank" class="btn btn-sm btn-download">
                                                <i class="fas fa-download me-1"></i> Télécharger le fichier
                                            </a>
                                        @endif
                                    </div>
                                </li>
                                
                                <li class="mb-4">
                                    <div class="collapse" id="video-{{ $module->id }}">
                                        <div class="module-video-container mt-2">
                                            <video width="100%" controls>
                                                <source src="{{ $module->video_path }}" type="video/mp4">
                                                Votre navigateur ne supporte pas la lecture de cette vidéo.
                                            </video>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-info" role="alert">
                            Cette formation n'a pas encore de modules.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("sidebarToggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>