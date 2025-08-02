<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Mon emploi du temps') }} - Impact Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #FF0000;
            --secondary-color: #6c757d;
            --dark-bg: #1A1A1A;
            --dark-card-bg: #2C2C2C;
            --dark-sidebar-bg: #212121;
            --border-color: #3A3A3A;
            --text-color-light: #F8F9FA;
            --text-color-secondary: #B0B0B0;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --event-success: #28a745;
            --event-danger: #dc3545;
            --event-primary: #0d6efd;
            --event-info: #0dcaf0;
            --stars-gold: gold;
        }

        body {
            overflow-x: hidden;
            background-color: var(--dark-bg);
            color: var(--text-color-light);
            font-family: 'Poppins', sans-serif;
        }

        #wrapper {
            display: flex;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -16rem;
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

        .main-content {
            padding: 1.5rem !important;
        }

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

        .schedule-grid {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .schedule-header {
            background-color: var(--dark-card-bg);
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
            min-height: 80px;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.05);
        }

        .schedule-body .schedule-row:last-child {
            border-bottom: none;
        }

        .schedule-body .time-col {
            padding-top: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-color-secondary);
            min-width: 70px;
            display: flex;
            align-items: flex-start;
            justify-content: flex-end;
        }

        .schedule-body .col {
            position: relative;
            border-left: 1px dashed rgba(255, 255, 255, 0.05);
            padding: 0.5rem;
        }

        .schedule-body .col:first-child {
            border-left: none;
        }

        .event {
            position: absolute;
            width: calc(100% - 1rem); /* Prend toute la largeur de la cellule */
            left: 0.5rem;
            padding: 0.5rem !important;
            font-size: 0.9rem;
            line-height: 1.3;
            overflow: hidden;
            z-index: 1;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            animation: fadeInScale 0.5s ease-out forwards;
            transform: scale(0.9);
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

        .calendar-grid .calendar-header .col {
            font-size: 0.5rem;
            font-weight: bold;
        }

        .calendar-grid .calendar-header .col,
        .calendar-grid .calendar-body .col {
            padding: 0.3rem 0.6rem; /* Ajuste le padding pour un meilleur espacement */
            font-size: 0.5rem;
        }

        .calendar-grid .calendar-body .calendar-day {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 35px; /* Définit une hauteur fixe pour les cellules */
            border-radius: 5px; /* Arrondi les coins */
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, border-radius 0.2s ease-in-out;
        }

        .calendar-grid .calendar-body .calendar-day:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .calendar-grid .calendar-body .calendar-day.active {
            background-color: var(--primary-color) !important;
            font-weight: bold;
            color: var(--text-color-light) !important;
        }

        .calendar-grid .calendar-body .calendar-day.text-secondary {
            color: var(--text-color-secondary) !important;
        }

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
            box-shadow: 0 8px 20px rgba(247, 92, 78, 0.3);
            background-color: #e04a40 !important;
            border-color: #e04a40 !important;
        }

        .animate-pulse {
            animation: pulse 1s infinite alternate;
        }

        @keyframes pulse {
            from {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(247, 92, 78, 0.4);
            }
            to {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(247, 92, 78, 0);
            }
        }

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
        }

        @media (max-width: 991.98px) {
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }
            #page-content-wrapper {
                width: 100%;
            }
            .schedule-grid {
                overflow-x: auto;
            }
            .schedule-header, .schedule-body {
                min-width: 700px;
            }
            .time-col {
                min-width: 60px;
            }
        }

        @media (max-width: 767.98px) {
            .navbar .d-lg-block {
                display: none !important;
            }
        }
    </style>
</head>
<body class="theme-dark">
    <div class="d-flex" id="wrapper">
        <div class="bg-dark sidebar" id="sidebar-wrapper">
            <div class="sidebar-heading text-white p-3 border-bottom border-secondary d-flex align-items-center">
                <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Impact Web Logo" style="max-height: 140px;">
            </div>
            <div class="list-group list-group-flush">
                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">{{ __('GENERAL') }}</div>
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-action bg-dark text-white">
                    <i class="fas fa-home me-2"></i> {{ __('Tableau de bord') }}
                </a>
                <a href="{{ route('calendrier') }}" class="list-group-item list-group-action bg-dark text-white active">
                    <i class="fas fa-calendar-alt me-2"></i> {{ __('Calendrier') }}
                </a>
                <a href="{{ route('paiement1') }}" class="list-group-item list-group-action bg-dark text-white">
                    <i class="fas fa-credit-card me-2"></i> {{ __('Paiement') }}
                </a>
                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">{{ __('COURS') }}</div>
                <a href="{{ route('cours') }}" class="list-group-item list-group-action bg-dark text-white">
                    <i class="fas fa-book me-2"></i> {{ __('Mes cours') }}
                </a>
                <a href="{{ route('decouvrir') }}" class="list-group-item list-group-action bg-dark text-white">
                    <i class="fas fa-search me-2"></i> {{ __('Découvrir') }}
                </a>
                <div class="sidebar-section-title text-secondary px-3 pt-3 pb-1">{{ __('OTHER') }}</div>
                <a href="{{ route('soutien') }}" class="list-group-item list-group-action bg-dark text-white">
                    <i class="fas fa-question-circle me-2"></i> {{ __('Soutien') }}
                </a>
                <a href="{{ route('parametres') }}" class="list-group-item list-group-action bg-dark text-white">
                    <i class="fas fa-cog me-2"></i> {{ __('Paramètre') }}
                </a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark-secondary border-bottom border-secondary py-3">
                <div class="container-fluid">
                    <button class="btn btn-danger d-lg-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                    <h2 class="text-white mb-0 ms-3">{{ __('Mon emploi du temps') }}</h2>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0 align-items-center">
                            <li class="nav-item me-3">
                                <a class="nav-link text-white" href="{{ route('notifications') }}"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white d-flex align-items-center " href="{{ route('parametres') }}">
                                    <img src="{{ asset(Auth::user()->image && Auth::user()->image !== 'photos/default.svg' ? 'storage/' . Auth::user()->image . '?v=' . time() : 'dossiers/image/default.png') }}"
                                     alt="Photo de profil" class="rounded-circle" style="max-height: 40px;">
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
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ route('calendrier', ['date' => $startOfWeek->clone()->subWeek()->toDateString()]) }}" class="btn btn-dark-card text-white">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <h5 class="text-white mb-0 text-center">
                                    {{ $startOfWeek->isoFormat('D MMMM YYYY') }} - {{ $endOfWeek->isoFormat('D MMMM YYYY') }}
                                </h5>
                                <a href="{{ route('calendrier', ['date' => $startOfWeek->clone()->addWeek()->toDateString()]) }}" class="btn btn-dark-card text-white">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>

                        <div class="schedule-grid bg-dark-card">
                            <div class="schedule-header row gx-0">
                                <div class="col-1 time-col text-white text-end pe-3">{{ __('Time') }}</div>
                                @for ($i = 0; $i < 7; $i++)
                                    @php
                                        $day = $startOfWeek->clone()->addDays($i);
                                    @endphp
                                    <div class="col text-center text-white {{ $day->isToday() ? 'text-danger' : '' }}">
                                        <div class="day-num">{{ $day->format('j') }}</div>
                                        <div class="day-name">{{ $day->isoFormat('ddd') }}</div>
                                    </div>
                                @endfor
                            </div>
                            <div class="schedule-body">
                                @for ($hour = 8; $hour <= 17; $hour++)
                                    <div class="schedule-row row gx-0">
                                        <div class="col-1 time-col text-secondary text-end pe-3">{{ sprintf('%02d:00', $hour) }}</div>
                                        @for ($i = 0; $i < 7; $i++)
                                            <div class="col">
                                                @php
                                                    $day = $startOfWeek->clone()->addDays($i);
                                                    $event = $events->first(function ($event) use ($day, $hour) {
                                                        return $event->start_time->isSameDay($day) && $event->start_time->hour == $hour;
                                                    });
                                                @endphp
                                                @if($event)
                                                    <div class="event text-white p-2 rounded-3" style="background-color: {{ $event->color }};">
                                                        <p class="mb-1 fw-bold">{{ $event->title }}</p>
                                                        <p class="mb-1 text-sm">{{ $event->description }}</p>
                                                        <p class="mb-0 text-xs text-secondary">{{ $event->start_time->format('H:i') }} - {{ $event->end_time->format('H:i') }}</p>
                                                        <button class="btn btn-sm btn-icon-custom-sm position-absolute top-0 end-0 mt-1 me-1"><i class="fas fa-ellipsis-h"></i></button>
                                                    </div>
                                                @endif
                                            </div>
                                        @endfor
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <button class="btn btn-primary w-100 p-3 mb-4 rounded-lg shadow-sm animate-button" data-bs-toggle="modal" data-bs-target="#addEventModal">
                            <i class="fas fa-plus-circle me-2"></i> {{ __('Ajouter un nouvel événement') }}
                        </button>

                        <div class="card bg-dark-card p-3 mb-4 rounded-lg shadow-sm calendar-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="#" class="text-white text-decoration-none"><i class="fas fa-chevron-left"></i></a>
                                <h6 class="text-white mb-0 fw-bold">{{ $startOfWeek->isoFormat('MMMM YYYY') }}</h6>
                                <a href="#" class="text-white text-decoration-none"><i class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="calendar-grid text-white">
                                <div class="calendar-header row gx-0 text-secondary mb-2">
                                    <div class="col text-center">{{ __('Mo') }}</div>
                                    <div class="col text-center">{{ __('Tu') }}</div>
                                    <div class="col text-center">{{ __('We') }}</div>
                                    <div class="col text-center">{{ __('Th') }}</div>
                                    <div class="col text-center">{{ __('Fr') }}</div>
                                    <div class="col text-center">{{ __('Sa') }}</div>
                                    <div class="col text-center">{{ __('Su') }}</div>
                                    
                                </div>
                                <div class="calendar-body row gx-0">
                                    <div class="calendar-body row gx-0">
                                        @php
                                            // Calcule le début du mois de la semaine affichée
                                            $startOfMonth = $startOfWeek->clone()->startOfMonth();
                                            // Calcule le nombre de jours à afficher avant le début du mois
                                            $startDayOfWeek = $startOfMonth->dayOfWeekIso - 1; // ISO 8601, Lundi = 1
                                            
                                            // Calcule le nombre total de cellules (jours) à afficher
                                            $totalDays = $startOfMonth->daysInMonth + $startDayOfWeek;
                                            $totalCells = ceil($totalDays / 7) * 8;
                                            
                                            $currentDay = $startOfMonth->clone()->subDays($startDayOfWeek);
                                        @endphp

                                        @for ($i = 0; $i < $totalCells; $i++)
                                            @php
                                                $isSameMonth = $currentDay->isSameMonth($startOfMonth);
                                                $isActive = $currentDay->isSameDay($startOfWeek);
                                                $dayClass = $isSameMonth ? '' : 'text-secondary';
                                                $activeClass = $isActive ? 'highlight active' : '';
                                            @endphp
                                            <div class="col text-center calendar-day {{ $dayClass }} {{ $activeClass }}">
                                                {{ $currentDay->format('j') }}
                                            </div>
                                            @php
                                                $currentDay->addDay();
                                            @endphp
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-dark-card p-3 rounded-lg shadow-sm category-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-white mb-0">{{ __('Liste des catégories') }}</h6>
                                <button class="btn btn-sm btn-danger rounded-circle animate-pulse"><i class="fas fa-plus"></i></button>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($formations as $formation)
                                    <li class="list-group-item bg-transparent text-white d-flex justify-content-between align-items-center px-0">
                                        <div class="d-flex align-items-center">
                                            <span class="category-dot me-2" style="background-color: #{{ substr(md5($formation->id), 0, 6) }};"></span> {{ $formation->title }}
                                        </div>
                                        <span class="badge bg-secondary rounded-pill">{{ $formation->events->count() }}</span>
                                    </li>
                                @endforeach
                            </ul>
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