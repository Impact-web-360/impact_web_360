<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - Ajouter un Module</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    /* CSS personnalisé basé sur vos styles précédents */
    :root {
      --main-color: #c82333;
      --sidebar-bg: #212529;
      --sidebar-hover: rgba(87, 86, 86, 1);
      --text-light: #fff;
      --card-bg: #fff;
      --bg-color: #f4f6f9;
    }

    body {
      margin: 0;
      background-color: var(--bg-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Sidebar */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      height: 100vh;
      background-color: var(--sidebar-bg);
      color: var(--text-light);
      padding-top: 2rem;
      overflow-y: auto;
      transition: transform 0.3s ease;
      z-index: 1050;
    }
    #sidebar h4 {
      text-align: center;
      font-weight: 700;
      margin-bottom: 2rem;
      letter-spacing: 1px;
    }
    #sidebar a.nav-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 0.75rem 1.5rem;
      color: var(--text-light);
      font-weight: 600;
      transition: background-color 0.3s, border-left 0.3s;
      text-decoration: none;
    }
    #sidebar a.nav-link:hover,
    #sidebar a.nav-link.active {
      background-color: var(--sidebar-hover);
      border-left: 4px solid var(--main-color);
      text-decoration: none;
    }

    /* Main content */
    #content {
      margin-left: 250px;
      padding: 2rem 3rem;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
    }

    /* Section title */
    .section-title {
      color: var(--main-color);
      font-weight: 700;
      margin-bottom: 1rem;
      font-size: 1.8rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    /* Responsive Sidebar toggle button */
    #sidebarToggle {
      display: none;
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1100;
      background-color: var(--main-color);
      border: none;
      color: white;
      padding: 0.5rem 0.75rem;
      border-radius: 5px;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0,0,0,0.3);
      transition: background-color 0.3s ease;
    }
    #sidebarToggle:hover {
      background-color: #a71d2a;
    }

    /* Mobile & tablet */
    @media (max-width: 991.98px) {
      #sidebar {
        transform: translateX(-260px);
      }
      #sidebar.active {
        transform: translateX(0);
      }
      #content {
        margin-left: 0;
        padding: 1rem 1.5rem;
      }
      #sidebarToggle {
        display: block;
      }
      body.sidebar-open {
        overflow: hidden;
      }
    }
  </style>
</head>
<body>

<button id="sidebarToggle" aria-label="Toggle menu">
  <i class="fas fa-bars"></i>
</button>

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
  <a href="{{ route('intervenants.index')}}" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
  <a href="{{ route('billet')}}" class="nav-link"><i class="fas fa-calendar-alt "></i> Tickets</a>
  <form action="{{ route('logout') }}" method="POST" id="logout-form">
    @csrf
    <a href="{{ route('logout')}}" class="nav-link"><i class="fa fa-arrow-left"></i>Deconnexion</a>
  </form>
  
</nav>

<main id="content" tabindex="-1">
  <section id="add-module" class="mb-5">
    <h2 class="section-title"><i class="fas fa-plus-circle"></i> Ajouter un Nouveau Module</h2>
    <div class="container mt-4">
        <h2>Ajouter un Nouveau Module</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Dashboard.modules.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formation_id" class="form-label text-dark">Formation Associée</label>
                <select class="form-select" id="formation_id" name="formation_id" required>
                    <option value="">Sélectionner une formation</option>
                    @foreach($formations as $formation)
                        <option value="{{ $formation->id }}" {{ old('formation_id') == $formation->id ? 'selected' : '' }}>{{ $formation->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label text-dark">Titre du Module</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            {{-- Le champ description a été retiré car il n'est pas dans la base de données --}}
            <div class="mb-3">
                <label for="duration" class="form-label text-dark">Durée du Module (en minutes)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" min="1">
                <div class="form-text text-secondary">Ex: 60 pour 1 heure.</div>
            </div>
            <div class="mb-3">
                <label for="order" class="form-label text-dark">Ordre du Module</label>
                <input type="number" class="form-control" id="order" name="order" value="{{ old('order') }}" min="1">
                <div class="form-text text-secondary">L'ordre d'apparition du module dans la formation.</div>
            </div>

            <hr class="my-4">
            <h4 class="mb-3 text-dark">Contenu du Module</h4>

            <div class="mb-3">
                @csrf
                <label for="video_path" class="form-label text-dark">Vidéo à Télécharger </label>
                <input type="file" class="form-control" name="video_path" accept="video/mp4,video/mov,video/ogg,video/qt" >
                <div class="form-text text-secondary">Vidéo, etc. Taille max : 50MB.</div>
            </div>

            <div class="mb-3">
                <label for="file_path" class="form-label text-dark">Fichier à Télécharger </label>
                <input type="file" class="form-control" id="file_path" name="file_path">
                <div class="form-text text-secondary">PDF, documents, etc. Taille max : 5MB.</div>
            </div>

            <button type="submit" class="btn btn-danger mt-3">Ajouter le Module</button>
        </form>
    </div>
  </section>
</main>

<script>
  // Sidebar toggle logic
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const body = document.body;

  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    body.classList.toggle('sidebar-open');
  });

  document.addEventListener('click', (e) => {
    if (window.innerWidth < 992 && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
      sidebar.classList.remove('active');
      body.classList.remove('sidebar-open');
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>