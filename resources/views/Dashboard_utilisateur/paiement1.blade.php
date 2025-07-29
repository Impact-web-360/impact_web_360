<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Paiement Réussi</title>
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

    /* Specific to Payment Success Page */
    --payment-card-bg: #2C2C2C; /* Slightly darker than main background for the card */
    --payment-card-border: #3A3A3A;
    --secondary-button-border: var(--border-color);
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
    width: 17rem;
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

/* Payment Filters */
        .payment-filters {
            background-color: var(--dark-bg);
            border-bottom: 1px solid var(--border-color);
        }

        .filter-buttons .btn {
            background-color: var(--secondary-button-bg);
            color: var(--text-color-light);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 8px 20px;
            margin-right: 5px; /* Space between buttons */
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .filter-buttons .btn:last-child {
            margin-right: 0;
        }

        .filter-buttons .btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
            box-shadow: 0 2px 5px rgba(255, 107, 107, 0.3);
        }
        .filter-buttons .btn:not(.active):hover {
            background-color: #444444;
            color: var(--text-light);
        }

        .sort-button {
            background-color: var(--secondary-button-bg);
            color: var(--text-light);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 8px 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .sort-button:hover {
            background-color: #444444;
            color: var(--text-light);
            border-color: #666666;
        }

        
    .payment-card {
      background-color: #1c1c1c;
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 1rem;
      font-size: 12px;
    }
    .payment-card img {
      width: 60px;
      height: 60px;
      border-radius: 10px;
      object-fit: cover;
    }

    .payment-info {
      flex: 1;
      min-width: 200px;
    }

    .payment-details {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      align-items: center;
      justify-content: flex-end;
      flex: 1;
    }

    .detail-item {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      min-width: 80px;
    }

    .detail-label {
      margin: 0;
      color: #aaa;
    }

    .detail-value {
      margin: 0;
      font-weight: bold;
    }



    .status-text {
      font-weight: bold;
    }
    .status-pending { color: #ffc107; }
    .status-success { color: #4caf50; }
    .status-failed { color: #f44336; }



        /* --- Animations --- */
        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.03); opacity: 0.9; }
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
    #page-content-wrapper {
        width: 100%;
    }
    .navbar h2 {
        font-size: 1.5rem;
    }
    
    #sidebar-wrapper {
        position: absolute; /* Allow flow on desktop */
    }
}

@media (max-width: 767.98px) {
    .navbar-collapse {
        display: none !important; /* Hide notification/user icons on very small screens */
    }
    .payment-filters {
                flex-direction: column;
                align-items: flex-start;
            }
            .filter-buttons {
                width: 100%;
                margin-bottom: 15px;
                flex-wrap: wrap; /* Allow buttons to wrap */
            }
            .filter-buttons .btn {
                margin-bottom: 10px;
                width: calc(50% - 10px); /* Two buttons per row */
            }
            .filter-buttons .btn:nth-child(even) {
                margin-right: 0;
            }

            .sort-button {
                width: 100%;
            }

            #sidebar-wrapper {
                position: absolute; /* Allow flow on desktop */
            }
            .payment-card {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .payment-details {
                width: 100%;
                justify-content: space-between;
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid #2d2d2d;
            }
            
            .detail-item {
                align-items: flex-start;
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
                <a href="{{ route('paiement1') }}" class="list-group-item list-group-item-action bg-dark text-white active">
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
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle" aria-label="Toggle sidebar"><i class="fas fa-bars"></i></button>
                    <h2 class="text-white mb-0 ms-3">Paiement</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="#" aria-label="Search"><i class="fas fa-search"></i></a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="#" aria-label="Notifications"><i class="fas fa-bell"></i></a>
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

            <div class="payment-filters d-flex justify-content-between align-items-center px-4 py-3">
                    <div class="btn-group filter-buttons" role="group" aria-label="Payment Filters">
                        <button type="button" class="btn btn-secondary active">Tous les</button>
                        <button type="button" class="btn btn-secondary">En attente de paiement</button>
                        <button type="button" class="btn btn-secondary">Réussir</button>
                        <button type="button" class="btn btn-secondary">Échoué</button>
                    </div>
                    <button class="btn btn-outline-secondary sort-button">Trier par Date <i class="fas fa-sort-down ms-2"></i></button>
            </div>

                <div class="payment-list px-4 py-3">

                    <div class="payment-card">
                        <img src="logo.png" alt="Thumbnail">
                        <div class="payment-info">
                        <h6 class="mb-1">Envato Mastery: construire un modèle de revenu passif à partir de la vente</h6>
                        <p class="mb-0">16 Modules • 41 vidéos</p>
                        </div>
                        <div class="payment-details">
                        <div class="detail-item">
                            <p class="detail-label">Prix:</p>
                            <p class="detail-value text-success">€ 99,99</p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Temps restant:</p>
                            <p class="detail-value text-success">2 jours</p>
                        </div>
                        <div class="detail-item">
                            <p class="status-text status-pending">En attente</p>
                        </div>
                        </div>
                    </div>

                    <div class="payment-card">
                        <img src="logo.png" alt="Thumbnail">
                        <div class="payment-info">
                        <h6 class="mb-1">Envato Mastery: construire un modèle de revenu passif à partir de la vente</h6>
                        <p class="mb-0">16 Modules • 41 vidéos</p>
                        </div>
                        <div class="payment-details">
                        <div class="detail-item">
                            <p class="detail-label">Prix:</p>
                            <p class="detail-value text-success">€ 99,99</p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Temps restant:</p>
                            <p class="detail-value text-success">2 jours</p>
                        </div>
                        <div class="detail-item">
                            <p class="status-text status-pending">En attente</p>
                        </div>
                        </div>
                    </div>

                    <div class="payment-card">
                        <img src="logo.png" alt="Thumbnail">
                        <div class="payment-info">
                        <h6 class="mb-1">Envato Mastery: construire un modèle de revenu passif à partir de la vente</h6>
                        <p class="mb-0">16 Modules • 41 vidéos</p>
                        </div>
                        <div class="payment-details">
                        <div class="detail-item">
                            <p class="detail-label">Prix:</p>
                            <p class="detail-value text-success">€ 99,99</p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Temps restant:</p>
                            <p class="detail-value text-success">2 jours</p>
                        </div>
                        <div class="detail-item">
                            <p class="status-text status-pending">En attente</p>
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