<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Admin - Impact Web 360</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .sidebar {
      height: 100vh;
      background: #212529;
      color: white;
      padding-top: 2rem;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 10px 20px;
      transition: background 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background: #343a40;
      border-left: 3px solid #dc3545;
    }

    .content {
      padding: 2rem;
    }

    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .table th {
      background: #f1f1f1;
    }

    .image-wrapper {
      height: 200px;
      overflow: hidden;
    }

    .image-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Rend l'image bien cadrée sans déformation */
    }

    .card {
      display: flex;
      flex-direction: column;
      height: 100%;
    }
  </style>
  <style>
    :root {
      --primary-red: #DC3545;
      /* Bootstrap danger red */
      --background-app: #181818;
      /* Main app background */
      --background-card: #282828;
      /* Card-like elements background */
      --background-dark: #000;
      /* Darkest background for top bar/borders */
      --text-light: #f8f9fa;
      /* White text */
      --text-muted: #adb5bd;
      /* Gray text for secondary info */
      --border-color: #333;
      /* Darker border for separation */
    }

    /* Browser Window Mockup */
    .main-container {
      background-color: var(--background-dark);
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
      margin: 20px auto;
      /* Center the whole app window */
      max-width: 1400px;
      /* Max width for desktop view */
      height: calc(100vh - 40px);
      /* Adjust height for margin */
      display: flex;
      flex-direction: column;
    }

    /* Top Navigation Bar Mockup (desktop only) */
    .top-nav-mock {
      background-color: var(--background-dark);
      border-bottom: 1px solid var(--border-color);
      color: var(--text-muted);
      font-size: 0.9rem;
      height: 50px;
      /* Fixed height */
    }

    .search-bar-mock {
      background-color: var(--background-card);
      border-radius: 20px;
      padding: 5px 15px;
      min-width: 300px;
    }

    .top-nav-icons i {
      cursor: pointer;
      transition: color 0.2s ease;
    }

    .top-nav-icons i:hover {
      color: var(--primary-red);
    }

    /* Main App Layout */
    .app-layout {
      display: flex;
      flex-grow: 1;
      background-color: var(--background-app);
    }


    /* Main Content Area */
    .main-content {
      flex-grow: 1;
      overflow-y: auto;
      /* Scrollable content */
      padding: 2rem !important;
      /* Global padding for content */
    }

    /* Event Detail Window (the actual pop-up content) */
    .event-detail-window {
      background-color: var(--background-app);
      /* Use main app background */
      border-radius: 10px;

    }

    /* Header actions (New Event, Feed, Shuffle) */
    .header-actions .btn {
      color: var(--text-muted) !important;
      border-color: transparent !important;
      font-size: 0.9rem;
      padding: 8px 12px;
      border-radius: 20px;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .header-actions .btn:hover {
      background-color: var(--background-card);
      color: var(--text-light) !important;
    }

    /* Featured Event Banner */
    .featured-event-banner {
      background-color: var(--background-card);
      position: relative;
      overflow: hidden;
      /* For image overflow */
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .featured-event-banner h2 {
      font-weight: bold;
      font-size: 2.2rem;
      line-height: 1.2;
    }

    .featured-event-banner .description-text {
      font-size: 0.95rem;
      line-height: 1.6;
    }

    .featured-event-banner .event-meta span {
      font-size: 0.9rem;
    }

    .event-banner-img {
      border: 3px solid rgba(220, 53, 69, 0.7);
      /* Red border around image */
      box-shadow: 0 0 10px rgba(220, 53, 69, 0.3);
      object-fit: cover;
      width: 100%;
      height: 180px;
      /* Fixed height for consistency */
    }

    /* Section Blocks (Speakers, Sponsors) */
    .section-block {
      margin-bottom: 2rem;
    }

    .section-block h4 {
      font-weight: bold;
      font-size: 1.4rem;
    }

    /* Speaker Card */
    .speaker-card {
      background-color: var(--background-card);
      border: none;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      padding: 10px;
    }

    .speaker-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      background-color: rgba(220, 53, 69, 0.1);
      /* Subtle red tint on hover */
    }

    .speaker-card img {
      border: 2px solid var(--primary-red);
      width: 90px;
      /* Adjusted size */
      height: 90px;
      object-fit: cover;
    }

    /* Sponsor Card */
    .sponsor-card {
      background-color: var(--background-card);
      border: none;
      cursor: pointer;
      transition: background-color 0.2s ease, box-shadow 0.2s ease;
    }

    .sponsor-card:hover {
      background-color: rgba(220, 53, 69, 0.1);
      /* Subtle red tint on hover */
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .sponsor-logo {
      width: 50px;
      height: 50px;
      object-fit: contain;
      background-color: #fff;
      /* White background for logos */
      padding: 3px;
      border: 1px solid rgba(220, 53, 69, 0.5);
    }

    /* Right Sidebar (Now Playing / Related) */
    .right-sidebar {
      background-color: var(--background-card);
      border: none;
    }

    .song-item {
      padding: 10px 0;
      border-bottom: 1px solid var(--border-color);
      transition: background-color 0.2s ease;
      cursor: pointer;
    }

    .song-item:last-child {
      border-bottom: none;
    }

    .song-item:hover {
      background-color: rgba(255, 255, 255, 0.05);
    }

    .song-item img {
      object-fit: cover;
      width: 60px;
      height: 60px;
    }

    .song-item .fa-play-circle,
    .song-item .fa-shopping-cart {
      color: var(--text-muted);
      /* Default color for icons */
      transition: color 0.2s ease;
    }

    .song-item:hover .fa-play-circle {
      color: var(--primary-red) !important;
      /* Red on hover */
    }

    .song-item:hover .fa-shopping-cart {
      color: var(--text-light) !important;
      /* White on hover for cart */
    }

    /* General Styling */
    a {
      text-decoration: none;
    }

    .text-white-50 {
      color: rgba(255, 255, 255, 0.7) !important;
    }

    /* Responsive Adjustments */
    @media (min-width: 992px) {

      /* Large screens and up */
      .app-layout {
        height: calc(100% - 50px);
        /* Adjust for top nav bar */
      }
    }

    @media (max-width: 991.98px) {

      /* Medium and small screens */
      .main-container {
        margin: 0;
        border-radius: 0;
        height: 100vh;
        /* Full viewport height */
        box-shadow: none;
      }

      .main-content {
        padding: 1rem !important;
        /* Reduced padding for mobile */
      }

      .featured-event-banner h2 {
        font-size: 1.8rem;
        /* Smaller title on mobile */
      }

      .featured-event-banner .event-meta span {
        width: 100%;
        /* Stack info on small screens */
      }

      .header-actions {
        display: none !important;
        /* Hide secondary actions on small screens */
      }

      .event-banner-img {
        height: 150px;
        /* Smaller image on mobile */
      }
    }

    /* Extra Small screens (e.g., phones in portrait) */
    @media (max-width: 575.98px) {
      .speaker-card img {
        width: 70px;
        height: 70px;
      }

      .featured-event-banner h2 {
        font-size: 1.5rem;
      }

      .featured-event-banner .description-text {
        font-size: 0.85rem;
      }
    }

    .custom-modal {
      position: fixed;
      top: 0;
      left: 0;
      z-index: 2000;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.75);
      display: none;
      /* cachée par défaut */
      justify-content: center;
      align-items: center;
      padding: 20px;
      overflow-y: auto;
    }

    .custom-modal-content {
      width: 100%;
      max-width: 1440px;
      background-color: transparent;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">

      <nav id="sidebar" aria-label="Sidebar Navigation" class="col-md-3 col-lg-2 d-md-block sidebar">
        <h4><i class="fa fa-cogs me-2 mb-3"></i>Admin Panel</h4>
        <a href="#stats"><i class="fas fa-chart-bar"></i> Statistiques</a>
        <a href="{{ route('evenements.index') }}" class="nav-link nav-link active"><i class="fa fa-calendar-alt"></i>Événements</a>
        <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i>Sponsors</a>
        <a href="{{ route('articles.index') }}" class="nav-link"><i class="fa fa-store"></i>Boutique</a>
        <a href="{{ route('emploies.index') }}" class="nav-link"><i class="fa fa-briefcase"></i>Emplois</a>
        <a href="{{ route('intervenants.index') }}" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
        <a href="#users" class="nav-link"><i class="fas fa-users"></i> Utilisateurs</a>
        <a href="#content" class="nav-link"><i class="fas fa-folder-open"></i> Contenus</a>
        <a href="#messages" class="nav-link"><i class="fas fa-envelope"></i> Messages</a>
        <a href="#calendar" class="nav-link"><i class="fas fa-calendar-alt"></i> Calendrier</a>
        <a href="#logs" class="nav-link"><i class="fas fa-history"></i> Historique</a>
        <a href="#settings" class="nav-link"><i class="fas fa-cogs"></i> Paramètres</a>
        <a href="index.php" class="nav-link"><i class="fa fa-arrow-left"></i>Deconnexion</a>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 content">
        <h2 id="evenements">📅 Gestion des événements</h2>
        <div class="card mb-4">
          <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addEvenementModal">
            <i class="fa fa-plus"></i> Ajouter un événement
          </button>

          <div class="row">
            @foreach ($evenements as $evenement)
            <div class="col-md-6 col-lg-4 mb-4 d-flex">
              <div class="card w-100 d-flex flex-column justify-content-between bg-light shadow">

                <div class="image-wrapper">
                  <img src="{{ asset('storage/' . $evenement->image) }}" class="card-img-top" alt="Affiche de l'évènement" style="height: 200px; object-fit: cover;">
                </div>

                <div class="card-body d-flex flex-column">
                  <h5 class="card-title mb-3">{{ $evenement->nom }}</h5>
                  <h6>{{ $evenement->promoteur }}</h6>

                  <div class="mt-auto">
                    <div class="mb-2">
                      <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editEventModal{{ $evenement->id }}">
                        <i class="fas fa-edit"></i>
                      </button>

                      <form method="POST" action="{{ route('evenements.destroy', $evenement->id) }}" onsubmit="return confirm('Confirmer la suppression ?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm me-4">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                      <a href="#" class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#eventModal{{ $evenement->id }}">Informations</a>
                    </div>

                    <a href="{{ route('sponsors.index') }}" class="btn btn-dark text-white fs-6 fw-bold w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addSponsorModal">Ajouter un sponsor</a>
                    <a href="{{ route('sponsors.index') }}" class="btn btn-dark text-white fs-6 fw-bold w-100" data-bs-toggle="modal" data-bs-target="#addIntervenantModal">Ajouter un intervenant</a>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
          </div>


        </div>
    </div>


    <!-- Modale personnalisée -->
    @foreach($evenements as $evenement)

    <!-- Modal pour chaque événement -->
    <div class="modal fade" id="eventModal{{ $evenement->id }}" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-white">
          <div class="modal-header">
            <h5 class="modal-title">{{ $evenement->nom }}</h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p>{{ $evenement->description }}</p>
            <p><i class="fas fa-map-marker-alt"></i> {{ $evenement->lieu }}</p>
            <p><i class="fas fa-calendar-alt"></i> {{ $evenement->date_debut }}</p>

            <h6 class="mt-4">Intervenants :</h6>
            <div class="row">
              @if($evenement->intervenants && $evenement->intervenants->count())
              @foreach($evenement->intervenants as $intervenant)
              <div class="col-md-4">
                <div class="card bg-secondary text-white mb-2">
                  <img src="{{ asset('storage/'.$intervenant->photo) }}" class="card-img-top" alt="{{ $intervenant->nom }}">
                  <div class="card-body">
                    <h6>{{ $intervenant->nom }}</h6>
                    <small>{{ $intervenant->fonction }}</small>
                  </div>
                </div>
              </div>
              @endforeach
              @else
              <p class="text-white-50">Aucun intervenant enregistré</p>
              @endif
            </div>

            <h6 class="mt-4">Sponsors :</h6>
            <div class="row">
              @if($evenement->sponsors && $evenement->sponsors->count())
              @foreach($evenement->sponsors as $sponsor)
              <div class="col-md-6">
                <div class="card bg-secondary text-white mb-2 d-flex flex-row align-items-center">
                  <img src="{{ asset('storage/'.$sponsor->logo) }}" width="60" class="m-2">
                  <div>
                    <h6>{{ $sponsor->nom }}</h6>
                    <small>{{ $sponsor->type }}</small>
                  </div>
                </div>
              </div>
              @endforeach
              @else
              <p class="text-white-50">Aucun sponsor enregistré</p>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach



    <!-- Modals de modification -->
    @foreach ($evenements as $evenement)
    <div class="modal fade" id="editEventModal{{ $evenement->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form method="POST" action="{{ route('evenements.update', $evenement->id) }}" enctype="multipart/form-data" class="modal-content">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $evenement->id }}">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Modifier l'événement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Nom de l'évènement</label>
              <input name="nom" class="form-control" value="{{ $evenement->nom }}" required>
            </div>
            <div class="mb-3">
              <label>Thème</label>
              <input name="theme" class="form-control" value="{{ $evenement->theme }}" required>
            </div>
            <div class="mb-3">
              <label>Promoteur</label>
              <input name="promoteur" class="form-control" value="{{ $evenement->promoteur }}" required>
            </div>
            <div class="mb-3">
              <label>Description</label>
              <textarea name="description" class="form-control" required>{{ $evenement->description }}</textarea>
            </div>
            <div class="mb-3">
              <label>Date de début</label>
              <input type="date" name="date_debut" class="form-control" value="{{ $evenement->date_debut }}" required>
            </div>
            <div class="mb-3">
              <label>Date de fin</label>
              <input type="date" name="date_fin" class="form-control" value="{{ $evenement->date_fin }}" required>
            </div>
            <div class="mb-3">
              <label>Heure</label>
              <input type="time" name="heure" class="form-control" value="{{ $evenement->heure }}" required>
            </div>
            <div class="mb-3">
              <label>Lieu</label>
              <input name="lieu" class="form-control" value="{{ $evenement->lieu }}" required>
            </div>
            <div class="mb-3">
              <label>Nombre de places</label>
              <input type="number" name="nb_places" class="form-control" value="{{ $evenement->nb_places }}" required>
            </div>
            <div class="mb-3">
              <label>Image</label>
              <input type="file" name="image" class="form-control">
              @if($evenement->image)
              <small class="text-muted mt-3">
                Image actuelle :
                <img src="{{ asset('storage/' . $evenement->image) }}" class="img-fluid mt-3" style="max-height: 60px;">
              </small>
              @endif
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
    @endforeach

    </main>
  </div>
  </div>


  <!-- Modal Ajouter Événement -->
  <div class="modal fade" id="addEvenementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable ">
      <form method="POST" action="{{ route('evenements.store') }}" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="addEvenementLabel">Ajouter un événement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'événement</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>

          <div class="mb-3">
            <label for="promoteur" class="form-label">Promoteur</label>
            <input type="text" class="form-control" id="promoteur" name="promoteur" required>
          </div>

          <div class="mb-3">
            <label for="theme" class="form-label">Thème</label>
            <input type="text" class="form-control" id="theme" name="theme" required>
          </div>

          <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" class="form-control" id="lieu" name="lieu">
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="date_debut" class="form-label">Date de début</label>
              <input type="date" class="form-control" id="date_debut" name="date_debut" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="date_fin" class="form-label">Date de fin</label>
              <input type="date" class="form-control" id="date_fin" name="date_fin">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="heure" class="form-label">Heure</label>
              <input type="time" class="form-control" id="heure" name="heure" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="nb_places" class="form-label">Nombre de places</label>
              <input type="number" class="form-control" id="nb_places" name="nb_places" min="0">
            </div>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image </label>
            <input type="file" class="form-control" id="image" name="image" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Ajouter sponsor -->
  <div class="modal fade" id="addSponsorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable ">
      <form method="POST" action="{{ route('sponsors.store') }}" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="addsponsorLabel">Ajouter un sponsor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="nom" class="form-label">{{ $evenement->nom }}</label>
            <input type="hidden" class="form-control" name="evenement_id" value="{{ $evenement->id }}">
          </div>

          <div class="modal-body">
            <div class="mb-3">
              <label for="nom" class="form-label">Nom du sponsor</label>
              <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="mb-3">
              <label for="promoteur" class="form-label">Promoteur</label>
              <input type="text" class="form-control" id="promoteur" name="promoteur" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
              <label for="logo" class="form-label">Logo </label>
              <input type="file" class="form-control" id="logo" name="logo" required>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-danger">Enregistrer</button>
          </div>
      </form>
    </div>
  </div>

  <!-- Modal Ajouter intervenant -->
  <div class="modal fade" id="addIntervenantModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <form method="POST" action="{{ route('intervenants.store') }}" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Ajouter un intervenant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" rows="3" placeholder="Expert en IA" required>
          </div>

          <div class="mb-3">
            <label for="biographie" class="form-label">Biographie</label>
            <textarea class="form-control" id="biographie" name="biographie" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="theme" class="form-label">Thème abordé</label>
            <input type="text" class="form-control" id="theme" name="theme">
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Réseaux sociaux</label>
            <div id="reseaux-container">
              <div class="d-flex mb-2">
                <input type="text" name="whatsapp" class="form-control me-2" placeholder="Lien WhatsApp">
                <input type="text" name="facebook" class="form-control me-2" placeholder="Lien Facebook">
                <input type="text" name="instagram" class="form-control me-2" placeholder="Lien Instagram">
              </div>
              <div class="d-flex mb-2">
                <input type="text" name="tiktok" class="form-control me-2" placeholder="Lien TikTok">
                <input type="text" name="linkedln" class="form-control me-2" placeholder="Lien LinkedIn">
                <input type="text" name="snapchat" class="form-control me-2" placeholder="Lien Snapchat">
              </div>
              <div class="mb-2">
                <input type="text" name="x" class="form-control" placeholder="Lien X (Twitter)">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Enregistrer</button>
              </div>
            </div>
          </div>

        </div>

      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const openSidebarBtn = document.getElementById('openSidebar');
      const closeSidebarBtn = document.getElementById('closeSidebar');
      const sidebar = document.querySelector('.sidebar-left');

      if (openSidebarBtn) {
        openSidebarBtn.addEventListener('click', function() {
          sidebar.classList.add('show');
        });
      }

      if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', function() {
          sidebar.classList.remove('show');
        });
      }

      // Optional: Close sidebar when clicking outside on mobile
      document.addEventListener('click', function(event) {
        if (sidebar.classList.contains('show') && !sidebar.contains(event.target) && !openSidebarBtn.contains(event.target)) {
          sidebar.classList.remove('show');
        }
      });

      // Add simple hover effects (handled mostly by CSS, but can extend with JS for complex animations)
      const cards = document.querySelectorAll('.speaker-card, .sponsor-card, .song-item');

      cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          // Can add more complex JS animations here if needed
          // e.g., gsap.to(this, { duration: 0.2, y: -5, ease: "power1.out" });
        });
        card.addEventListener('mouseleave', function() {
          // e.g., gsap.to(this, { duration: 0.2, y: 0, ease: "power1.out" });
        });

        card.addEventListener('click', function() {
          // Simulate a click effect
          this.classList.add('clicked-effect');
          setTimeout(() => {
            this.classList.remove('clicked-effect');
          }, 200);

          // In a real app, you'd navigate or open a modal
          console.log('Item clicked:', this);
        });
      });

      // Add CSS class for click animation (define this in style.css)
      const styleSheet = document.styleSheets[0];
      const clickKeyframes = `
                @keyframes clickedEffect {
                    0% { transform: scale(1); }
                    50% { transform: scale(0.98); }
                    100% { transform: scale(1); }
                }
            `;
      styleSheet.insertRule(clickKeyframes, styleSheet.cssRules.length);

      const clickedEffectRule = `
                .clicked-effect {
                    animation: clickedEffect 0.2s ease-out;
                }
            `;
      styleSheet.insertRule(clickedEffectRule, styleSheet.cssRules.length);
    });

    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('eventModal');
      const openModalBtn = document.getElementById('openModalBtn');

      openModalBtn.addEventListener('click', function() {
        modal.style.display = 'flex';
      });
      const closeModalBtn = document.getElementById('closeModalBtn');
      closeModalBtn.addEventListener('click', function() {
        modal.style.display = 'none';
      });
    });
  </script>
</body>

</html>