<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Mon message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --primary-color: red; /* Couleur principale des boutons/liens actifs (similaire à l'image) */
            --secondary-color: #555;
            --dark-bg: #1c1c1c; /* Couleur de fond principale */
            --dark-card-bg: #2a2a2a; /* Couleur de fond des cartes */
            --dark-sidebar-bg: #212121; /* Couleur de fond de la sidebar */
            --border-color: #333; /* Couleur des bordures */
            --text-color-light: #f8f9fa; /* Texte clair pour les fonds sombres */
            --text-color-secondary: #aaaaaa; /* Texte secondaire, gris */
            --success-color: #28a745; /* Couleur de succès (pour la barre de progression/statut) */
            --info-color: #17a2b8; /* Couleur d'information (pour les icônes d'appel/vidéo) */
            --chat-bubble-incoming: #4a4a4a; /* Couleur des bulles de message entrant */
            --chat-bubble-outgoing: red; /* Couleur des bulles de message sortant (rouge primaire) */
        }

        body {
            overflow-x: hidden;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            font-family: Arial, sans-serif;
        }

        #wrapper {
            display: flex;
        }

        /* Sidebar */
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -11.3rem; /* Cachée par défaut sur mobile */
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
            transition: background-color 0.3s ease, color 0.3s ease;
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

        .bg-dark-secondary {
            background-color: var(--dark-sidebar-bg) !important;
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

        /* Hover effect on message list items */
        .message-list-card .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.08) !important;
        }

        .message-list-card .list-group-item.active {
            background-color: rgba(255, 255, 255, 0.05) !important; /* Lighter active background for message list */
            border-left: 3px solid var(--primary-color);
            padding-left: calc(1.25rem - 3px); /* Ajuster le padding pour compenser la bordure */
        }

        .message-item-pinned {
            border-bottom: 1px solid var(--border-color); /* Séparateur pour les messages épinglés */
            padding-bottom: 1rem;
            margin-bottom: 0.5rem;
        }

        .message-item-pinned + .list-group-item {
            border-top: none; /* Éviter double bordure si le premier message n'est pas épinglé */
        }

        /* Search input */
        .input-group-text {
            border-right: none !important;
        }

        .form-control.bg-dark-card {
            border-left: none !important;
        }

        .form-control.bg-dark-card:focus {
            box-shadow: none;
            border-color: var(--primary-color) !important;
        }

        /* Message List Scrollable */
        .message-scrollable {
            max-height: calc(100vh - 280px); /* Ajuster selon la hauteur de la nav/header */
            overflow-y: auto;
            padding-bottom: 15px; /* Espace en bas */
        }

        /* Scrollbar styles for dark theme */
        .message-scrollable::-webkit-scrollbar {
            width: 8px;
        }

        .message-scrollable::-webkit-scrollbar-track {
            background: var(--dark-card-bg);
            border-radius: 10px;
        }

        .message-scrollable::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 10px;
        }

        .message-scrollable::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }

        /* Chat Area */
        .chat-area-card {
            height: calc(100vh - 130px); /* Ajuster la hauteur pour remplir l'écran moins la navbar et le padding */
        }

        .chat-messages {
            overflow-y: auto;
            display: flex;
            flex-direction: column-reverse; /* Pour que les derniers messages soient en bas */
        }

        .chat-messages::-webkit-scrollbar {
            width: 8px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: var(--dark-card-bg);
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 10px;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }


        .message-bubble {
            max-width: 75%;
            word-wrap: break-word;
            font-size: 0.95rem;
            position: relative;
        }

        .message-bubble.incoming {
            background-color: var(--chat-bubble-incoming) !important;
            border-bottom-left-radius: 0 !important;
        }

        .message-bubble.outgoing {
            background-color: var(--chat-bubble-outgoing) !important;
            border-bottom-right-radius: 0 !important;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
            flex-shrink: 0; /* Empêche l'avatar de rétrécir */
        }

        /* Typing animation */
        .typing-dot {
            opacity: 0;
            animation: typing 1s infinite steps(1, start);
        }
        .typing-dot:nth-child(1) { animation-delay: 0s; }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typing {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }

        /* Chat Header Icons */
        .chat-header-icons i {
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .chat-header-icons i.fa-phone:hover {
            color: var(--success-color); /* Green for phone on hover */
        }
        .chat-header-icons i.fa-video:hover {
            color: var(--primary-color); /* Red for video on hover */
        }
        .chat-header-icons i.fa-info-circle:hover {
            color: var(--info-color); /* Blue for info on hover */
        }

        /* Send button */
        .send-button {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .send-button:hover {
            background-color: #e04a40 !important; /* Darker shade on hover */
            border-color: #e04a40 !important;
            transform: scale(1.05);
        }

        .message-input {
            border-radius: 0.375rem !important; /* Matches Bootstrap's default border-radius */
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            padding-right: 0; /* Remove default padding for input */
        }
        .input-group .btn {
            border-radius: 0.375rem !important; /* Matches Bootstrap's default border-radius */
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
        }


        /* Dropdown menu styling */
        .dropdown-menu.bg-dark-secondary {
            background-color: var(--dark-card-bg) !important;
            border-color: var(--border-color) !important;
        }

        .dropdown-item.text-white {
            color: var(--text-color-light) !important;
            background-color: transparent !important;
        }

        .dropdown-item.text-white:hover,
        .dropdown-item.text-white:focus {
            background-color: var(--primary-color) !important;
            color: var(--text-color-light) !important;
        }

        .dropdown-divider {
            border-top: 1px solid var(--border-color) !important;
        }


        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleUp {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .card, .message-item, .chat-messages .message-bubble, .send-button {
            animation: fadeIn 0.5s ease-out;
        }

        .animation-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0; /* Start hidden */
        }

        .animation-slide-in-left {
            animation: slideInLeft 0.5s ease-out forwards;
            opacity: 0;
        }

        .animation-slide-in-right {
            animation: slideInRight 0.5s ease-out forwards;
            opacity: 0;
        }

        .animation-scale-up {
            animation: scaleUp 0.3s ease-out forwards;
            opacity: 0;
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
                margin-left: -15rem;
            }
            #sidebarToggle {
                display: none !important;
            }
            .chat-area-card {
                height: calc(100vh - 130px); /* Ajusté pour grand écran */
            }
            .message-scrollable {
                max-height: calc(100vh - 280px); /* Ajusté pour grand écran */
            }
        }

        @media (max-width: 991.98px) {
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }
            #page-content-wrapper {
                width: 100%;
            }
            .navbar h2 {
                font-size: 1.5rem; /* Ajuste la taille du titre sur mobile */
            }
            .chat-area-card {
                height: 60vh; /* Ajuste la hauteur de la zone de chat sur les écrans plus petits */
            }
            .message-list-card {
                height: auto !important; /* Permet à la liste de messages de s'adapter */
            }
            .message-scrollable {
                max-height: 40vh; /* Permet le défilement de la liste des messages sur les petits écrans */
            }
        }

        @media (max-width: 767.98px) {
            .navbar-collapse {
                display: none !important; /* Cache les icônes de la navbar sur très petits écrans */
            }
            .chat-header-icons {
                display: flex;
                align-items: center;
            }
            .chat-header-icons i {
                font-size: 1.2rem;
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
                <a href="{{ route('messages') }}" class="list-group-item list-group-item-action bg-dark text-white active">
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
                    <h2 class="text-white mb-0 ms-3">Mon message</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="#"><i class="fas fa-comment-dots"></i></a>
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
                <div class="row gx-4">
                    <div class="col-lg-4 col-md-5 mb-4 mb-lg-0">
                        <div class="card bg-dark-card border-secondary shadow-sm message-list-card h-100">
                            <div class="card-header bg-dark-card border-secondary d-flex justify-content-between align-items-center py-3">
                                <div class="dropdown">
                                    <button class="btn btn-link text-white text-decoration-none dropdown-toggle p-0" type="button" id="messagesFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tous les messages <i class="fas fa-chevron-down ms-1 text-secondary"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark bg-dark-secondary border-secondary" aria-labelledby="messagesFilter">
                                        <li><a class="dropdown-item text-white" href="#">Tous les messages</a></li>
                                        <li><a class="dropdown-item text-white" href="#">Messages non lus</a></li>
                                        <li><a class="dropdown-item text-white" href="#">Messages archivés</a></li>
                                    </ul>
                                </div>
                                <div class="text-secondary">
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="p-3 border-bottom border-secondary">
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark-card border-secondary text-secondary"><i class="fas fa-search"></i></span>
                                        <input type="text" class="form-control bg-dark-card border-secondary text-white" placeholder="Rechercher un message...">
                                    </div>
                                </div>

                                <div class="list-group list-group-flush message-scrollable">
                                    <p class="text-secondary text-small px-3 pt-3 pb-1 mb-0">Message épinglé</p>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark-card text-white message-item-pinned active animation-fade-in">
                                        <div class="d-flex align-items-center">
                                            <img src="logo.png" alt="Impact Web Logo" class="rounded-circle me-3 message-avatar" style="max-height: 50px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Envato Mastery</h6>
                                                <small class="text-success d-flex align-items-center">
                                                    Karen est en train de taper...
                                                </small>
                                            </div>
                                            <small class="text-secondary ms-auto">17h01</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark-card text-white message-item animation-fade-in" style="animation-delay: 0.1s;">
                                        <div class="d-flex align-items-center">
                                            <img src="logo.png" alt="Impact Web Logo" class="rounded-circle me-3 message-avatar" style="max-height: 50px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Maîtriser Git et l'application Vercel</h6>
                                                <small class="text-secondary">Toi: Merci à tous !</small>
                                            </div>
                                            <small class="text-secondary ms-auto">16h35</small>
                                        </div>
                                    </a>

                                    <p class="text-secondary text-small px-3 pt-3 pb-1 mb-0">Tous les messages</p>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark-card text-white message-item animation-fade-in" style="animation-delay: 0.2s;">
                                        <div class="d-flex align-items-center">
                                            <img src="logo.png" alt="Impact Web Logo" class="rounded-circle me-3 message-avatar"style="max-height: 50px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Ms. Nina</h6>
                                                <small class="text-secondary">Ok, je crois que j'ai déjà compris, Madame...</small>
                                            </div>
                                            <small class="text-secondary ms-auto">17h01</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark-card text-white message-item animation-fade-in" style="animation-delay: 0.3s;">
                                        <div class="d-flex align-items-center">
                                            <img src="logo.png" alt="Impact Web Logo" class="rounded-circle me-3 message-avatar"style="max-height: 50px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Marteen Gowl</h6>
                                                <small class="text-secondary">Merci mon frère !</small>
                                            </div>
                                            <span class="badge bg-primary rounded-pill ms-2 text-white">1</span>
                                            <small class="text-secondary ms-auto">Hier</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark-card text-white message-item animation-fade-in" style="animation-delay: 0.4s;">
                                        <div class="d-flex align-items-center">
                                            <img src="logo.png" alt="Impact Web Logo" class="rounded-circle me-3 message-avatar" style="max-height: 50px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Puke Tresse</h6>
                                                <small class="text-secondary d-flex align-items-center">
                                                    Évaluation sommaire.pdf <i class="fas fa-paperclip ms-1 text-secondary"></i>
                                                </small>
                                            </div>
                                            <small class="text-secondary ms-auto">Hier</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark-card text-white message-item animation-fade-in" style="animation-delay: 0.5s;">
                                        <div class="d-flex align-items-center">
                                            <img src="logo.png" alt="Impact Web Logo" class="rounded-circle me-3 message-avatar"style="max-height: 50px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Britney Wale</h6>
                                                <small class="text-secondary d-flex align-items-center">
                                                    Je sais, n'est-ce pas ! Je devrais en apprendre davantage sur... <i class="fas fa-check-double ms-1 text-secondary"></i>
                                                </small>
                                            </div>
                                            <small class="text-secondary ms-auto">19/11/2023</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action bg-dark-card text-white message-item animation-fade-in" style="animation-delay: 0.6s;">
                                        <div class="d-flex align-items-center">
                                            <img src="logo.png" alt="Impact Web Logo" class="rounded-circle me-3 message-avatar"style="max-height: 50px;">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Jeffery Junior</h6>
                                                <small class="text-secondary">Salut ! C'était une réunion très productive !</small>
                                            </div>
                                            <small class="text-secondary ms-auto">15/11/2023</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-7">
                        <div class="card bg-dark-card border-secondary shadow-sm chat-area-card h-100 d-flex flex-column">
                            <div class="card-header bg-dark-card border-secondary d-flex align-items-center py-3">
                                <div class="d-flex align-items-center">
                                    <img src="logo.png" class="rounded-circle me-3 message-avatar" alt="Impact Web Logo" style="max-height: 50px;">
                                    <div>
                                        <h5 class="mb-0 text-white">Envato Mastery</h5>
                                        <small class="text-success d-flex align-items-center">
                                            Karen est en train de taper... <span class="typing-dot">.</span><span class="typing-dot">.</span><span class="typing-dot">.</span>
                                        </small>
                                    </div>
                                </div>
                                <div class="ms-auto text-secondary chat-header-icons">
                                    <i class="fas fa-phone me-3 text-info"></i>
                                    <i class="fas fa-video me-3 text-info"></i>
                                    <i class="fas fa-info-circle"></i>
                                </div>
                            </div>
                            <div class="card-body chat-messages flex-grow-1 p-4">
                                <div class="text-center my-3">
                                    <span class="badge bg-secondary text-white-50 px-3 py-2 rounded-pill">Aujourd'hui, 9 Septembre</span>
                                </div>

                                <div class="d-flex mb-3 align-items-end animation-slide-in-left">
                                    <img src="logo.png" alt="Impact Web Logo" style="max-height: 50px;" class="rounded-circle me-3 message-avatar">
                                    <div class="message-bubble incoming bg-secondary text-white p-3 rounded-3 shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <p class="fw-bold mb-0">Britney Wale</p>
                                            <small class="text-white-50">17h00</small>
                                        </div>
                                        <p class="mb-0">Salut tout le monde ! Je viens de dénicher une boîte à outils de conception d'interface utilisateur. Envato a vraiment amélioré son offre.</p>
                                    </div>
                                </div>

                                <div class="d-flex mb-3 align-items-end animation-slide-in-left" style="animation-delay: 0.1s;">
                                    <img src="logo.png" alt="Impact Web Logo" style="max-height: 50px;" class="rounded-circle me-3 message-avatar">
                                    <div class="message-bubble incoming bg-secondary text-white p-3 rounded-3 shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <p class="fw-bold mb-0">Marteen Gowl</p>
                                            <small class="text-white-50">17h12</small>
                                        </div>
                                        <p class="mb-0">Tout à fait d'accord, Maria ! 😉 Je travaille actuellement sur un un projet utilisant les pistes audio trouvées sur Envato Elements. C'est une véritable révolution pour les créateurs de contenu.</p>
                                    </div>
                                </div>

                                <div class="d-flex mb-3 align-items-end animation-slide-in-left" style="animation-delay: 0.2s;">
                                    <img src="logo.png" alt="Impact Web Logo" style="max-height: 50px;" class="rounded-circle me-3 message-avatar">
                                    <div class="message-bubble incoming bg-secondary text-white p-3 rounded-3 shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <p class="fw-bold mb-0">Puke Tresse</p>
                                            <small class="text-white-50">17h24</small>
                                        </div>
                                        <p class="mb-0">Salut à tous ! Je viens de rejoindre la conversation. Je suis curieux, auriez-vous des recommandations pour un cours de photographie ? J'aimerais améliorer mes compétences !</p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mb-3 align-items-end animation-slide-in-right" style="animation-delay: 0.3s;">
                                    <div class="message-bubble outgoing bg-primary text-white p-3 rounded-3 shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <p class="fw-bold mb-0">Peter Parker</p>
                                            <small class="text-white-50">17h27</small>
                                        </div>
                                        <p class="mb-0">Puke, il y a des cours de photographie géniaux ! Je vais t'envoyer quelques liens. 😎</p>
                                    </div>
                                    <img src="logo.png" alt="Impact Web Logo" style="max-height: 50px;" class="rounded-circle ms-3 message-avatar">
                                </div>

                            </div>
                            <div class="card-footer bg-dark-card border-secondary p-3">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-dark-card border-secondary text-white message-input" placeholder="Tapez un message ici...">
                                    <button class="btn btn-primary send-button animation-scale-up" type="button"><i class="fas fa-paper-plane"></i></button>
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