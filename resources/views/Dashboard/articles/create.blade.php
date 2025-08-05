<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Admin - Ajouter un Article</title>
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

      <nav id="sidebar" aria-label="Sidebar Navigation">
        <h4><i class="fa fa-cogs me-2"></i>Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="nav-link active"><i class="fas fa-chart-bar"></i> Statistiques</a>
        <a href="{{ route('evenements.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i>Événements</a>
        <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i>Sponsors</a>
        <a href="{{ route('replay.index')}}" class="nav-link"><i class="fa-solid fa-play"></i> Replay
        <a href="{{ route('categories.index')}}" class="nav-link"><i class="fas fa-layer-group"></i>Catégorie</a>
        <a href="{{ route('formations.index')}}" class="nav-link"><i class="fas fa-graduation-cap"></i>Formation</a>
        <a href="{{ route('modules.index')}}" class="nav-link"><i class="fas fa-puzzle-piece"></i>Modules</a>
        <a href="{{ route('articles.index')}}" class="nav-link"><i class="fa fa-shopping-basket"></i>Articles</a>
        <a href="{{ route('emploies.index')}}" class="nav-link"><i class="fa fa-briefcase"></i>Emplois</a>
        <a href="ajouter_intervenant.php" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
        <a href="{{ route('billet')}}" class="nav-link"><i class="fas fa-calendar-alt "></i> Tickets</a>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
          @csrf
          <a href="{{ route('logout')}}" class="nav-link"><i class="fa fa-arrow-left"></i>Deconnexion</a>
        </form>
        
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 content">
        <h2 id="articles">🛍️ Ajouter un nouvel article</h2>
        
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="card mb-4">
          <div class="card-header">
            <h5>Formulaire d'ajout d'article</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
              @csrf
              
              <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'article</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
              </div>

              <div class="mb-3">
                <label for="prix" class="form-label">Prix (FCFA)</label>
                <input type="number" class="form-control" id="prix" name="prix" min="0" step="1" value="{{ old('prix') }}" required>
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                  <option value="">-- Sélectionner un type --</option>
                  <option value="T-shirt" {{ old('type') == 'T-shirt' ? 'selected' : '' }}>T-shirt</option>
                  <option value="Hoodie" {{ old('type') == 'Hoodie' ? 'selected' : '' }}>Hoodie</option>
                  <option value="Jeans" {{ old('type') == 'Jeans' ? 'selected' : '' }}>Jeans</option>
                  <option value="Short" {{ old('type') == 'Short' ? 'selected' : '' }}>Short</option>
                  <option value="Shirt" {{ old('type') == 'Shirt' ? 'selected' : '' }}>Shirt</option>
                  <option value="Accessoires" {{ old('type') == 'Accessoires' ? 'selected' : '' }}>Accessoires</option>
                  <option value="Autre" {{ old('type') == 'Autre' ? 'selected' : '' }}>Autre</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="couleur" class="form-label">Couleur</label>
                <input type="color" class="form-control form-control-color" id="couleur" name="couleur" value="{{ old('couleur') }}">
              </div>

              <div class="mb-3">
                <label for="taille" class="form-label">Taille</label>
                <select class="form-control" id="taille" name="taille">
                  <option value="">-- Sélectionner une taille --</option>
                  <option value="XXS" {{ old('taille') == 'XXS' ? 'selected' : '' }}>XXS</option>
                  <option value="XS" {{ old('taille') == 'XS' ? 'selected' : '' }}>XS</option>
                  <option value="S" {{ old('taille') == 'S' ? 'selected' : '' }}>S</option>
                  <option value="M" {{ old('taille') == 'M' ? 'selected' : '' }}>M</option>
                  <option value="L" {{ old('taille') == 'L' ? 'selected' : '' }}>L</option>
                  <option value="XL" {{ old('taille') == 'XL' ? 'selected' : '' }}>XL</option>
                  <option value="XXL" {{ old('taille') == 'XXL' ? 'selected' : '' }}>XXL</option>
                  <option value="4XL" {{ old('taille') == '4XL' ? 'selected' : '' }}>4XL</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Retour à la liste</a>
                <button type="submit" class="btn btn-danger">Ajouter l'article</button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
