<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Détail du cours: {{ $formation->title ?? 'Formation' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />
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

        .navbar-dark {
            background-color: var(--dark-bg) !important;
        }

        .bg-dark-secondary {
            background-color: var(--dark-sidebar-bg) !important;
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
            padding: 1.5rem !important;
        }

        /* Course Detail Specific Styles */
        .course-detail-section {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 1.5rem;
        }

        .course-detail-header img {
            width: 100%;
            height: 250px;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .course-detail-header h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-color-light);
            margin-bottom: 1rem;
        }

        .course-tabs .nav-link {
            background-color: transparent;
            color: var(--text-color-secondary);
            border: none;
            border-bottom: 2px solid transparent;
            border-radius: 0;
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            transition: color 0.2s ease, border-color 0.2s ease;
        }

        .course-tabs .nav-link.active {
            color: var(--text-color-light);
            border-bottom-color: var(--primary-color);
        }

        .course-tabs .nav-link:hover:not(.active) {
            color: var(--text-color-light);
        }

        .course-description p {
            color: var(--text-color-secondary);
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .course-description p i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        .course-description ul {
            list-style: none; /* Supprime les puces par défaut */
            padding-left: 0;
        }

        .course-description ul li {
            color: var(--text-color-secondary);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .course-description ul li i {
            color: var(--primary-color);
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        /* Overview Card */
        .overview-card {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .overview-item {
            text-align: center;
        }

        .overview-item i {
            font-size: 1.5rem;
            color: var(--text-color-secondary);
            margin-bottom: 0.5rem;
        }

        .overview-item p {
            font-size: 0.9rem;
            color: var(--text-color-secondary);
            margin-bottom: 0;
        }

        .overview-item .value {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-color-light);
        }

        .price-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
            margin-top: 1rem;
        }

        .price-section .price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .btn-add-to-cart {
            background-color: var(--primary-color);
            color: var(--text-color-light);
            border: none;
            border-radius: 0.5rem;
            padding: 0.4rem 3rem;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        /* About Mentor Section */
        .mentor-card {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .mentor-card .mentor-avatar {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 2px solid var(--primary-color);
        }

        .mentor-card .mentor-name {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-color-light);
            margin-bottom: 0.25rem;
        }

        .mentor-card .mentor-title {
            font-size: 0.9rem;
            color: var(--text-color-secondary);
            margin-bottom: 1rem;
        }

        .mentor-card p {
            font-size: 0.9rem;
            color: var(--text-color-secondary);
            line-height: 1.6;
        }

        .mentor-card .rating {
            font-size: 0.9rem;
            color: var(--text-color-secondary);
            margin-top: 1rem;
        }

        .mentor-card .rating i {
            color: var(--stars-gold);
            margin-right: 0.25rem;
        }

        /* Modules Section */
        .modules-card {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 1.5rem;
        }

        .modules-card .module-item {
            padding: 0.75rem 0;
            border-bottom: 1px dashed var(--border-color);
            color: var(--text-color-secondary);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modules-card .module-item:last-child {
            border-bottom: none;
        }

        .modules-card .module-item span:first-child {
            font-weight: 500;
            color: var(--text-color-light);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animation-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0; /* Start hidden */
        }

        .animation-slide-in-up {
            animation: slideInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            opacity: 0; /* Start hidden */
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

        @media (max-width: 767.98px) {
            .navbar-collapse {
                display: none !important; 
            }
            .course-detail-header img {
                height: 200px;
            }
            .course-detail-section {
                padding: 1rem;
            }
            .overview-item {
                margin-bottom: 1rem;
            }
            .overview-item:last-child {
                margin-bottom: 0;
            }
            .price-section {
                flex-direction: column;
                align-items: flex-start;
            }
            .price-section .price {
                margin-bottom: 0.5rem;
            }
            .btn-add-to-cart {
                width: 100%;
            }
        }

        @media (max-width: 575.98px) {
            .sidebar-promo {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
            .course-detail-header h3 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
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
                <a href="{{ route('calendrier') }}" class="list-group-item list-group-item-action bg-dark text-white ">
                    <i class="fas fa-calendar-alt me-2"></i> Calendrier
                </a>
                <a href="{{ route('messages') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-comment-alt me-2"></i> Message
                </a>
                <a href="{{ route('paiement1') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-credit-card me-2"></i> Paiement
                </a>

                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">COURS</div>
                <a href="{{ route('cours') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-book me-2"></i> Mes cours
                </a>
                <a href="{{ route('decouvrir') }}" class="list-group-item list-group-item-action bg-dark text-white active">
                    <i class="fas fa-search me-2"></i> Découvrir
                </a>

                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">OTHER</div>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-question-circle me-2"></i> Soutien
                </a>
                <a href="{{ route('parametres') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-cog me-2"></i> Paramètre
                </a>

                <div class="sidebar-promo p-3 mx-3 mt-4 rounded text-center">
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
                </div>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark-secondary border-bottom border-secondary py-3">
                <div class="container-fluid">
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                    <h2 class="text-white mb-0 ms-3">Détail du cours</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}"><i class="fas fa-bell"></i></a>
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
                @if($formation)
                <div class="row">
                    <div class="col-lg-8 mb-4 animation-slide-in-up">
                        <div class="course-detail-section">
                            <div class="course-detail-header">
                                @if ($formation->image)
                                    <img src="{{ asset('storage/' . $formation->image) }}" class="img-fluid" alt="Image de {{ $formation->title }}">
                                @else
                                    <img src="{{ asset('images/default-course.png') }}" class="img-fluid" alt="Image par défaut">
                                @endif
                                <h3 class="text-white mb-4">{{ $formation->title ?? 'Titre de la formation' }}</h3>
                            </div>

                            <ul class="nav nav-pills course-tabs mb-4" id="courseTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tools-tab" data-bs-toggle="tab" data-bs-target="#tools" type="button" role="tab" aria-controls="tools" aria-selected="false">Outils de travail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">Modules</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="courseTabContent">
                                <div class="tab-pane fade show active course-description" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <p>{{ $formation->description ?? 'Pas de description détaillée disponible pour cette formation.' }}</p>
                                    @if($formation->objectives && count($formation->objectives) > 0)
                                        <p class="text-white fw-bold mt-4">Ce que vous apprendrez:</p>
                                        <ul>
                                            @foreach($formation->objectives as $objective)
                                                <li><i class="fas fa-check-circle"></i> {{ $objective }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="tools" role="tabpanel" aria-labelledby="tools-tab">
                                    <p class="text-secondary">
                                        Voici les outils que vous utiliserez dans ce cours :
                                        @if($formation->tools && count($formation->tools) > 0)
                                            <ul>
                                                @foreach($formation->tools as $tool)
                                                    <li><i class="fas fa-toolbox"></i> {{ $tool }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-secondary">Aucun outil spécifique n'a été listé pour cette formation.</p>
                                        @endif
                                    </p>
                                </div>
                                
                                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                                    <div class="modules-card">
                                        <div class="module-list">
                                            @if($formation->modules->count() > 0)
                                                @foreach($formation->modules as $index => $module)
                                                    <div class="module-item">
                                                        <span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} {{ $module->title ?? 'Module sans titre' }}</span>
                                                        <span>
                                                        @if($module->duration)
                                                            @if($module->duration >= 60)
                                                            {{ floor($module->duration / 60) }} heure{{ floor($module->duration / 60) > 1 ? 's' : '' }}
                                                            @if($module->duration % 60 > 0)
                                                                {{ $module->duration % 60 }} minute{{ $module->duration % 60 > 1 ? 's' : '' }}
                                                            @endif
                                                            @else
                                                            {{ $module->duration }} minute{{ $module->duration > 1 ? 's' : '' }}
                                                            @endif
                                                        @else
                                                            Durée non renseignée
                                                        @endif
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="module-item">
                                                    <span class="text-secondary">Vous n'avez pas accès aux modules.</span>
                                                    <span></span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 animation-fade-in" style="animation-delay: 0.3s;">
                        <div class="overview-card">
                            <h5 class="text-white mb-3">Aperçu général</h5>
                            <div class="row text-center mb-3">
                                <div class="col-6 overview-item">
                                    <i class="fas fa-user-friends"></i>
                                    <p><span class="value">{{ $formation->students_enrolled }}</span> Inscrits</p>
                                </div>
                                <div class="col-6 overview-item">
                                    <i class="fas fa-book-open"></i>
                                    <p><span class="value">{{ $formation->modules->count() }}</span> Modules</p>
                                </div>
                                <div class="col-6 overview-item">
                                    <i class="fas fa-video"></i>
                                    <p><span class="value">{{ $formation->total_videos }}</span> Vidéos</p>
                                </div>
                                <div class="col-6 overview-item">
                                    <i class="bi bi-tools"></i>
                                    <p><span class="value">{{ is_array($formation->tools) ? count($formation->tools) : $formation->tools->count() }}</span> Outils</p>
                                </div>
                            </div>
                            <div class="price-section justify-content-center">
                                <div>
                                    <p class="text-secondary mb-0">Prix de vente</p>
                                    @if ($formation->price == 0)
                                        <span class="price free">GRATUIT</span>
                                    @else
                                        <span class="price">{{ number_format($formation->price, 0, ',', '.') }} FCFA</span>
                                    @endif
                                </div>
                            </div>
                            @if ($formation->price == 0)
                                <a href="#" class="btn btn-add-to-cart">
                                    <i class="fas fa-play-circle me-2"></i> Accéder au cours
                                </a>
                            @else
                                <a href="{{ route('caisse') }}" class="btn btn-add-to-cart">
                                    <i class="fas fa-shopping-bag me-2"></i> Passer à la caisse
                                </a>
                            @endif
                        </div>

                        <div class="mentor-card">
                            <h5 class="text-white mb-3">À propos de Mentor</h5>
                            <div class="d-flex align-items-center mb-3">
                                {{-- Placeholder pour l'avatar du mentor --}}
                                @if($formation->mentor_avatar)
                                    <img src="{{ asset('storage/' . $formation->mentor_avatar) }}" alt="Mentor Avatar" class="mentor-avatar me-3">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Mentor Avatar" class="mentor-avatar me-3">
                                @endif
                                <div>
                                    <h6 class="mentor-name mb-0">{{ $formation->mentor ?? 'Nom du mentor' }}</h6>
                                    <p class="mentor-title">{{ $formation->mentor_title ?? 'Titre du mentor' }}</p>
                                </div>
                            </div>
                            <p>{{ $formation->mentor_bio ?? 'Description du mentor non disponible.' }}</p>
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-warning text-center" role="alert">
                        <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                        <p>Oups ! Cette formation n'a pas été trouvée. Veuillez vérifier le lien ou retourner à la page de découverte.</p>
                        <a href="{{ route('decouvrir') }}" class="btn btn-warning mt-2">Retourner à la page Découvrir</a>
                    </div>
                @endif
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