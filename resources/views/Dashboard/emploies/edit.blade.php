<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Admin - Modifier un Emploi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --primary-red: #DC3545;
      --background-app: #181818;
      --background-card: #282828;
      --background-dark: #000;
      --text-light: #f8f9fa;
      --text-muted: #adb5bd;
      --border-color: #333;
      --sidebar-bg: #212529;
      --sidebar-hover: rgba(87, 86, 86, 1);
      --main-color: #DC3545;
    }

    body {
      background-color: #f8f9fa;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
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

    #sidebar::-webkit-scrollbar {
      width: 6px;
    }

    #sidebar::-webkit-scrollbar-thumb {
      background-color: var(--main-color);
      border-radius: 10px;
    }

    /* Sidebar toggle button */
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
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      transition: background-color 0.3s ease;
    }

    #sidebarToggle:hover {
      background-color: #a71d2a;
    }

    .content {
      padding: 2rem;
      margin-left: 250px;
      transition: margin-left 0.3s ease;
    }

    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
      #sidebar {
        transform: translateX(-260px);
      }

      #sidebar.active {
        transform: translateX(0);
      }

      #sidebarToggle {
        display: block;
      }

      .content {
        margin-left: 0;
        margin-top: 50px;
      }
    }

    @media (max-width: 575.98px) {
      .card-body {
        padding: 1rem;
      }
    }
  </style>
</head>

<body>
  <button id="sidebarToggle"><i class="fas fa-bars"></i></button>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebar" aria-label="Sidebar Navigation">
        <h4><i class="fa fa-cogs me-2"></i>Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-bar"></i> Statistiques</a>
        <a href="{{ route('evenements.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i> Événements</a>
        <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i> Sponsors</a>
        <a href="{{ route('replay.index') }}" class="nav-link"><i class="fa-solid fa-play"></i> Replay</a>
        <a href="{{ route('categories.index') }}" class="nav-link"><i class="fas fa-layer-group"></i> Catégorie</a>
        <a href="{{ route('formations.index') }}" class="nav-link"><i class="fas fa-graduation-cap"></i> Formation</a>
        <a href="{{ route('modules.index') }}" class="nav-link"><i class="fas fa-puzzle-piece"></i> Modules</a>
        <a href="{{ route('articles.index') }}" class="nav-link"><i class="fa fa-shopping-basket"></i> Articles</a>
        <a href="{{ route('emploies.index') }}" class="nav-link active"><i class="fa fa-briefcase"></i> Emplois</a>
        <a href="{{ route('intervenants.index') }}" class="nav-link"><i class="fa fa-user"></i> Intervenants</a>
        <a href="{{ route('billet') }}" class="nav-link"><i class="fas fa-calendar-alt"></i> Tickets</a>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
            <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>Deconnexion</a>
        </form>
      </nav>

      <main class="content col-md-12 col-lg-9">
        <h2 id="emploies">💼 Modifier un emploi</h2>

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

        <div class="card mb-4 mt-3">
          <div class="card-header text-center">
            <h5>Formulaire de modification d'emploi</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('emploies.update', $emploie->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'emploi</label>
                <input type="text" class="form-control" id="nom" name="nom"
                  value="{{ old('nom', $emploie->nom) }}" required>
              </div>

              <div class="mb-3">
                <label for="promoteur" class="form-label">Promoteur</label>
                <input type="text" class="form-control" id="promoteur" name="promoteur"
                  value="{{ old('promoteur', $emploie->promoteur) }}" required>
              </div>

              <div class="mb-3">
                <label for="localisation" class="form-label">Localisation</label>
                <input type="text" class="form-control" id="localisation" name="localisation"
                  value="{{ old('localisation', $emploie->localisation) }}">
              </div>

              <div class="mb-3">
                <label for="lien" class="form-label">Lien vers l'offre</label>
                <input type="url" class="form-control" id="lien" name="lien"
                  value="{{ old('lien', $emploie->lien) }}" required>
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                  <option value="">-- Sélectionner un type --</option>
                  <option value="stage" {{ old('type', $emploie->type) == 'stage' ? 'selected' : '' }}>Stage</option>
                  <option value="freelance" {{ old('type', $emploie->type) == 'freelance' ? 'selected' : '' }}>Freelance</option>
                  <option value="temps plein" {{ old('type', $emploie->type) == 'temps plein' ? 'selected' : '' }}>Temps plein</option>
                  <option value="temps partiel" {{ old('type', $emploie->type) == 'temps partiel' ? 'selected' : '' }}>Temps partiel</option>
                  <option value="contrat" {{ old('type', $emploie->type) == 'contrat' ? 'selected' : '' }}>Contrat</option>
                  <option value="autre" {{ old('type', $emploie->type) == 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <select class="form-control" id="categorie" name="categorie" required>
                  <option value="">-- Sélectionner une catégorie --</option>
                  <option value="marketing" {{ old('categorie', $emploie->categorie) == 'marketing' ? 'selected' : '' }}>Marketing</option>
                  <option value="communication" {{ old('categorie', $emploie->categorie) == 'communication' ? 'selected' : '' }}>Communication</option>
                  <option value="design" {{ old('categorie', $emploie->categorie) == 'design' ? 'selected' : '' }}>Design</option>
                  <option value="commerce" {{ old('categorie', $emploie->categorie) == 'commerce' ? 'selected' : '' }}>Commerce</option>
                  <option value="informatique" {{ old('categorie', $emploie->categorie) == 'informatique' ? 'selected' : '' }}>Informatique</option>
                  <option value="finance" {{ old('categorie', $emploie->categorie) == 'finance' ? 'selected' : '' }}>Finance</option>
                  <option value="ressources humaines" {{ old('categorie', $emploie->categorie) == 'ressources humaines' ? 'selected' : '' }}>Ressources humaines</option>
                  <option value="autre" {{ old('categorie', $emploie->categorie) == 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="logo" class="form-label">Logo (laisser vide pour ne pas modifier)</label>
                <input type="file" class="form-control" id="logo" name="logo">
                @if($emploie->logo)
                <div class="mt-2">
                  <p>Logo actuel :</p>
                  <img src="{{ asset('storage/' . $emploie->logo) }}" alt="Logo actuel" style="max-width: 200px; height: auto;">
                </div>
                @endif
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('emploies.index') }}" class="btn btn-secondary">Retour à la liste</a>
                <button type="submit" class="btn btn-danger">Mettre à jour l'emploi</button>
              </div>
            </form>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('active');
    });
  </script>
</body>

</html>
