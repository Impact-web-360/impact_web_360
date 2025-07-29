<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon emploi du temps - Impact Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
    --primary-color: red; /* Couleur principale des boutons/liens actifs (similaire à l'image du dashboard) */
    --secondary-color: #555;
    --dark-bg: #1c1c1c; /* Couleur de fond principale */
    --dark-card-bg: #2a2a2a; /* Couleur de fond des cartes */
    --dark-sidebar-bg: #212121; /* Couleur de fond de la sidebar */
    --border-color: #333; /* Couleur des bordures */
    --text-color-light: #f8f9fa; /* Texte clair pour les fonds sombres */
    --text-color-secondary: #aaaaaa; /* Texte secondaire, gris */
    --success-color: #28a745; /* Couleur de succès (pour la barre de progression) */
    --info-color: #17a2b8; /* Couleur d'information (pour la barre de progression) */
    /* Couleurs spécifiques aux événements du calendrier */
    --event-success: #28a745; /* Vert pour Envato Mastery */
    --event-danger: #dc3545; /* Rouge pour UI/UX Design Basic */
    --event-primary: #0d6efd; /* Bleu pour Mastering Git */
    --event-info: #0dcaf0; /* Cyan pour Live Class (plus clair que le bleu) */
    --stars-gold: gold; /* Couleur des étoiles */
}

body {
    overflow-x: hidden;
    background-color: var(--dark-bg);
    color: var(--text-color-light);
    font-family: Arial, sans-serif; /* Police générique pour la compatibilité */
}

#wrapper {
    display: flex;
}

/* Sidebar (Repris du dashboard, ajusté pour la cohérence) */
#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -11.3rem; /* Cachée par défaut sur mobile */
    transition: margin .25s ease-out;
    width: 15rem;
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

.main-content {
    background-color: var(--dark-bg);
}

/* Cards (Repris du dashboard) */
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

.text-xs {
    font-size: 0.65rem;
    vertical-align: middle;
}

/* Specific button styles for calendar */
.btn-icon-custom {
    background-color: var(--border-color);
    color: var(--text-color-light);
    border-radius: 5px;
    padding: 0.5rem 0.75rem;
    border: none;
    transition: background-color 0.2s ease-in-out;
}

.btn-icon-custom:hover {
    background-color: rgba(255, 255, 255, 0.15);
    color: var(--text-color-light);
}

.btn-icon-custom-sm {
    background-color: rgba(255, 255, 255, 0.1);
    color: var(--text-color-secondary);
    border-radius: 50%;
    width: 25px;
    height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    font-size: 0.8rem;
    border: none;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
}

.btn-icon-custom-sm:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: var(--text-color-light);
}

/* Schedule Grid */
.schedule-grid {
    border: 1px solid var(--border-color);
    border-radius: 0.5rem;
    overflow: hidden;
}

.schedule-header {
    background-color: var(--dark-card-bg); /* Cohérent avec les cartes */
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--border-color);
}

.schedule-header .day-num {
    font-size: 1.2rem;
    font-weight: bold;
}

.schedule-header .day-name {
    font-size: 0.8rem;
    text-transform: uppercase;
    color: var(--text-color-secondary);
}

.schedule-body .schedule-row {
    min-height: 80px; /* Hauteur de chaque ligne horaire */
    border-bottom: 1px dashed rgba(255, 255, 255, 0.05);
}

.schedule-body .schedule-row:last-child {
    border-bottom: none;
}

.schedule-body .time-col {
    padding-top: 0.5rem;
    font-size: 0.9rem;
    color: var(--text-color-secondary);
    min-width: 70px; /* Largeur fixe pour la colonne "Time" */
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
}

.schedule-body .col {
    position: relative;
    border-left: 1px dashed rgba(255, 255, 255, 0.05);
    padding: 0.5rem; /* Ajuster le padding pour les cellules */
}

.schedule-body .col:first-child {
    border-left: none;
}

.event {
    position: absolute;
    width: calc(200% - 0rem); /* Prend toute la largeur de la cellule moins le padding */
    left: -10rem;
    padding: 0.5rem !important;
    font-size: 0.9rem;
    line-height: 1.3;
    overflow: hidden;
    z-index: 1; /* Pour que les événements se superposent aux lignes pointillées */
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    animation: fadeInScale 0.5s ease-out forwards; /* Animation d'apparition */
    transform: scale(0.9); /* Commence plus petit */
}

.event:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.event .text-sm {
    font-size: 0.8rem;
    color: rgba(255, 255, 255, 0.8);
}

.event .text-xs {
    font-size: 0.7rem;
    color: var(--text-secondary);
}

/* Specific event colors */
.event.bg-success { background-color: var(--accent-green) !important; }
.event.bg-danger { background-color: var(--accent-red) !important; }
.event.bg-primary { background-color: var(--accent-blue) !important; }
.event.bg-info { background-color: var(--accent-cyan) !important; } /* Utilisez info pour le Live Class */


/* Calendar Widget */
.calendar-grid .calendar-header .col {
    font-size: 0.9rem;
    font-weight: bold;
}

.calendar-grid .calendar-body .calendar-day {
    padding: 0.5rem 1rem;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, border-radius 0.2s ease-in-out;
}

.calendar-grid .calendar-body .calendar-day:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
}

.calendar-grid .calendar-body .calendar-day.active { /* Utilise la classe "active" du dashboard */
    background-color: var(--primary-color);
    border-radius: 5px;
    font-weight: bold;
    color: var(--text-color-light) !important; /* Pour override text-danger */
}

.calendar-grid .calendar-body .calendar-day.text-secondary {
    color: var(--text-color-secondary) !important;
}

/* Category List */
.category-dot {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
}

.list-group-flush .list-group-item {
    background-color: transparent !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.list-group-flush .list-group-item:last-child {
    border-bottom: none;
}

.list-group-flush .list-group-item .badge {
    min-width: 25px;
}

/* Animations (Repris du dashboard) */
@keyframes fadeInScale {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.card, .event, .btn.animate-button, .category-card {
    animation: fadeIn 0.5s ease-out;
}

.animate-button {
    background-color: var(--primary-color) !important;
    border-color: var(--primary-color) !important;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out, background-color 0.2s ease-in-out;
}

.animate-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(247, 92, 78, 0.3); /* Utilise la couleur primaire */
    background-color: #e04a40 !important; /* Darker shade on hover */
    border-color: #e04a40 !important;
}

.animate-pulse {
    animation: pulse 1s infinite alternate;
}

@keyframes pulse {
    from {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(247, 92, 78, 0.4); /* Utilise la couleur primaire */
    }
    to {
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(247, 92, 78, 0);
    }
}

/* Responsive adjustments (Repris et ajusté) */
@media (min-width: 992px) {
    #sidebar-wrapper {
        margin-left: 0;
    }
    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }
    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem; /* Sidebar se cache sur desktop si toggled */
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
    .schedule-grid {
        overflow-x: auto; /* Permet le défilement horizontal sur petits écrans */
    }
    .schedule-header, .schedule-body {
        min-width: 700px; /* Assure que la grille ne se comprime pas trop */
    }
    .time-col {
        min-width: 60px; /* Ajustement pour la colonne temps */
    }
}

@media (max-width: 767.98px) {
    .navbar .d-lg-block { /* Cache le texte de bienvenue sur petits écrans */
        display: none !important;
    }
}

/* Dropdown menu styling */
.dropdown-menu.bg-dark-secondary {
    background-color: var(--dark-card-bg) !important; /* Use dark card background for dropdown */
    border-color: var(--border-color) !important;
}

.dropdown-item.text-white {
    color: var(--text-color-light) !important;
    background-color: transparent !important;
}

.dropdown-item.text-white:hover,
.dropdown-item.text-white:focus {
    background-color: var(--primary-color) !important; /* Highlight on hover */
    color: var(--text-color-light) !important;
}

.dropdown-divider {
    border-top: 1px solid var(--border-color) !important;
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
                <a href="{{ route('calendrier') }}" class="list-group-item list-group-item-action bg-dark text-white active">
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
                    <h2 class="text-white mb-0 ms-3">Mon emploi du temps</h2>
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

            <div class="container-fluid p-4 main-content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card bg-dark-card p-3 mb-4 rounded-lg shadow-sm">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="text-white mb-0">Planifier une tâche <span class="text-secondary ms-2">Semaine 2 de novembre 2023</span></h5>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-sm btn-icon-custom me-2"><i class="fas fa-ellipsis-v"></i></button>
                                    <button class="btn btn-sm btn-icon-custom"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="schedule-grid bg-dark-card">
                            <div class="schedule-header row gx-0">
                                <div class="col-1 time-col text-white text-end pe-3">Time</div>
                                <div class="col text-center text-white">
                                    <div class="day-num">5</div>
                                    <div class="day-name">Mon</div>
                                </div>
                                <div class="col text-center text-white">
                                    <div class="day-num">6</div>
                                    <div class="day-name">Tue</div>
                                </div>
                                <div class="col text-center text-white">
                                    <div class="day-num">7</div>
                                    <div class="day-name">Wed</div>
                                </div>
                                <div class="col text-center text-white">
                                    <div class="day-num">8</div>
                                    <div class="day-name">Thu</div>
                                </div>
                                <div class="col text-center text-danger">
                                    <div class="day-num">9</div>
                                    <div class="day-name">Fri</div>
                                </div>
                                <div class="col text-center text-white">
                                    <div class="day-num">10</div>
                                    <div class="day-name">Sat</div>
                                </div>
                                <div class="col text-center text-white">
                                    <div class="day-num">11</div>
                                    <div class="day-name">Sun</div>
                                </div>
                            </div>
                            <div class="schedule-body">
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">08:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col">
                                        <div class="event bg-success text-white p-2 rounded-3" style="animation-delay: 0.1s;">
                                            <p class="mb-1 fw-bold">Envato Mastery</p>
                                            <p class="mb-1 text-sm">Apprendre une nouvelle partie</p>
                                            <p class="mb-0 text-xs text-secondary">08h00 - 09h00</p>
                                            <button class="btn btn-sm btn-icon-custom-sm position-absolute top-0 end-0 mt-1 me-1"><i class="fas fa-ellipsis-h"></i></button>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">09:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">10:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col">
                                        <div class="event bg-danger text-white p-2 rounded-3" >
                                            <p class="mb-1 fw-bold">UI/UX Design Basic</p>
                                            <p class="mb-1 text-sm">Terminez la tâche 12</p>
                                            <p class="mb-0 text-xs text-secondary">10h00 - 12h00</p>
                                            <button class="btn btn-sm btn-icon-custom-sm position-absolute top-0 end-0 mt-1 me-1"><i class="fas fa-ellipsis-h"></i></button>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">11:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">12:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">13:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col">
                                        <div class="event bg-primary text-white p-2 rounded-3" >
                                            <p class="mb-1 fw-bold">Mastering Git & Vercel app</p>
                                            <p class="mb-1 text-sm">Apprendre une nouvelle partie</p>
                                            <p class="mb-0 text-xs text-secondary">13h00 - 14h00</p>
                                            <button class="btn btn-sm btn-icon-custom-sm position-absolute top-0 end-0 mt-1 me-1"><i class="fas fa-ellipsis-h"></i></button>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">14:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">15:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">16:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col">
                                        <div class="event bg-info text-white p-2 rounded-3" >
                                            <p class="mb-1 fw-bold">Live Class</p>
                                            <p class="mb-1 text-sm">Comment gagner de l'argent avec...</p>
                                            <p class="mb-0 text-xs text-secondary">16h00 - 18h00</p>
                                            <button class="btn btn-sm btn-icon-custom-sm position-absolute top-0 end-0 mt-1 me-1"><i class="fas fa-ellipsis-h"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="schedule-row row gx-0">
                                    <div class="col-1 time-col text-secondary text-end pe-3">17:00</div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                    <div class="col"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <button class="btn btn-primary w-100 p-3 mb-4 rounded-lg shadow-sm animate-button">
                            <i class="fas fa-plus-circle me-2"></i> Ajouter un nouvel événement
                        </button>

                        <div class="card bg-dark-card p-3 mb-4 rounded-lg shadow-sm calendar-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="#" class="text-white text-decoration-none"><i class="fas fa-chevron-left"></i></a>
                                <h6 class="text-white mb-0 fw-bold">Novembre 2023</h6>
                                <a href="#" class="text-white text-decoration-none"><i class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="calendar-grid text-white">
                                <div class="calendar-header row gx-0 text-secondary mb-2">
                                    <div class="col text-center">Mo</div>
                                    <div class="col text-center">Tu</div>
                                    <div class="col text-center">We</div>
                                    <div class="col text-center">Th</div>
                                    <div class="col text-center">Fr</div>
                                    <div class="col text-center">Sa</div>
                                    <div class="col text-center">Su</div>
                                </div>
                                <div class="calendar-body row gx-0">
                                    <div class="col text-center text-secondary calendar-day">29</div>
                                    <div class="col text-center text-secondary calendar-day">30</div>
                                    <div class="col text-center text-secondary calendar-day">31</div>
                                    <div class="col text-center calendar-day">1</div>
                                    <div class="col text-center calendar-day">2</div>
                                    <div class="col text-center calendar-day">3</div>
                                    <div class="col text-center calendar-day">4</div>

                                    <div class="col text-center calendar-day">5</div>
                                    <div class="col text-center calendar-day">6</div>
                                    <div class="col text-center calendar-day">7</div>
                                    <div class="col text-center calendar-day">8</div>
                                    <div class="col text-center calendar-day highlight active">9</div> <div class="col text-center calendar-day">10</div>
                                    <div class="col text-center calendar-day">11</div>

                                    <div class="col text-center calendar-day">12</div>
                                    <div class="col text-center calendar-day">13</div>
                                    <div class="col text-center calendar-day">14</div>
                                    <div class="col text-center calendar-day">15</div>
                                    <div class="col text-center calendar-day">16</div>
                                    <div class="col text-center calendar-day">17</div>
                                    <div class="col text-center calendar-day">18</div>

                                    <div class="col text-center calendar-day">19</div>
                                    <div class="col text-center calendar-day">20</div>
                                    <div class="col text-center calendar-day">21</div>
                                    <div class="col text-center calendar-day">22</div>
                                    <div class="col text-center calendar-day">23</div>
                                    <div class="col text-center calendar-day">24</div>
                                    <div class="col text-center calendar-day">25</div>

                                    <div class="col text-center calendar-day">26</div>
                                    <div class="col text-center calendar-day">27</div>
                                    <div class="col text-center calendar-day">28</div>
                                    <div class="col text-center calendar-day">29</div>
                                    <div class="col text-center calendar-day">30</div>
                                    <div class="col text-center text-secondary calendar-day">1</div>
                                    <div class="col text-center text-secondary calendar-day">2</div>
                                    <div class="col text-center text-secondary calendar-day">3</div>
                                    <div class="col text-center text-secondary calendar-day">4</div>
                                    <div class="col text-center text-secondary calendar-day">5</div>
                                    <div class="col text-center text-secondary calendar-day">6</div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-dark-card p-3 rounded-lg shadow-sm category-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-white mb-0">Liste des catégories</h6>
                               <button class="btn btn-sm btn-danger rounded-circle animate-pulse"><i class="fas fa-plus"></i></button>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent text-white d-flex justify-content-between align-items-center px-0">
                                    <div class="d-flex align-items-center">
                                        <span class="category-dot bg-success me-2"></span> Envato Mastery
                                    </div>
                                    <span class="badge bg-secondary rounded-pill">1</span>
                                </li>
                                <li class="list-group-item bg-transparent text-white d-flex justify-content-between align-items-center px-0">
                                    <div class="d-flex align-items-center">
                                        <span class="category-dot bg-danger me-2"></span> UI/UX Design Basic
                                    </div>
                                    <span class="badge bg-secondary rounded-pill">1</span>
                                </li>
                                <li class="list-group-item bg-transparent text-white d-flex justify-content-between align-items-center px-0">
                                    <div class="d-flex align-items-center">
                                        <span class="category-dot bg-primary me-2"></span> Mastering Git & Vercel app
                                    </div>
                                    <span class="badge bg-secondary rounded-pill">1</span>
                                </li>
                                <li class="list-group-item bg-transparent text-white d-flex justify-content-between align-items-center px-0">
                                    <div class="d-flex align-items-center">
                                        <span class="category-dot bg-info me-2"></span> Live Class
                                    </div>
                                    <span class="badge bg-secondary rounded-pill">1</span>
                                </li>
                            </ul>
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