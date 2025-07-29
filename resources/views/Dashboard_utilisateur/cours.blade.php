<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Mes Cours</title>
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
            --progress-bar-color: #4CAF50; /* Vert pour la barre de progression */
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

        /* Sidebar (Repris du dashboard, ajusté pour la cohérence) */
#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -12rem; /* Cachée par défaut sur mobile */
    transition: margin .25s ease-out;
    width: 17rem;
    background-color: var(--dark-sidebar-bg) !important;
    border-right: 1px solid var(--border-color);
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
    margin: 0 10px; /* Ajoute un espace sur les côtés pour l'élément actif */
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
    width: 95%;
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
            flex-grow: 1; 
            background-color: var(--dark-bg);
            min-width: 0; 
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

        /* Section Headers */
        .section-header {
            display: flex;
            align-items: center;
            color: var(--text-color-light);
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .section-header i {
            color: var(--primary-color);
            margin-right: 0.75rem;
        }

        /* Continue Watching Section */
        .continue-watching-card {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 2rem;
            overflow-x: auto; /* Allow horizontal scrolling on smaller screens */
            -webkit-overflow-scrolling: touch; /* Smooth scrolling for iOS */
        }

        .continue-watching-card::-webkit-scrollbar {
            height: 5px;
        }
        .continue-watching-card::-webkit-scrollbar-track {
            background: var(--dark-bg);
            border-radius: 10px;
        }
        .continue-watching-card::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 10px;
        }

        .course-horizontal-list {
            display: flex;
            gap: 1.5rem; /* Space between cards */
            padding-bottom: 0.5rem; /* Space for scrollbar */
        }

        .course-progress-card {
            flex: 0 0 auto; /* Do not grow, do not shrink */
            width: 280px; /* Fixed width for each card */
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-progress-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
        }

        .course-progress-card .card-img-top {
            height: 140px;
            object-fit: cover;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        .course-progress-card .progress-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            color: var(--text-color-light);
            padding: 0.3rem 0.75rem;
            font-size: 0.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .course-progress-card .progress-bar-custom {
            height: 4px;
            background-color: var(--border-color);
            border-radius: 2px;
            margin-top: 0.5rem;
        }

        .course-progress-card .progress-bar-custom div {
            height: 100%;
            background-color: var(--primary-color); /* Use primary color for progress */
            border-radius: 2px;
        }

        .course-progress-card .card-body {
            padding: 1rem;
        }

        .course-progress-card .card-title {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-color-light);
            margin-bottom: 0.5rem;
            min-height: 2.5em; /* Ensure height for two lines */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .course-progress-card .card-subtitle {
            font-size: 0.85rem;
            color: var(--text-color-secondary);
            margin-bottom: 0.5rem;
        }

        /* Enrolled Courses Section */
        .enrolled-courses-section {
            margin-bottom: 2rem;
        }

        .course-list-item {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-list-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .course-list-item .course-info {
            flex-grow: 1;
        }

        .course-list-item .course-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-color-light);
            margin-bottom: 0.2rem;
        }

        .course-list-item .mentor-info {
            font-size: 0.85rem;
            color: var(--text-color-secondary);
        }

        .course-list-item .mentor-avatar-small {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 5px;
            vertical-align: middle;
        }

        .course-list-item .course-details {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-left: 1.5rem; /* Space between info and details */
        }

        .course-list-item .detail-item {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            font-size: 0.9rem;
            color: var(--text-color-secondary);
        }

        .course-list-item .detail-item .value {
            font-weight: 600;
            color: var(--text-color-light);
            font-size: 1rem;
        }

        .course-list-item .progress-bar-container {
            width: 100px; /* Fixed width for progress bar */
        }

        .course-list-item .progress-bar-list {
            height: 6px;
            background-color: var(--border-color);
            border-radius: 3px;
        }

        .course-list-item .progress-bar-list div {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 3px;
        }

        .course-list-item .meta-icons {
            display: flex;
            gap: 1rem;
            margin-left: 1.5rem;
            flex-shrink: 0; /* Prevent shrinking */
        }

        .course-list-item .meta-icon-item {
            display: flex;
            align-items: center;
            color: var(--text-color-secondary);
            font-size: 0.9rem;
        }

        .course-list-item .meta-icon-item i {
            margin-right: 0.4rem;
            font-size: 1rem;
        }
        .course-list-item .meta-icon-item .value {
             font-weight: 500;
             color: var(--text-color-light);
        }

        /* Search and Filter */
        .search-filter-row {
            margin-bottom: 1.5rem;
        }

        .search-filter-row .form-control {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-color-light);
            padding: 0.75rem 1rem;
        }

        .search-filter-row .form-control::placeholder {
            color: var(--text-color-secondary);
        }

        .search-filter-row .input-group-text {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            border-right: none;
            color: var(--text-color-secondary);
        }

        .search-filter-row .dropdown-toggle {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-color-light);
            padding: 0.75rem 1rem;
        }

        .search-filter-row .dropdown-menu {
            background-color: var(--dark-card-bg);
            border: 1px solid var(--border-color);
        }
        .search-filter-row .dropdown-item {
            color: var(--text-color-light);
        }
        .search-filter-row .dropdown-item:hover {
            background-color: var(--primary-color);
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
            .section-header {
                font-size: 1.1rem;
            }
            .course-progress-card {
                width: 250px; /* Slightly smaller cards on tablet */
            }
            .course-list-item {
                flex-wrap: wrap; /* Allow items to wrap on smaller screens */
                padding: 0.75rem 1rem;
            }
            .course-list-item .course-details {
                margin-top: 1rem;
                margin-left: 0;
                width: 100%;
                justify-content: space-between; /* Distribute items */
            }
            .course-list-item .meta-icons {
                margin-left: 0;
                margin-top: 0.5rem;
                width: 100%;
                justify-content: space-around; /* Distribute icons */
            }
            
        }

        @media (max-width: 767.98px) {
            .navbar-collapse {
                display: none !important; /* Hide navbar icons on very small screens */
            }
            .course-horizontal-list {
                gap: 1rem;
            }
            .course-list-item .meta-icons {
                margin-left: 0;
                margin-top: 0.5rem;
                width: 30%;
                display: inline;
                justify-content: space-around; /* Distribute icons */
            }
            .course-progress-card {
                width: 100%; /* Even smaller cards on mobile */
            }
            .course-list-item .course-title {
                font-size: 1rem;
            }
            .search-filter-row .col-md-auto {
                flex-basis: 100%; /* Full width for search and filter */
                margin-bottom: 1rem;
            }
            .search-filter-row .col-md-auto:last-child {
                margin-bottom: 0;
            }
        }

        @media (max-width: 575.98px) {
            .sidebar-promo {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
            .course-horizontal-list {
                justify-content: flex-start;
            }
            .course-progress-card {
                width: 200px; /* Smallest card width */
            }
            .course-progress-card .card-img-top {
                height: 120px;
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
                <a href="{{ route('calendrier') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-calendar-alt me-2"></i> Calendrier
                </a>
                <a href="{{ route('messages') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-comment-alt me-2"></i> Message
                </a>
                <a href="{{ route('paiement1') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-credit-card me-2"></i> Paiement
                </a>

                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">COURS</div>
                <a href="{{ route('cours') }}" class="list-group-item list-group-item-action bg-dark text-white active ">
                    <i class="fas fa-book me-2"></i> Mes cours
                </a>
                <a href="{{ route('decouvrir') }}" class="list-group-item list-group-item-action bg-dark text-white">
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
                    <h2 class="text-white mb-0 ms-3">Mes Cours</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="#"><i class="fas fa-search"></i></a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="#"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center" href="{{ route('parametres') }}">
                                    <i class="fa fa-user"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid py-4 main-content">
                <div class="mb-4 animation-slide-in-up">
                    <div class="section-header">
                        <i class="fas fa-play-circle"></i> Continuer à regarder
                    </div>
                    <div class="continue-watching-card">
                        <div class="course-horizontal-list">
                            <div class="course-progress-card">
                                <img src="logo.png" class="card-img-top" alt="Course Image">
                                <div class="progress-overlay">
                                    <span>07/23</span>
                                    <span>11:00</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Envato Mastery: construire un revenu passif...</h5>
                                    <p class="card-subtitle">Chapitre 3 Chapitre 3 • Deuxième partie</p>
                                    <div class="progress-bar-custom">
                                        <div style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-progress-card">
                                <img src="logo.png" class="card-img-top" alt="Course Image">
                                <div class="progress-overlay">
                                    <span>02/21</span>
                                    <span>08:00</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Maîtriser Git & Vercel App...</h5>
                                    <p class="card-subtitle">Chapitre 2 Chapitre 2 • Partie 1</p>
                                    <div class="progress-bar-custom">
                                        <div style="width: 15%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-progress-card">
                                <img src="logo.png" class="card-img-top" alt="Course Image">
                                <div class="progress-overlay">
                                    <span>09/13</span>
                                    <span>06:00</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Développement Web créatif</h5>
                                    <p class="card-subtitle">Chapitre 15 - les droits de l'homme • Quatrième partie</p>
                                    <div class="progress-bar-custom">
                                        <div style="width: 90%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-progress-card">
                                <img src="logo.png" class="card-img-top" alt="Course Image">
                                <div class="progress-overlay">
                                    <span>12/12</span>
                                    <span>00:00</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Fondamentaux du Design UI/UX</h5>
                                    <p class="card-subtitle">Module 12 • Projet Final</p>
                                    <div class="progress-bar-custom">
                                        <div style="width: 100%; background-color: var(--progress-bar-color);"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="enrolled-courses-section animation-fade-in" style="animation-delay: 0.2s;">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 search-filter-row">
                        <div class="section-header mb-0">
                            <i class="fas fa-book-reader"></i> Cours inscrits
                        </div>
                        <div class="d-flex flex-wrap flex-grow-1 justify-content-end align-items-center gap-3">
                            <div class="input-group flex-grow-1 flex-md-grow-0" style="max-width: 300px;">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" placeholder="Trouvez votre cours...">
                            </div>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownCourseFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tous les cours <i class="fas fa-chevron-down ms-2"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownCourseFilter">
                                    <li><a class="dropdown-item" href="#">Tous les cours</a></li>
                                    <li><a class="dropdown-item" href="#">En cours</a></li>
                                    <li><a class="dropdown-item" href="#">Terminés</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="course-list-item animation-fade-in" style="animation-delay: 0.3s;">
                        <div class="course-info">
                            <h5 class="course-title">Maîtrise Envato</h5>
                            <p class="mentor-info">Mentor <img src="logo.png" alt="Mentor Nina" class="mentor-avatar-small"> Mme Nina</p>
                        </div>
                        <div class="course-details">
                            <div class="detail-item">
                                <span>Durée de vie</span>
                                <span class="value">4h 23m</span>
                            </div>
                            <div class="progress-bar-container">
                                <p class="text-end mb-1 text-white">79%</p>
                                <div class="progress-bar-list">
                                    <div style="width: 79%;"></div>
                                </div>
                            </div>
                            <div class="meta-icons">
                                <div class="meta-icon-item">
                                    <i class="fas fa-user-friends"></i> <span class="value">52</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-book-open"></i> <span class="value">16</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-video"></i> <span class="value">41</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="course-list-item animation-fade-in" style="animation-delay: 0.4s;">
                        <div class="course-info">
                            <h5 class="course-title">Maîtriser Git et Vercel App</h5>
                            <p class="mentor-info">Mentor <img src="logo.png" alt="Mentor Patrick" class="mentor-avatar-small"> M. Patrick</p>
                        </div>
                        <div class="course-details">
                            <div class="detail-item">
                                <span>Durée de vie</span>
                                <span class="value">6h 11m</span>
                            </div>
                            <div class="progress-bar-container">
                                <p class="text-end mb-1 text-white">43%</p>
                                <div class="progress-bar-list">
                                    <div style="width: 43%;"></div>
                                </div>
                            </div>
                            <div class="meta-icons">
                                <div class="meta-icon-item">
                                    <i class="fas fa-user-friends"></i> <span class="value">101</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-book-open"></i> <span class="value">20</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-video"></i> <span class="value">53</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="course-list-item animation-fade-in" style="animation-delay: 0.5s;">
                        <div class="course-info">
                            <h5 class="course-title">Système de conception de base</h5>
                            <p class="mentor-info">Mentor <img src="logo.png" alt="Mentor Bryan" class="mentor-avatar-small"> M. Bryan</p>
                        </div>
                        <div class="course-details">
                            <div class="detail-item">
                                <span>Durée de vie</span>
                                <span class="value">5h 40m</span>
                            </div>
                            <div class="progress-bar-container">
                                <p class="text-end mb-1 text-white">90%</p>
                                <div class="progress-bar-list">
                                    <div style="width: 90%;"></div>
                                </div>
                            </div>
                            <div class="meta-icons">
                                <div class="meta-icon-item">
                                    <i class="fas fa-user-friends"></i> <span class="value">75</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-book-open"></i> <span class="value">19</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-video"></i> <span class="value">45</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="course-list-item animation-fade-in" style="animation-delay: 0.6s;">
                        <div class="course-info">
                            <h5 class="course-title">Master Class: React JS et Tailwind CSS</h5>
                            <p class="mentor-info">Mentor <img src="logo.png" alt="Mentor Coles" class="mentor-avatar-small"> M. Coles</p>
                        </div>
                        <div class="course-details">
                            <div class="detail-item">
                                <span>Durée de vie</span>
                                <span class="value">9h 01m</span>
                            </div>
                            <div class="progress-bar-container">
                                <p class="text-end mb-1 text-white">100%</p>
                                <div class="progress-bar-list">
                                    <div style="width: 100%; background-color: var(--progress-bar-color);"></div>
                                </div>
                            </div>
                            <div class="meta-icons">
                                <div class="meta-icon-item">
                                    <i class="fas fa-user-friends"></i> <span class="value">125</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-book-open"></i> <span class="value">23</span>
                                </div>
                                <div class="meta-icon-item">
                                    <i class="fas fa-video"></i> <span class="value">64</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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