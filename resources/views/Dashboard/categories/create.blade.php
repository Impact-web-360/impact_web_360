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

    /* Sidebar scroll bar */
    #sidebar::-webkit-scrollbar {
      width: 6px;
    }
    #sidebar::-webkit-scrollbar-thumb {
      background-color: var(--main-color);
      border-radius: 10px;
    }

    /* Main content */
    #content {
      margin-left: 250px;
      padding: 1rem;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
    }

    /* Header (optional) */
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
      header h1{
        margin-left: 15%;
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

<button id="sidebarToggle" aria-label="Toggle menu">
  <i class="fas fa-bars"></i>
</button>

<nav id="sidebar" aria-label="Sidebar Navigation">
  <h4><i class="fa fa-cogs me-2"></i>Admin Panel</h4>
  <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-bar"></i> Statistiques</a>
  <a href="{{ route('evenements.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i>Événements</a>
  <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i>Sponsors</a>
  <a href="{{ route('replay.index')}}" class="nav-link"><i class="fa-solid fa-play"></i> Replay
  <a href="{{ route('categories.index')}}" class="nav-link active"><i class="fas fa-layer-group"></i>Catégorie</a>
  <a href="{{ route('formations.index')}}" class="nav-link"><i class="fas fa-graduation-cap"></i>Formation</a>
  <a href="{{ route('modules.index')}}" class="nav-link"><i class="fas fa-puzzle-piece"></i>Modules</a>
  <a href="{{ route('articles.index')}}" class="nav-link"><i class="fa fa-shopping-basket"></i>Articles</a>
  <a href="{{ route('emploies.index')}}" class="nav-link"><i class="fa fa-briefcase"></i>Emplois</a>
  <a href="{{ route('intervenants.index')}}" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
  <form action="{{ route('logout') }}" method="POST" id="logout-form">
  @csrf
      <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>Deconnexion</a>
  </form>
  
</nav>

<main id="content" tabindex="-1">


  <section id="add-formation" class="mb-5">
    <div class="container mt-4">
        <h2>Ajouter une Nouvelle Catégorie</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('Dashboard.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-dark">Nom de la Catégorie</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <button type="submit" class="btn btn-danger">Ajouter la Catégorie</button>
        </form>
    </div>
  </section>

  </main>

<script>
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const body = document.body;

  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    body.classList.toggle('sidebar-open');
  });

  // Close the sidebar if clicking outside (mobile)
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

