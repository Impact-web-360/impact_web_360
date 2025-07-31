<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impact Web - Paiement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />
    <style>
        /* Variables CSS pour faciliter la gestion des couleurs et espacements */
        :root {
            --primary-color: #FF0000;
            /* Rouge vif pour correspondre à la maquette */
            --secondary-color: #6c757d;
            /* Gris de Bootstrap pour les textes secondaires */
            --dark-bg: #1A1A1A;
            /* Fond principal plus sombre */
            --dark-sidebar-bg: #212121;
            /* Fond de la sidebar */
            --dark-navbar-bg: #212121;
            /* Fond de la navbar (same as sidebar for consistency) */
            --dark-card-bg: #2C2C2C;
            /* Fond des cartes et sections */
            --border-color: #3A3A3A;
            /* Bordures subtiles */
            --text-color-light: #F8F9FA;
            /* Texte principal clair */
            --text-color-secondary: #B0B0B0;
            /* Texte secondaire, plus clair que --secondary-color */
            --hero-section-bg-start: #3B2E74;
            /* Début du dégradé du hero (from Découvrir page) */
            --hero-section-bg-end: #5A4893;
            /* Fin du dégradé du hero (from Découvrir page) */
            --hero-text-color: #FFFFFF;
            /* Couleur du texte dans le hero (from Découvrir page) */
            --hero-circle-color-1: rgba(100, 80, 150, 0.4);
            /* Cercles de fond du hero (from Découvrir page) */
            --hero-circle-color-2: rgba(130, 110, 180, 0.4);
            /* (from Découvrir page) */
            --button-active-bg: var(--primary-color);
            /* Couleur de fond des boutons actifs */
            --button-inactive-bg: var(--dark-card-bg);
            /* Couleur de fond des boutons inactifs */
            --button-text-inactive: var(--text-color-secondary);
            --stars-gold: gold;
            /* Gold color for stars */

            /* Specific to Settings Page (including password & general sections) */
            --save-button-bg: #007bff;
            /* Blue for save button */
            --save-button-hover: #0056b3;
            --upload-area-bg: #2b2b3f;
            --upload-area-border: #4a4a60;
            --input-group-bg: #3A3A3A;
            /* Background for the eye icon in password fields */
            --switch-bg-off: #4F4F4F;
            /* Off state of the toggle switch */
            --switch-bg-on: #34C759;
            /* Green for on state of toggle switch */


            /* Specific to Payment Success Page */
            --payment-card-bg: #2C2C2C;
            /* Slightly darker than main background for the card */
            --payment-card-border: #3A3A3A;
            --secondary-button-border: var(--border-color);

            --primary-bg: #1A1A1A;
            --secondary-bg: #2C2C2C;
            --text-color: #E0E0E0;
            --light-text-color: #B0B0B0;
            --accent-color: #007bff;
            /* Bootstrap primary blue */
            --danger-color: #DC3545;
            /* Bootstrap danger red */
            --border-color: #444444;
            --input-bg: #3A3A3A;
            --input-border: #555555;
            --checkbox-checked: #28A745;
            /* Bootstrap success green */
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

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -17rem;
            /* Hidden by default on mobile */
            transition: margin .25s ease-out;
            width: 17rem;
            background-color: var(--dark-sidebar-bg) !important;
            border-right: 1px solid var(--border-color);
            position: fixed;
            /* Fixed sidebar on screen */
            z-index: 1030;
            /* Above content */
            overflow-y: auto;
            /* Enable scrolling for long content */
            scrollbar-width: thin;
            /* Firefox */
            scrollbar-color: var(--primary-color) var(--dark-sidebar-bg);
            /* Firefox */
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
            width: 92%;
            /* Adjusted for inset active item */
            margin: 0 auto;
            /* Center the list group */
        }

        #sidebar-wrapper .list-group-item {
            padding: 0.75rem 1.25rem;
            background-color: var(--dark-sidebar-bg);
            color: var(--text-color-secondary);
            border: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
            /* Consistent border-radius for all items */
        }

        #sidebar-wrapper .list-group-item.active {
            background-color: var(--primary-color) !important;
            color: var(--text-color-light) !important;
            border-radius: 5px;
            margin: 0px;
            /* Inset effect */
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-color-light);
        }

        .sidebar-section-title {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-color-secondary) !important;
            padding: 10px 20px 5px;
            /* Adjust padding to align with links */
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
            min-width: 100vw;
            /* Takes full width initially */
            background-color: var(--dark-bg);
            transition: margin-left .25s ease-out;
            /* For push effect */
            padding-left: 0;
            /* Remove default padding */
        }

        /* Adjust content position when sidebar is open on mobile */
        #wrapper.toggled #page-content-wrapper {
            margin-left: 17rem;
            /* Pushes content to the right when sidebar is visible */
        }

        /* Top Navbar */
        .navbar-dark {
            background-color: var(--dark-bg) !important;
        }

        .bg-dark-secondary {
            background-color: var(--dark-navbar-bg) !important;
            /* Use same color as sidebar for consistency */
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

        .page-description {
            color: var(--light-text-color);
            font-size: 1rem;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .card {
            background-color: var(--secondary-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
        }

        .form-check {
            margin-bottom: 18px;
            padding-left: 0;
            /* Remove default padding for custom layout */
            display: flex;
            align-items: center;
        }

        .form-check-input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid var(--border-color);
            background-color: var(--input-bg);
            margin-right: 15px;
            cursor: pointer;
            outline: none;
            position: relative;
            transition: border-color 0.3s ease, background-color 0.3s ease;
            flex-shrink: 0;
            /* Prevent it from shrinking */
        }

        .form-check-input[type="radio"]:checked {
            border-color: var(--checkbox-checked);
            background-color: var(--checkbox-checked);
        }

        .form-check-input[type="radio"]:checked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
            transform: translate(-50%, -50%);
            animation: radioCheck 0.2s ease-out forwards;
        }

        @keyframes radioCheck {
            from {
                transform: translate(-50%, -50%) scale(0);
                opacity: 0;
            }

            to {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
        }

        .form-check-label {
            color: var(--text-color);
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            margin-bottom: 0;
            /* Remove default margin */
        }

        .form-check-label strong {
            font-weight: 500;
            margin-bottom: 3px;
        }

        .form-check-label span {
            color: var(--light-text-color);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: var(--light-text-color);
            font-size: 0.95rem;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--input-border);
            color: var(--text-color);
            padding: 12px 15px;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            height: auto;
            /* Override Bootstrap default height */
        }

        .form-control::placeholder {
            color: var(--light-text-color);
            opacity: 0.7;
        }

        .form-control:focus {
            background-color: var(--input-bg);
            /* Keep background consistent */
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            /* Bootstrap focus color */
            color: var(--text-color);
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .col {
            flex: 1;
        }

        .payment-options {
            margin-top: 30px;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
            margin-top: 25px;
        }

        .toggle-switch .form-check-input {
            width: 40px;
            height: 20px;
            border-radius: 20px;
            background-color: var(--input-border);
            border: none;
            position: relative;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 12px;
            flex-shrink: 0;
            -webkit-appearance: none;
            /* Hide default checkbox */
            -moz-appearance: none;
            appearance: none;
        }

        .toggle-switch .form-check-input:checked {
            background-color: var(--checkbox-checked);
        }

        .toggle-switch .form-check-input::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: white;
            transition: left 0.3s ease;
        }

        .toggle-switch .form-check-input:checked::after {
            left: calc(100% - 18px);
            /* 40px - 2px padding - 16px width = 22px from left. so 40-22=18 */
        }

        .toggle-switch label {
            font-size: 1rem;
            color: var(--text-color);
            margin-bottom: 0;
            cursor: pointer;
            line-height: 1.4;
        }

        .toggle-switch label span {
            display: block;
            font-size: 0.85rem;
            color: var(--light-text-color);
        }

        .action-buttons {
            display: flex;
            justify-content: flex-end;
            /* Align to the right */
            align-items: center;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid var(--border-color);
        }

        .btn-subscribe {
            /* Renamed to .btn-pay-now for clarity */
            background-color: var(--accent-color);
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }

        .btn-subscribe:hover {
            /* Renamed to .btn-pay-now:hover */
            background-color: #0056b3;
            /* Darker blue */
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
        }

        /* Payment Method Selection */
        .payment-method-selection .form-check {
            margin-bottom: 10px;
        }

        .payment-method-selection img {
            height: 24px;
            margin-left: 10px;
        }

        /* Hidden Payment Sections */
        .payment-section {
            display: none;
            margin-top: 20px;
            border-top: 1px dashed var(--border-color);
            padding-top: 20px;
        }

        .payment-section.active {
            display: block;
        }


        /* Responsive adjustments */
        @media (min-width: 992px) {
            #sidebar-wrapper {
                margin-left: 0;
                /* Sidebar visible on large screens */
                position: relative;
                /* Allow flow on desktop */
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
                margin-left: 0;
                /* Reset margin for desktop */
            }

            #sidebarToggle {
                display: none !important;
                /* Hamburger button hidden on desktop */
            }

            .page-title {
                font-size: 1.8rem;
            }

            .page-description {
                font-size: 0.9rem;
            }

            .form-row {
                flex-direction: row;
                /* Keep as row on desktop */
                gap: 20px;
            }

            .form-check-input[type="radio"] {
                margin-left: 0;
                /* Adjust as needed */
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
                /* Stack sidebar and content */
            }

            .navbar-collapse {
                display: none !important;
                /* Hide notification/user icons on very small screens */
            }


            #sidebar-wrapper {
                position: absolute;
                /* Allow flow on desktop */
            }


            .action-buttons {
                flex-direction: column;
                gap: 15px;
                justify-content: center;
                /* Center buttons on mobile */
            }

            .btn-subscribe {
                /* Renamed to .btn-pay-now */
                width: 100%;
                text-align: center;
            }

            /* Removed .btn-cancel on mobile too */
            /* .btn-cancel {
                margin-top: 10px;
            } */

            .form-check-input[type="radio"] {
                margin-left: 0;
                /* Adjust as needed */
            }
        }

        @media (max-width: 576px) {
            .sidebar-promo {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }

            .profile-photo-upload {
                flex-direction: column;
                align-items: center !important;
            }

            .profile-img-preview {
                margin-bottom: 20px;
                margin-right: 0 !important;
            }

            .upload-area {
                width: 100%;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .card-title {
                font-size: 1.1rem;
            }

            .form-check-label {
                font-size: 1rem;
            }

            .form-check-label span {
                font-size: 0.85rem;
            }

            .form-group label {
                font-size: 0.85rem;
            }

            .form-check-input[type="radio"] {
                margin-left: 0;
                /* Adjust as needed */
            }
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-dark sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading text-white p-3 border-bottom border-secondary d-flex align-items-center">
                <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Impact Web Logo"
                    style="max-height: 140px;">
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
                <a href="{{ route('paiement1') }}"
                    class="list-group-item list-group-item-action bg-dark text-white active">
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
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle" aria-label="Toggle sidebar"><i
                            class="fas fa-bars"></i></button>
                    <h2 class="text-white mb-0 ms-3">Paiement</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}"
                                    aria-label="Notifications"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center"
                                    href="{{ route('parametres') }}">
                                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('logo.png') }}"
                                        alt="Photo de profil" style="max-height: 50px;"
                                        class="rounded-circle profile-img-preview me-4">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid py-4 main-content">
                <div class="row">
                    <div class="col-md-8 col-lg-12 general-settings-form animation-fade-in" style="animation-delay: 0.2s;">
                        <h1 class="page-title">Finalisez votre paiement</h1>
                        <p class="page-description">
                            Sélectionnez votre formule d'abonnement et choisissez votre méthode de paiement préférée.
                        </p>
                        <div class="card payment-details-card">
                            <h2 class="card-title">Méthode de paiement</h2>

                            <div class="payment-method-selection mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="methodMomo" value="momo" checked>
                                    <label class="form-check-label" for="methodMomo">
                                        Paiement Mobile Money (Bénin)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="methodCard" value="card">
                                    <label class="form-check-label" for="methodCard">
                                        Carte de Crédit/Débit (International)
                                    </label>
                                </div>
                            </div>

                            <form id="paymentForm">
                                <div id="momoPaymentSection" class="payment-section active">
                                    <div class="form-group">
                                        <label for="momoOperator">Opérateur Mobile Money</label>
                                        <select class="form-control" id="momoOperator" required>
                                            <option value="">Sélectionner un opérateur</option>
                                            <option value="MTN_MoMo">MTN Mobile Money</option>
                                            <option value="Moov_MoMo">Moov Money</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="momoNumber">Numéro Mobile Money</label>
                                        <input type="tel" class="form-control" id="momoNumber" placeholder="Ex: 01xxxxxxxx" pattern="[0-9]{10}" title="Veuillez entrer un numéro de téléphone à 8 chiffres" required>
                                    </div>
                                    <p class="text-secondary small mt-3">
                                        Après avoir cliqué sur "Payer maintenant", une requête de paiement sera envoyée à votre téléphone.
                                        Veuillez confirmer le paiement sur votre appareil.
                                    </p>
                                </div>

                                <div id="cardPaymentSection" class="payment-section">
                                    <div class="form-group">
                                        <label for="nomSurCarte">Nom sur la carte</label>
                                        <input type="text" class="form-control" id="nomSurCarte" placeholder="Nom complet">
                                    </div>

                                    <div class="form-group">
                                        <label for="numeroCarte">Numéro de carte</label>
                                        <input type="text" class="form-control" id="numeroCarte" placeholder="XXXX XXXX XXXX XXXX" pattern="[0-9]{13,16}" title="Un numéro de carte valide contient 13 à 16 chiffres">
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="dateExpiration">Date d'expiration</label>
                                                <input type="text" class="form-control" id="dateExpiration" placeholder="MM / AA" pattern="(0[1-9]|1[0-2])\s?\/\s?([0-9]{2})" title="Format MM / AA (ex: 12 / 28)">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="codeSecurite">Code de sécurité (CVV)</label>
                                                <input type="text" class="form-control" id="codeSecurite" placeholder="XXX" pattern="[0-9]{3,4}" title="CVV à 3 ou 4 chiffres">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="adresseFacturation">Adresse de facturation</label>
                                        <input type="text" class="form-control" id="adresseFacturation" placeholder="Votre adresse">
                                    </div>

                                    <div class="form-group">
                                        <label for="ville">Ville</label>
                                        <input type="text" class="form-control" id="ville" placeholder="Votre ville">
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="codePostal">Code postal</label>
                                                <input type="text" class="form-control" id="codePostal" placeholder="Ex: 75001">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="pays">Pays</label>
                                                <select class="form-control" id="pays">
                                                    <option value="">Sélectionner un pays</option>
                                                    <option value="Benin" selected>Bénin</option>
                                                    <option value="France">France</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="USA">États-Unis</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="toggle-switch">
                                    <input class="form-check-input" type="checkbox" id="autoRenewalToggle" checked>
                                    <label for="autoRenewalToggle">
                                        Activer le renouvellement automatique
                                        <span>(vous recevrez une notification avant expiration)</span>
                                    </label>
                                </div>

                                <div class="action-buttons">
                                    <button type="submit" class="btn-subscribe">Payer maintenant</button>
                                </div>
                            </form>
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
        // Script de bascule de la barre latérale
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("sidebarToggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        // Définir 'Paiement' dans la barre latérale comme actif
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarLinks = document.querySelectorAll('#sidebar-wrapper .list-group-item');
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
            });
            // Correction ici: Utilisez la bonne sélecteur pour votre lien de paiement
            const paiementLink = document.querySelector('a[href*="paiement"]'); // Plus générique si l'URL est dynamique
            if (paiementLink) {
                paiementLink.classList.add('active');
            }

            // Logique de sélection du mode de paiement
            const momoRadio = document.getElementById('methodMomo');
            const cardRadio = document.getElementById('methodCard');
            const momoSection = document.getElementById('momoPaymentSection');
            const cardSection = document.getElementById('cardPaymentSection');
            const paymentForm = document.getElementById('paymentForm');

            function togglePaymentSections() {
                if (momoRadio.checked) {
                    momoSection.classList.add('active');
                    cardSection.classList.remove('active');
                    // Définir les attributs 'required' pour les champs MoMo
                    momoSection.querySelectorAll('input, select').forEach(input => input.setAttribute('required', ''));
                    cardSection.querySelectorAll('input, select').forEach(input => input.removeAttribute('required'));
                } else if (cardRadio.checked) {
                    momoSection.classList.remove('active');
                    cardSection.classList.add('active');
                    // Définir les attributs 'required' pour les champs de carte
                    cardSection.querySelectorAll('input, select').forEach(input => input.setAttribute('required', ''));
                    momoSection.querySelectorAll('input, select').forEach(input => input.removeAttribute('required'));
                }
            }

            // Ajouter les écouteurs d'événements
            momoRadio.addEventListener('change', togglePaymentSections);
            cardRadio.addEventListener('change', togglePaymentSections);

            // Bascule initiale basée sur l'état coché par défaut
            togglePaymentSections();

            // Exemple de soumission de formulaire (vous enverriez normalement ceci à un backend)
            paymentForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Empêcher la soumission par défaut du formulaire

                // Il n'y a pas de 'subscriptionPlan' dans le HTML fourni, donc cette ligne peut causer une erreur.
                // Assurez-vous d'avoir un élément radio group avec name="subscriptionPlan" si vous voulez l'utiliser.
                // Pour l'instant, je vais commenter ou modifier cette ligne pour éviter l'erreur.
                let selectedPlan = "Non spécifié"; // Valeur par défaut si aucun plan n'est sélectionné dans le formulaire actuel

                let paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                let autoRenewal = document.getElementById('autoRenewalToggle').checked;

                console.log('Plan sélectionné :', selectedPlan);
                console.log('Méthode de paiement :', paymentMethod);
                console.log('Renouvellement automatique :', autoRenewal);

                if (paymentMethod === 'momo') {
                    let momoOperator = document.getElementById('momoOperator').value;
                    let momoNumber = document.getElementById('momoNumber').value;
                    console.log('Opérateur MoMo :', momoOperator);
                    console.log('Numéro MoMo :', momoNumber);
                    alert(Paiement MoMo via ${momoOperator} pour ${selectedPlan} en cours. Veuillez confirmer sur votre téléphone.);
                    // Ici, vous intégreriez avec une passerelle de paiement MoMo
                } else if (paymentMethod === 'card') {
                    let cardName = document.getElementById('nomSurCarte').value;
                    let cardNumber = document.getElementById('numeroCarte').value;
                    let expiryDate = document.getElementById('dateExpiration').value;
                    let cvv = document.getElementById('codeSecurite').value;
                    let billingAddress = document.getElementById('adresseFacturation').value;
                    let city = document.getElementById('ville').value;
                    let postalCode = document.getElementById('codePostal').value;
                    let country = document.getElementById('pays').value;

                    console.log('Nom sur la carte :', cardName);
                    console.log('Numéro de carte :', cardNumber);
                    console.log('Date d\'expiration :', expiryDate);
                    console.log('CVV :', cvv);
                    console.log('Adresse de facturation :', billingAddress);
                    console.log('Ville :', city);
                    console.log('Code postal :', postalCode);
                    console.log('Pays :', country);
                    alert(Paiement par carte pour ${selectedPlan} en cours.);
                    // Ici, vous intégreriez avec une passerelle de paiement internationale (par ex. Stripe, PayPal)
                }
                
            });
        });
    </script>
</body>

</html>