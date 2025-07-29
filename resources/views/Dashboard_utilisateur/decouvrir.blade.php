<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Découvrir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variables CSS pour faciliter la gestion des couleurs et espacements */
        :root {
            --primary-color: red;
            /* Rouge plus vif pour correspondre à la maquette */
            --secondary-color: #6c757d;
            /* Gris de Bootstrap pour les textes secondaires */
            --dark-bg: #1A1A1A;
            /* Fond principal plus sombre */
            --dark-sidebar-bg: #212121;
            /* Fond de la sidebar */
            --dark-navbar-bg: #212121;
            /* Fond de la navbar */
            --dark-card-bg: #2C2C2C;
            /* Fond des cartes et sections */
            --border-color: #3A3A3A;
            /* Bordures subtiles */
            --text-color-light: #F8F9FA;
            /* Texte principal clair */
            --text-color-secondary: #B0B0B0;
            /* Texte secondaire, plus clair que --secondary-color */
            --hero-section-bg-start: #3B2E74;
            /* Début du dégradé du hero */
            --hero-section-bg-end: #5A4893;
            /* Fin du dégradé du hero */
            --hero-text-color: #FFFFFF;
            /* Couleur du texte dans le hero */
            --hero-circle-color-1: rgba(100, 80, 150, 0.4);
            /* Cercles de fond du hero */
            --hero-circle-color-2: rgba(130, 110, 180, 0.4);
            --button-active-bg: var(--primary-color);
            /* Couleur de fond des boutons actifs */
            --button-inactive-bg: var(--dark-card-bg);
            /* Couleur de fond des boutons inactifs */
            --button-text-inactive: var(--text-color-secondary);
        }

        body {
            overflow-x: hidden;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            font-family: Arial, sans-serif;
            font-weight: 400;
            /* Poids de police par défaut */
        }

        /* Base layout with flexbox */
        #wrapper {
            display: flex;
        }

        /* Sidebar (Repris du dashboard, ajusté pour la cohérence) */
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -11rem;
            /* Cachée par défaut sur mobile */
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
            width: 92%;
            /* Ajusté pour qu'il n'y ait pas de marge latérale par défaut */
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
            margin: 0px;
            /* Ajoute un espace sur les côtés pour l'élément actif */
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
            width: 90%;
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

        /* Page Content (Repris du dashboard) */
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


        /* Hero Section Styles */
        .hero-section {
            background-color: #2a2cde;
            /* Dark blue from the mockup */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            /* Rounded corners at the bottom */
        }

        .hero-content {
            z-index: 10;
            /* Ensure content is above illustrations */
            text-align: center;
            color: #fff;
            max-width: 900px;
            /* Limit width for better readability */
        }

        .hero-section h1 {
            font-weight: bold;
            font-size: 2rem;
            line-height: 1.2;
        }

        .hero-section p.lead {
            font-size: 1rem;
            opacity: 0.9;
        }

        /* Stats Section within Hero */
        .stats-section {
            display: flex;
            justify-content: center;
            gap: 30px;
            /* Space between stat items */
            margin-top: 40px;
            color: #fff;
        }

        .stat-item {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            /* Slightly transparent background for contrast */
            padding: 15px 20px;
            border-radius: 10px;
            transition: transform 0.3s ease;
            /* Smooth hover effect */
        }

        .stat-item:hover {
            transform: translateY(-5px);
            /* Lift effect on hover */
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .dropdown button.btn-dark-secondary {
            background-color: var(--dark-card-bg) !important;
            border: 1px solid var(--border-color) !important;
            color: var(--text-color-secondary) !important;
            border-radius: 0.5rem;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
        }

        /* Categories Section */
        .categories-section {
            background-color: #1a1a1a;
            /* Dark background */
            padding: 20px 0;
            border-radius: 0 0 20px 20px;
            /* Match hero section if desired */
        }

        .category-btn {
            background-color: #333;
            /* Default button background */
            color: #fff;
            border: none;
            padding: 10px 19px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            white-space: nowrap;
            /* Prevent wrapping for long text */
        }

        .category-btn:hover {
            background-color: #555;
            /* Darker on hover */
            transform: translateY(-2px);
        }

        .category-btn.active {
            background-color: #6a00ff;
            /* Purple for active button */
            color: #fff;
            box-shadow: 0 0 15px rgba(106, 0, 255, 0.5);
            /* Subtle glow */
        }

        .category-btn.dropdown-toggle {
            background-color: #333;
        }


        /* Course Card Styling */
        .course-card {
            background-color: var(--dark-card-bg) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 0.75rem !important;
            /* Rayon plus grand pour les cartes */
            overflow: hidden;
            /* Pour s'assurer que l'image est contenue */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-8px);
            /* Léger soulèvement au survol */
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
            /* Ombre plus prononcée */
        }

        .course-card .card-img-top {
            height: 180px;
            /* Hauteur fixe pour les images des cours */
            object-fit: cover;
            /* S'assurer que l'image couvre l'espace sans distorsion */
            border-bottom: 1px solid var(--border-color);
            /* Séparateur visuel */
        }

        .course-card .card-body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .course-card .card-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--text-color-light);
            margin-bottom: 0.5rem;
            min-height: 2.8em;
            /* Assure une hauteur minimale pour 2 lignes de texte */
            overflow: hidden;
            /* Cache le texte qui dépasse */
            text-overflow: ellipsis;
            /* Ajoute des points de suspension si le texte est tronqué */
        }

        .course-card .card-text {
            /* Pour le nom du mentor */
            color: var(--text-color-secondary);
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }

        .course-card .star-rating i {
            color: gold;
            font-size: 0.9rem;
            margin-right: 2px;
        }

        .course-card .text-primary {
            color: var(--primary-color) !important;
            font-size: 1.6rem;
            /* Taille du prix */
            font-weight: 700;
        }

        /* Animations */
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

        .animation-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
            /* Commence caché */
        }

        .animation-slide-in-up {
            animation: slideInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
            opacity: 0;
            /* Commence caché */
        }


        /* Responsive Adjustments */
        @media (min-width: 992px) {
            #sidebar-wrapper {
                margin-left: 0;
                /* Sidebar visible sur les grands écrans */
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
                /* Cachée si toggled */
            }

            #sidebarToggle {
                display: none !important;
                /* Bouton hamburger caché sur desktop */
            }

            .hero-illustration-container {
                position: absolute;
                /* Illustrations positionnées absolument dans le hero */
                top: 0;
                right: 0;
                width: 45%;
                height: 100%;
            }

            .hero-laptop-main {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 280px;
                /* Taille fixe pour le laptop principal */
            }

            .hero-illus-1 {
                left: 10%;
                top: 15%;
            }

            .hero-illus-2 {
                right: 10%;
                bottom: 15%;
            }

            .category-tabs {
                flex-wrap: nowrap;
                /* Empêche les onglets de revenir à la ligne sur de grandes largeurs */
                overflow-x: auto;
                /* Permet le défilement horizontal si trop d'onglets */
                -webkit-overflow-scrolling: touch;
                /* Pour un défilement fluide sur iOS */
            }

            .category-tabs::-webkit-scrollbar {
                height: 5px;
            }

            .category-tabs::-webkit-scrollbar-track {
                background: var(--dark-card-bg);
            }

            .category-tabs::-webkit-scrollbar-thumb {
                background: var(--border-color);
                border-radius: 10px;
            }
        }

        @media (max-width: 991.98px) {
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
                /* Sidebar visible si toggled */
            }

            #page-content-wrapper {
                width: 100%;
            }

            .navbar h2 {
                font-size: 1.5rem;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p.lead {
                font-size: 1.1rem;
            }

            .stat-number {
                font-size: 1.8rem;
            }

            .stat-label {
                font-size: 0.8rem;
            }

            .stats-section {
                flex-wrap: wrap;
                /* Allow stats to wrap on smaller screens */
                gap: 20px;
            }

            .stat-item {
                flex-basis: 45%;
                /* Two items per row */
                padding: 10px 15px;
            }

            .dropdown {
                width: 100%;
                text-align: center;
            }

            .dropdown button {
                width: calc(100% - 2rem);
                /* Pleine largeur avec padding */
                margin: 0 1rem;
            }
        }

        @media (max-width: 767.98px) {
            .navbar-collapse {
                display: none !important;
                /* Cache les icônes de la navbar sur très petits écrans */
            }

            .hero-section {
                min-height: 400px;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-section p.lead {
                font-size: 1rem;
            }

            .stats-section {
                flex-direction: column;
                /* Stack stats vertically on very small screens */
                align-items: center;
                gap: 15px;
            }

            .stat-item {
                width: 80%;
                /* Make them take more width */
                max-width: 250px;
            }

            .category-btn {
                padding: 8px 15px;
                font-size: 0.85rem;
            }

            .categories-section .d-flex {
                justify-content: center;
                /* Center buttons on smaller screens */
            }
        }

        @media (max-width: 575.98px) {
            .sidebar-promo {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-dark sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading text-white p-3 border-bottom border-secondary d-flex align-items-center">
                <img src="logo.png" alt="Impact Web Logo" style="max-height: 140px;">
            </div>
            <div class="list-group list-group-flush">
                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">GENERAL</div>
                <a href="tableau de bord.html" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-home me-2"></i> Tableau de bord
                </a>
                <a href="calendrier.html" class="list-group-item list-group-item-action bg-dark text-white ">
                    <i class="fas fa-calendar-alt me-2"></i> Calendrier
                </a>
                <a href="message.html" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-comment-alt me-2"></i> Message
                </a>
                <a href="paiement.html" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-credit-card me-2"></i> Paiement
                </a>

                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">COURS</div>
                <a href="cours.html" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-book me-2"></i> Mes cours
                </a>
                <a href="decouvrir.html" class="list-group-item list-group-item-action bg-dark text-white active">
                    <i class="fas fa-search me-2"></i> Découvrir
                </a>

                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">OTHER</div>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-question-circle me-2"></i> Soutien
                </a>
                <a href="parametre.html" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-cog me-2"></i> Paramètre
                </a>

                <div class="sidebar-promo p-3 mx-3 mt-4 rounded text-center ">
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
                    <h2 class="text-white mb-0 ms-3">Découvrir</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="#"><i class="fas fa-search"></i></a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="#"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="logo.png" alt="Impact Web Logo" style="max-height: 50px;" class="rounded-circle me-2">
                                    <span class="d-none d-md-block">Peter</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end bg-dark-secondary border-secondary" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white" href="#">Profile</a>
                                    <a class="dropdown-item text-white" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-white" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid py-4 main-content">

                <header class="container-fluid hero-section d-flex align-items-center justify-content-center">
                    <div class="container hero-content text-center py-5">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-lg-8">
                                <h1 class="display-4 mb-3 text-white animate-fade-in">Explorez un monde de formations</h1>
                                <p class="lead mb-4 text-white animate-fade-in delay-1">Juste pour vous. Commencez votre voyage maintenant - trouvez, apprenez, grandissez!</p>
                            </div>
                        </div>
                        <div class="row stats-section justify-content-center mt-5">
                            <div class="col-4 col-md-3 stat-item animate-fade-in delay-2">
                                <div class="stat-number">1.500 +</div>
                                <div class="stat-label">Formations disponibles</div>
                            </div>
                            <div class="col-4 col-md-3 stat-item animate-fade-in delay-3">
                                <div class="stat-number">200 +</div>
                                <div class="stat-label">De grands Mentors</div>
                            </div>
                            <div class="col-4 col-md-3 stat-item animate-fade-in delay-4">
                                <div class="stat-number">10 000 +</div>
                                <div class="stat-label">Etudiants</div>
                            </div>
                        </div>
                    </div>
                    <div class="illustration-overlay"></div>
                </header>

                <div class="mb-4 animation-fade-in" style="animation-delay: 0.2s;">
                    <section class="container-fluid categories-section py-4">
                        <div class="container">
                            <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                                <button class="btn category-btn {{ !Request::has('category') || Request::input('category') == 'tous' ? 'active' : '' }}" onclick="location.href='{{ route('decouvrir', ['category' => 'tous']) }}'">Tous</button>

                                @foreach($categories as $categorie)
                                <button class="btn category-btn {{ Request::input('category') == $categorie->slug ? 'active' : '' }}" onclick="location.href='{{ route('decouvrir', ['category' => $categorie->slug]) }}'">{{ $categorie->name }}</button>
                                @endforeach

                                <button class="btn category-btn dropdown-toggle d-lg-none" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Catégories
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item {{ !Request::has('category') || Request::input('category') == 'tous' ? 'active' : '' }}" href="{{ route('decouvrir', ['category' => 'tous']) }}">Tous</a></li>
                                    @foreach($categories as $categorie)
                                    <li><a class="dropdown-item {{ Request::input('category') == $categorie->slug ? 'active' : '' }}" href="{{ route('decouvrir', ['category' => $categorie->slug]) }}">{{ $categorie->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-tendances" role="tabpanel" aria-labelledby="pills-tendances-tab">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                                @forelse($formations as $formation)
                                <div class="col animation-fade-in" style="animation-delay: {{ 0.4 + $loop->index * 0.1 }}s;">
                                    <div class="card course-card bg-dark-card border-secondary h-100">
                                        @if ($formation->image)
                                        <img src="{{ asset('storage/' . $formation->image) }}" class="card-img-top rounded-top-2" alt="{{ $formation->title }}">
                                        @else
                                        <img src="{{ asset('images/default-course.png') }}" class="card-img-top rounded-top-2" alt="Image par défaut">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title text-white">{{ $formation->title }}</h5>
                                            <p class="card-text text-secondary mb-2">{{ $formation->mentor }} - {{ $formation->categorie->name ?? 'Non classée' }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="star-rating">
                                                    @for ($i = 0; $i < floor($formation->rating); $i++)
                                                        <i class="fas fa-star text-warning"></i>
                                                        @endfor
                                                        @if ($formation->rating - floor($formation->rating) > 0)
                                                        <i class="fas fa-star-half-alt text-warning"></i>
                                                        @endif
                                                        @for ($i = 0; $i < (5 - ceil($formation->rating)); $i++)
                                                            <i class="fas fa-star text-secondary"></i>
                                                            @endfor
                                                </div>
                                            </div>
                                            <span class="text-primary fw-bold fs-6">{{ number_format($formation->price, 0, ',', '.') }}FCFA</span>  
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center text-secondary py-5 ">
                                    <i class="fas fa-box-open fa-3x mb-3"></i>
                                    <p>Aucune formation trouvée pour cette catégorie, ou aucune formation n'a été ajoutée pour le moment.</p>
                                </div>
                                @endforelse
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

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>