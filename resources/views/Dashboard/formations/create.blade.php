<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - Ajouter Formation</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
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
      padding-top: 5rem;
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

    /* Sidebar scrollbar */
    #sidebar::-webkit-scrollbar {
      width: 6px;
    }
    #sidebar::-webkit-scrollbar-thumb {
      background-color: var(--main-color);
      border-radius: 10px;
    }

    /* Main content */
    #content {
      padding: 2rem;
      margin-left: 250px;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
    }

    /* Header */
    header {
      margin-bottom: 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      color: var(--main-color);
      font-weight: 700;
    }

    /* Card styles */
    .card-custom {
      background-color: var(--card-bg);
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.07);
      transition: transform 0.3s ease;
    }
    .card-custom:hover {
      transform: translateY(-5px);
    }
    .card-icon {
      font-size: 2.5rem;
      color: var(--main-color);
    }
    .stat-number {
      font-size: 2rem;
      font-weight: 700;
      margin: 0;
    }
    .stat-label {
      font-weight: 600;
      color: #6c757d;
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

    /* Sidebar toggle */
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

    /* Responsive */
    @media (max-width: 991.98px) {
      #sidebar {
        transform: translateX(-260px);
      }
      #sidebar.active {
        transform: translateX(0);
      }
      #content {
        margin-left: 0;
        margin-top: 50px;
      }
      #sidebarToggle {
        display: block;
      }
      body.sidebar-open {
        overflow: hidden;
      }
    }

    /* Grid layout for dashboard widgets */
    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-bottom: 3rem;
    }

    /* Tables responsive */
    .table-responsive {
      overflow-x: auto;
    }
  </style>
</head>
<body>

<!-- Sidebar Toggle Button -->
<button id="sidebarToggle" aria-label="Toggle menu">
  <i class="fas fa-bars"></i>
</button>

<!-- Sidebar Navigation -->
<nav id="sidebar" aria-label="Sidebar Navigation">
  <h4><i class="fa fa-cogs me-2"></i>Admin Panel</h4>
  <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-bar"></i> Statistiques</a>
  <a href="{{ route('evenements.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i> Événements</a>
  <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i> Sponsors</a>
  <a href="{{ route('replay.index')}}" class="nav-link"><i class="fa-solid fa-play"></i> Replay</a>
  <a href="{{ route('categories.index')}}" class="nav-link"><i class="fas fa-layer-group"></i> Catégorie</a>
  <a href="{{ route('formations.index')}}" class="nav-link active"><i class="fas fa-graduation-cap"></i> Formation</a>
  <a href="{{ route('modules.index')}}" class="nav-link"><i class="fas fa-puzzle-piece"></i> Modules</a>
  <a href="{{ route('articles.index')}}" class="nav-link"><i class="fa fa-shopping-basket"></i> Articles</a>
  <a href="{{ route('emploies.index')}}" class="nav-link"><i class="fa fa-briefcase"></i> Emplois</a>
  <a href="{{ route('intervenants.index')}}" class="nav-link"><i class="fa fa-user"></i> Intervenants</a>
  <form action="{{ route('logout') }}" method="POST" id="logout-form">
  @csrf
    <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>Deconnexion</a>
  </form>
</nav>

<!-- Main Content -->
<main id="content" class="mb-5">
  <section id="add-formation">
    <h2 class="section-title"><i class="fas fa-plus-circle"></i> Ajouter une Nouvelle Formation</h2>

    <div class="container mt-4">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('Dashboard.formations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Formation Details -->
        <div class="mb-3">
          <label for="title" class="form-label text-dark">Titre de la Formation</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
          <label for="category_id" class="form-label text-dark">Catégorie</label>
          <select class="form-select" id="category_id" name="category_id" required>
            <option value="">Sélectionner une catégorie</option>
            @foreach($categories as $categorie)
              <option value="{{ $categorie->id }}" {{ old('category_id') == $categorie->id ? 'selected' : '' }}>
                {{ $categorie->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label text-dark">Description</label>
          <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label text-dark">Image de la Formation</label>
          <input type="file" class="form-control" id="image" name="image" accept="image/*">
          <div class="form-text text-secondary">Taille max : 2MB. Formats : JPG, PNG, GIF, SVG.</div>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label text-dark">Prix (FCFA)</label>
          <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
        </div>

        <!-- Mentor Info -->
        <hr class="my-4">
        <h4 class="mb-3 text-dark">Informations sur le Mentor</h4>
        <div class="mb-3">
          <label for="mentor" class="form-label text-dark">Nom du Mentor</label>
          <input type="text" class="form-control" id="mentor" name="mentor" value="{{ old('mentor') }}" required>
        </div>
        <div class="mb-3">
          <label for="mentor_title" class="form-label text-dark">Titre du Mentor</label>
          <input type="text" class="form-control" id="mentor_title" name="mentor_title" value="{{ old('mentor_title') }}">
        </div>
        <div class="mb-3">
          <label for="mentor_avatar" class="form-label text-dark">Avatar du Mentor</label>
          <input type="file" class="form-control" id="mentor_avatar" name="mentor_avatar" accept="image/*">
          <div class="form-text text-secondary">Taille max : 2MB. Formats : JPG, PNG, GIF, SVG.</div>
        </div>
        <div class="mb-3">
          <label for="mentor_bio" class="form-label text-dark">Biographie du Mentor</label>
          <textarea class="form-control" id="mentor_bio" name="mentor_bio" rows="3">{{ old('mentor_bio') }}</textarea>
        </div>

        <!-- Objectives -->
        <hr class="my-4">
        <h4 class="mb-3 text-dark">Objectifs de la Formation</h4>
        <div id="objectives-container">
          @if(old('objectives'))
            @foreach(old('objectives') as $objective)
              <div class="input-group mb-2">
                <input type="text" name="objectives[]" class="form-control" value="{{ $objective }}" placeholder="Ajouter un objectif">
                <button type="button" class="btn btn-outline-danger remove-objective-field"><i class="fas fa-minus"></i></button>
              </div>
            @endforeach
          @else
            <div class="input-group mb-2">
              <input type="text" name="objectives[]" class="form-control" placeholder="Ajouter un objectif">
              <button type="button" class="btn btn-outline-danger remove-objective-field"><i class="fas fa-minus"></i></button>
            </div>
          @endif
        </div>
        <button type="button" class="btn btn-info btn-sm mb-3" id="add-objective-field"><i class="fas fa-plus"></i> Ajouter un objectif</button>

        <!-- Tools -->
        <hr class="my-4">
        <h4 class="mb-3 text-dark">Outils Utilisés</h4>
        <div id="tools-container">
          @if(old('tools'))
            @foreach(old('tools') as $tool)
              <div class="input-group mb-2">
                <input type="text" name="tools[]" class="form-control" value="{{ $tool }}" placeholder="Ajouter un outil">
                <button type="button" class="btn btn-outline-danger remove-tool-field"><i class="fas fa-minus"></i></button>
              </div>
            @endforeach
          @else
            <div class="input-group mb-2">
              <input type="text" name="tools[]" class="form-control" placeholder="Ajouter un outil">
              <button type="button" class="btn btn-outline-danger remove-tool-field"><i class="fas fa-minus"></i></button>
            </div>
          @endif
        </div>
        <button type="button" class="btn btn-info btn-sm mb-3" id="add-tool-field"><i class="fas fa-plus"></i> Ajouter un outil</button>

        <br>
        <div class="d-flex justify-content-between">
          <a href="{{ route('formations.index') }}" class="btn btn-secondary">Retour à la liste</a>
          <button type="submit" class="btn btn-danger">Ajouter</button>
        </div>
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

  // Dynamic fields for Objectives
  document.getElementById('add-objective-field').addEventListener('click', function() {
    const container = document.getElementById('objectives-container');
    const newField = document.createElement('div');
    newField.classList.add('input-group', 'mb-2');
    newField.innerHTML = `
      <input type="text" name="objectives[]" class="form-control" placeholder="Ajouter un objectif">
      <button type="button" class="btn btn-outline-danger remove-objective-field"><i class="fas fa-minus"></i></button>
    `;
    container.appendChild(newField);
  });

  document.getElementById('objectives-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-objective-field') || e.target.closest('.remove-objective-field')) {
      const button = e.target.closest('.remove-objective-field');
      if (this.querySelectorAll('.input-group').length > 1) {
        button.closest('.input-group').remove();
      } else {
        button.closest('.input-group').querySelector('input').value = '';
      }
    }
  });

  // Dynamic fields for Tools
  document.getElementById('add-tool-field').addEventListener('click', function() {
    const container = document.getElementById('tools-container');
    const newField = document.createElement('div');
    newField.classList.add('input-group', 'mb-2');
    newField.innerHTML = `
      <input type="text" name="tools[]" class="form-control" placeholder="Ajouter un outil">
      <button type="button" class="btn btn-outline-danger remove-tool-field"><i class="fas fa-minus"></i></button>
    `;
    container.appendChild(newField);
  });

  document.getElementById('tools-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-tool-field') || e.target.closest('.remove-tool-field')) {
      const button = e.target.closest('.remove-tool-field');
      if (this.querySelectorAll('.input-group').length > 1) {
        button.closest('.input-group').remove();
      } else {
        button.closest('.input-group').querySelector('input').value = '';
      }
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
