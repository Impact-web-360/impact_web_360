<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Admin - Modifier un Article</title>
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

    .image-wrapper {
      height: 200px;
      overflow: hidden;
    }

    .image-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
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
        margin-top: 40px;
      }
    }

    @media (max-width: 575.98px) {
      .image-wrapper {
        height: 150px;
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
        <a href="{{ route('articles.index') }}" class="nav-link active"><i class="fa fa-shopping-basket"></i> Articles</a>
        <a href="{{ route('emploies.index') }}" class="nav-link"><i class="fa fa-briefcase"></i> Emplois</a>
        <a href="{{ route('intervenants.index') }}" class="nav-link"><i class="fa fa-user"></i> Intervenants</a>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
            <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>Deconnexion</a>
        </form>
      </nav>

      <main class="content col-md-12 col-lg-9">
        <h2 id="articles">🛍️ Modifier un article</h2>

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
          <div class="card-header p-3">
            <h5>Modifier l'article : {{ $article->nom }}</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="nom" class="form-label">Nom de l'article</label>
                <input type="text" class="form-control" id="nom" name="nom"
                  value="{{ old('nom', $article->nom) }}" required>
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                  required>{{ old('description', $article->description) }}</textarea>
              </div>

              <div class="mb-3">
                <label for="prix" class="form-label">Prix (FCFA)</label>
                <input type="number" class="form-control" id="prix" name="prix" min="0" step="1"
                  value="{{ old('prix', $article->prix) }}" required>
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" id="type" name="type" required>
                  <option value="">-- Sélectionner un type --</option>
                  <option value="T-shirt" {{ (old('type', $article->type) == 'T-shirt') ? 'selected' : '' }}>T-shirt
                  </option>
                  <option value="Hoodie" {{ (old('type', $article->type) == 'Hoodie') ? 'selected' : '' }}>Hoodie</option>
                  <option value="Jeans" {{ (old('type', $article->type) == 'Jeans') ? 'selected' : '' }}>Jeans</option>
                  <option value="Short" {{ (old('type', $article->type) == 'Short') ? 'selected' : '' }}>Short</option>
                  <option value="Shirt" {{ (old('type', $article->type) == 'Shirt') ? 'selected' : '' }}>Shirt</option>
                  <option value="Accessoires" {{ (old('type', $article->type) == 'Accessoires') ? 'selected' : '' }}>Accessoires
                  </option>
                  <option value="Autre" {{ (old('type', $article->type) == 'Autre') ? 'selected' : '' }}>Autre</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="couleur" class="form-label">Couleur</label>
                <input type="color" class="form-control form-control-color" id="couleur" name="couleur"
                  value="{{ old('couleur', $article->couleur) }}">
              </div>

              <div class="mb-3">
                <label for="taille" class="form-label">Taille</label>
                <select class="form-control" id="taille" name="taille">
                  <option value="">-- Sélectionner une taille --</option>
                  <option value="XXS" {{ (old('taille', $article->taille) == 'XXS') ? 'selected' : '' }}>XXS
                  </option>
                  <option value="XS" {{ (old('taille', $article->taille) == 'XS') ? 'selected' : '' }}>XS</option>
                  <option value="S" {{ (old('taille', $article->taille) == 'S') ? 'selected' : '' }}>S</option>
                  <option value="M" {{ (old('taille', $article->taille) == 'M') ? 'selected' : '' }}>M</option>
                  <option value="L" {{ (old('taille', $article->taille) == 'L') ? 'selected' : '' }}>L</option>
                  <option value="XL" {{ (old('taille', $article->taille) == 'XL') ? 'selected' : '' }}>XL</option>
                  <option value="XXL" {{ (old('taille', $article->taille) == 'XXL') ? 'selected' : '' }}>XXL</option>
                  <option value="4XL" {{ (old('taille', $article->taille) == '4XL') ? 'selected' : '' }}>4XL</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($article->image)
                <div class="mt-2">
                  <p class="text-muted">Image actuelle :</p>
                  <img src="{{ $article->image }}" class="img-fluid" style="max-height: 200px;">
                </div>
                @endif
              </div>

              <div class="d-flex justify-content-between">
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Retour à la liste</a>
                <button type="submit" class="btn btn-danger">Mettre à jour</button>
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
