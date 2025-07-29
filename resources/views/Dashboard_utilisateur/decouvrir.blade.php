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
    --primary-color: red; /* Rouge plus vif pour correspondre à la maquette */
    --secondary-color: #6c757d; /* Gris de Bootstrap pour les textes secondaires */
    --dark-bg: #1A1A1A; /* Fond principal plus sombre */
    --dark-sidebar-bg: #212121; /* Fond de la sidebar */
    --dark-navbar-bg: #212121; /* Fond de la navbar */
    --dark-card-bg: #2C2C2C; /* Fond des cartes et sections */
    --border-color: #3A3A3A; /* Bordures subtiles */
    --text-color-light: #F8F9FA; /* Texte principal clair */
    --text-color-secondary: #B0B0B0; /* Texte secondaire, plus clair que --secondary-color */
    --hero-section-bg-start: #3B2E74; /* Début du dégradé du hero */
    --hero-section-bg-end: #5A4893; /* Fin du dégradé du hero */
    --hero-text-color: #FFFFFF; /* Couleur du texte dans le hero */
    --hero-circle-color-1: rgba(100, 80, 150, 0.4); /* Cercles de fond du hero */
    --hero-circle-color-2: rgba(130, 110, 180, 0.4);
    --button-active-bg: var(--primary-color); /* Couleur de fond des boutons actifs */
    --button-inactive-bg: var(--dark-card-bg); /* Couleur de fond des boutons inactifs */
    --button-text-inactive: var(--text-color-secondary);
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

/* Sidebar (Repris du dashboard, ajusté pour la cohérence) */
#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -11rem; /* Cachée par défaut sur mobile */
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

/* Page Content (Repris du dashboard) */
#page-content-wrapper {
    min-width: 100vw;
    background-color: var(--dark-bg);
}

.navbar-dark {
    background-color: var(--dark-bg) !important;
}

.bg-dark-secondary {
    background-color: var(--dark-sidebar-bg) !important; /* Utilise la même couleur que la sidebar pour le topbar */
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


/* Hero Section Styling */
.hero-section {
    background: linear-gradient(135deg, var(--hero-section-bg-start) 0%, var(--hero-section-bg-end) 100%);
    border-radius: 1rem !important; /* Plus grand rayon */
    padding: 2.5rem 3rem !important; /* Plus de padding */
    position: relative;
    overflow: hidden;
    color: var(--hero-text-color);
    display: flex;
    align-items: center;
    min-height: 280px; /* Hauteur minimale pour la section */
}

.hero-section::before,
.hero-section::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    background-color: var(--hero-circle-color-1);
    opacity: 0.6;
    filter: blur(40px); /* Effet de flou sur les cercles */
    animation: pulse-glow 5s infinite alternate ease-in-out;
    z-index: 0;
}

.hero-section::before {
    width: 250px;
    height: 250px;
    top: -80px;
    left: -80px;
    background-color: var(--hero-circle-color-2);
}

.hero-section::after {
    width: 300px;
    height: 300px;
    bottom: -100px;
    right: -100px;
    animation-delay: 1.5s;
}

@keyframes pulse-glow {
    0% { transform: scale(1); opacity: 0.6; }
    50% { transform: scale(1.1); opacity: 0.7; }
    100% { transform: scale(1); opacity: 0.6; }
}

.hero-illustration-container {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}

.hero-illus {
    position: absolute;
    filter: drop-shadow(0 8px 15px rgba(0,0,0,0.4));
    transition: transform 0.5s ease-in-out;
}

.hero-illus-1 {
    width: 150px;
    top: 10%;
    left: 5%;
    animation: float-small 4s ease-in-out infinite;
    transform: rotate(-5deg);
}

.hero-illus-2 {
    width: 150px;
    bottom: 10%;
    right: 5%;
    animation: float-small 4.5s ease-in-out infinite reverse;
    transform: rotate(5deg);
}

.hero-laptop-main {
    position: relative; /* Maintain relative positioning for main laptop */
    width: 300px; /* Taille plus grande pour le laptop */
    height: auto;
    animation: float-laptop 5s ease-in-out infinite;
    z-index: 1; /* Assurer qu'il est au-dessus des autres illustrations et des cercles de fond */
}


@keyframes float-small {
    0%, 100% { transform: translateY(0) rotate(-5deg); }
    50% { transform: translateY(-10px) rotate(-8deg); }
}

@keyframes float-laptop {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-15px) scale(1.02); }
}

/* Category Tabs Styling */
.category-tabs .nav-link {
    background-color: var(--button-inactive-bg);
    color: var(--button-text-inactive);
    border: 1px solid var(--border-color);
    border-radius: 0.5rem;
    padding: 0.6rem 1.2rem;
    margin-right: 0.75rem; /* Espacement entre les onglets */
    font-weight: 500;
    transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
}

.category-tabs .nav-link.active {
    background-color: var(--button-active-bg);
    color: var(--text-color-light);
    border-color: var(--button-active-bg);
}

.category-tabs .nav-link:hover:not(.active) {
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--text-color-light);
    border-color: var(--text-color-secondary);
}

.dropdown button.btn-dark-secondary {
    background-color: var(--dark-card-bg) !important;
    border: 1px solid var(--border-color) !important;
    color: var(--text-color-secondary) !important;
    border-radius: 0.5rem;
    padding: 0.6rem 1.2rem;
    font-weight: 500;
}

/* Course Card Styling */
.course-card {
    background-color: var(--dark-card-bg) !important;
    border: 1px solid var(--border-color) !important;
    border-radius: 0.75rem !important; /* Rayon plus grand pour les cartes */
    overflow: hidden; /* Pour s'assurer que l'image est contenue */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.course-card:hover {
    transform: translateY(-8px); /* Léger soulèvement au survol */
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4); /* Ombre plus prononcée */
}

.course-card .card-img-top {
    height: 180px; /* Hauteur fixe pour les images des cours */
    object-fit: cover; /* S'assurer que l'image couvre l'espace sans distorsion */
    border-bottom: 1px solid var(--border-color); /* Séparateur visuel */
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
    min-height: 2.8em; /* Assure une hauteur minimale pour 2 lignes de texte */
    overflow: hidden; /* Cache le texte qui dépasse */
    text-overflow: ellipsis; /* Ajoute des points de suspension si le texte est tronqué */
}

.course-card .card-text { /* Pour le nom du mentor */
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
    font-size: 1.6rem; /* Taille du prix */
    font-weight: 700;
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
    opacity: 0; /* Commence caché */
}

.animation-slide-in-up {
    animation: slideInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    opacity: 0; /* Commence caché */
}


/* Responsive Adjustments */
@media (min-width: 992px) {
    #sidebar-wrapper {
        margin-left: 0; /* Sidebar visible sur les grands écrans */
    }
    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }
    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem; /* Cachée si toggled */
    }
    #sidebarToggle {
        display: none !important; /* Bouton hamburger caché sur desktop */
    }
    .hero-illustration-container {
        position: absolute; /* Illustrations positionnées absolument dans le hero */
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
        width: 280px; /* Taille fixe pour le laptop principal */
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
        flex-wrap: nowrap; /* Empêche les onglets de revenir à la ligne sur de grandes largeurs */
        overflow-x: auto; /* Permet le défilement horizontal si trop d'onglets */
        -webkit-overflow-scrolling: touch; /* Pour un défilement fluide sur iOS */
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
        margin-left: 0; /* Sidebar visible si toggled */
    }
    #page-content-wrapper {
        width: 100%;
    }
    .navbar h2 {
        font-size: 1.5rem;
    }
    .hero-section {
        padding: 1rem !important;
        flex-direction: column; /* Empile les éléments verticalement */
        text-align: center;
        min-height: auto;
    }
    .hero-illustration-container {
        position: relative; /* Revert to relative positioning */
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 1.5rem;
    }
    .hero-illus {
        position: relative; /* Allow flow, remove absolute positioning */
        display: inline-block !important; /* Make sure they show up */
        margin: 0 5px; /* Add spacing between them */
        max-width: 30%; /* Adjust size for smaller screens */
        height: auto;
        top: auto; left: auto; bottom: auto; right: auto; /* Remove specific positions */
        transform: none; /* Remove transforms */
        animation: none; /* Disable animations on small screens for simplicity */
        filter: none; /* Remove drop shadow for performance on mobile */
    }
    .hero-laptop-main {
        max-width: 60%; /* Main laptop larger */
        margin: auto;
        position: relative;
        transform: none;
        animation: none;
        filter: none;
    }
    .category-tabs {
        justify-content: center !important; /* Centre les onglets */
        margin-bottom: 1rem;
    }
    .dropdown {
        width: 100%;
        text-align: center;
    }
    .dropdown button {
        width: calc(100% - 2rem); /* Pleine largeur avec padding */
        margin: 0 1rem;
    }
}

@media (max-width: 767.98px) {
    .navbar-collapse {
        display: none !important; /* Cache les icônes de la navbar sur très petits écrans */
    }
    .hero-section h3 {
        font-size: 1rem;
        
    }
    .hero-section .row {
       width: 90%;
        
    }
    .hero{
        width: 100%;
        margin-left: 25%;
    }

    .hero-section h4 {
        font-size: 1rem;

    }
    .category-tabs {
        flex-wrap: wrap; /* Permet aux onglets de revenir à la ligne */
        justify-content: flex-start !important;
    }
    .category-tabs .nav-link {
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
    }
    .hero-illus {
        max-width: 25%; /* Rendre les illustrations plus grandes sur les téléphones */
    }
    .hero-laptop-main {
        max-width: 50%;
    }
}

@media (max-width: 575.98px) {
    .sidebar-promo {
        margin-left: 0.5rem;
        margin-right: 0.5rem;
    }
    
    .hero-section .row > div {
        text-align: center !important;
    }
    .hero-illus {
        display: block !important; /* Stack images vertically */
        margin: 10px auto;
        max-width: 80%;
    }
    .hero-laptop-main {
        max-width: 50%;
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
                <div class="hero-section rounded-4 p-4 mb-4 animation-slide-in-up">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12 text-center text-lg-start mb-4 mb-lg-0 position-relative z-1">
                            <h3 class="text-white fw-bold mb-3">Explorez un monde de cours</h3>
                            <p class="text-white-50 fs-5 mb-4">Juste pour vous. Commencez votre voyage maintenant - trouvez, apprenez, grandissez!</p>
                            <div class="row text-white text-center justify-content-center justify-content-lg-start">
                                <div class="hero col-6 col-md-4 mb-3">
                                    <h4 class="fw-bold mb-1">1.500 <span class="text-primary">+</span></h4>
                                    <small>Cours de formation</small>
                                </div>
                                <div class=" hero col-6 col-md-4 mb-3">
                                    <h4 class="fw-bold mb-1">200 <span class="text-primary">+</span></h4>
                                    <small>de grands Mentors</small>
                                </div>
                                <div class="hero col-6 col-md-4 mb-3">
                                    <h4 class="fw-bold mb-1">10 000 <span class="text-primary">+</span></h4>
                                    <small>étudiants</small>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-5 col-md-12 text-center hero-illustration-container position-relative">
                            <img src="logo.png" alt="Illustration 1" class="hero-illus hero-illus-1 d-none d-md-block">
                            <img src="logo.png" alt="Illustration 2" class="hero-illus hero-illus-2 d-none d-md-block">
                            <img src="logo.png" alt="Laptop Illustration" class="hero-illus hero-laptop-main"> 
                        </div>
                    </div>
                </div>

                <div class="mb-4 animation-fade-in" style="animation-delay: 0.2s;">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                        <div class="nav nav-pills category-tabs" id="pills-tab" role="tablist">
                            <button class="nav-link active" id="pills-tendances-tab" data-bs-toggle="pill" data-bs-target="#pills-tendances" type="button" role="tab" aria-controls="pills-tendances" aria-selected="true">Tendances</button>
                            <button class="nav-link" id="pills-informatique-tab" data-bs-toggle="pill" data-bs-target="#pills-informatique" type="button" role="tab" aria-controls="pills-informatique" aria-selected="false">Informatique</button>
                            <button class="nav-link" id="pills-design-tab" data-bs-toggle="pill" data-bs-target="#pills-design" type="type" role="tab" aria-controls="pills-design" aria-selected="false">Design</button>
                            <button class="nav-link" id="pills-commercialisation-tab" data-bs-toggle="pill" data-bs-target="#pills-commercialisation" type="button" role="tab" aria-controls="pills-commercialisation" aria-selected="false">La commercialisation</button>
                            <button class="nav-link" id="pills-science-tab" data-bs-toggle="pill" data-bs-target="#pills-science" type="button" role="tab" aria-controls="pills-science" aria-selected="false">La Science</button>
                            <button class="nav-link" id="pills-droit-tab" data-bs-toggle="pill" data-bs-target="#pills-droit" type="button" role="tab" aria-controls="pills-droit" aria-selected="false">Le droit</button>
                            <button class="nav-link" id="pills-langue-travail-tab" data-bs-toggle="pill" data-bs-target="#pills-langue-travail" type="button" role="tab" aria-controls="pills-langue-travail" aria-selected="false">Langue de travail</button>
                        </div>
                        <div class="dropdown me-auto me-md-0">
                            <button class="btn btn-dark-secondary dropdown-toggle text-white-50 border-secondary mt-2" type="button" id="dropdownFilterButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Tous <i class="fas fa-chevron-down ms-1"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark bg-dark-secondary border-secondary" aria-labelledby="dropdownFilterButton">
                                <li><a class="dropdown-item text-white" href="#">Tous</a></li>
                                <li><a class="dropdown-item text-white" href="#">Populaires</a></li>
                                <li><a class="dropdown-item text-white" href="#">Nouveaux</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-tendances" role="tabpanel" aria-labelledby="pills-tendances-tab">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                                <div class="col animation-fade-in" style="animation-delay: 0.3s;">
                                    <div class="card course-card bg-dark-card border-secondary h-100">
                                        <img src="logo.png" alt="Impact Web Logo" style="max-height: 140px;">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">Apprendre de base: React Javascript</h5>
                                            <p class="card-text text-secondary mb-2">Kelly Poetri</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="star-rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-secondary"></i>
                                                </div>
                                                <span class="text-primary fw-bold fs-5">$595</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col animation-fade-in" style="animation-delay: 0.4s;">
                                    <div class="card course-card bg-dark-card border-secondary h-100">
                                        <img src="logo.png" class="card-img-top rounded-top-2" alt="Course Image">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">Master Class: React JS et Tailwind CSS</h5>
                                            <p class="card-text text-secondary mb-2">Michael Smith</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="star-rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </div>
                                                <span class="text-primary fw-bold fs-5">$595</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col animation-fade-in" style="animation-delay: 0.5s;">
                                    <div class="card course-card bg-dark-card border-secondary h-100">
                                        <img src="logo.png" class="card-img-top rounded-top-2" alt="Course Image">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">Full-Stack Laravel React JS: construire un site de Streaming</h5>
                                            <p class="card-text text-secondary mb-2">Adam Lewis</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="star-rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </div>
                                                <span class="text-primary fw-bold fs-5">$595</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col animation-fade-in" style="animation-delay: 0.6s;">
                                    <div class="card course-card bg-dark-card border-secondary h-100">
                                        <img src="logo.png" class="card-img-top rounded-top-2" alt="Course Image">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">Développement d'applications mobiles avec Flutter</h5>
                                            <p class="card-text text-secondary mb-2">Sarah Connor</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="star-rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-secondary"></i>
                                                </div>
                                                <span class="text-primary fw-bold fs-5">$620</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col animation-fade-in" style="animation-delay: 0.7s;">
                                    <div class="card course-card bg-dark-card border-secondary h-100">
                                        <img src="logo.png" class="card-img-top rounded-top-2" alt="Course Image">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">UX/UI Design de l'idéation au prototype</h5>
                                            <p class="card-text text-secondary mb-2">David Lee</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="star-rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                </div>
                                                <span class="text-primary fw-bold fs-5">$580</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col animation-fade-in" style="animation-delay: 0.8s;">
                                    <div class="card course-card bg-dark-card border-secondary h-100">
                                        <img src="logo.png" class="card-img-top rounded-top-2" alt="Course Image">
                                        <div class="card-body">
                                            <h5 class="card-title text-white">Science des données pour les débutants</h5>
                                            <p class="card-text text-secondary mb-2">Emily White</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="star-rating">
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-warning"></i>
                                                    <i class="fas fa-star text-secondary"></i>
                                                    <i class="fas fa-star text-secondary"></i>
                                                </div>
                                                <span class="text-primary fw-bold fs-5">$550</span>
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