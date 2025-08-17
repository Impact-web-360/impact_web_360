<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - Grille Multi-Colonnes</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <!-- Chart.js -->
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
      padding: 2rem 3rem;
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
        padding: 1rem 1.5rem;
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
  <h4><i class="fa fa-cogs me-2 mt-5"></i>Admin Panel</h4>
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
      <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>Deconnexion</a>
  </form>
  
</nav>

<main id="content" tabindex="-1">

  <header>
    <h1>Bienvenue Administrateur</h1>
  </header>

  <!-- Statistiques : grille 3 colonnes -->
  <section id="stats">
    <h2 class="section-title"><i class="fas fa-chart-bar"></i> Statistiques Générales</h2>
    <div class="dashboard-grid">
      <div class="card card-custom p-4 d-flex justify-content-between align-items-center">
        <div>
          <p class="stat-label">Utilisateurs</p>
          <p class="stat-number">{{ $totalUsers }} ce mois</p>
        </div>
        <i class="fas fa-user card-icon"></i>
      </div>

      <div class="card card-custom p-4 d-flex justify-content-between align-items-center">
        <div>
          <p class="stat-label">Événements</p>
          <p class="stat-number">{{ $totalEvenements }} à venir</p>
        </div>
        <i class="fas fa-calendar-check card-icon"></i>
      </div>

      <div class="card card-custom p-4 d-flex justify-content-between align-items-center">
        <div>
          <p class="stat-label">Articles</p>
          <p class="stat-number">{{ $totalArticles }} ce mois</p>
        </div>
        <i class="fas fa-shopping-cart card-icon"></i>
      </div>
      
      <div class="card card-custom p-4 d-flex justify-content-between align-items-center">
        <div>
          <p class="stat-label">Sponsors</p>
          <p class="stat-number">{{ $totalSponsors }} ce mois</p>
        </div>
        <i class="fa fa-handshake card-icon"></i>
      </div>

      <div class="card card-custom p-4 d-flex justify-content-between align-items-center">
        <div>
          <p class="stat-label">Intervenants</p>
          <p class="stat-number">{{ $totalIntervenants }} ce mois</p>
        </div>
        <i class="fas fa-user card-icon"></i>
      </div>

      <div class="card card-custom p-4 d-flex justify-content-between align-items-center">
        <div>
          <p class="stat-label">Formations</p>
          <p class="stat-number">{{ $totalFormations }} ce mois</p>
        </div>
        <i class="fas fa-folder-open card-icon"></i>
      </div>
    </div>

    <canvas id="statChart" class="rounded-3 shadow-sm" style="background:#fff; padding: 1rem;"></canvas>
  </section>

  <!-- Section Utilisateurs + Graphique côte à côte -->
  <section id="users" class="mb-5">
    <h2 class="section-title"><i class="fas fa-users"></i> Gestion des Utilisateurs</h2>
    <div class="row g-4">
      <div class="col-lg-12">
        <div class="card card-custom p-3">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="table-light">
                <tr>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Rôle</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($recentUsers as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>
                      <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-outline-danger btn-sm" aria-label="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                              <i class="fas fa-trash"></i>
                          </button>
                      </form>

                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="card card-custom p-4">
          <h5><i class="fas fa-chart-pie"></i> Répartition des rôles</h5>
          <canvas id="rolesChart" style="min-height: 200px;"></canvas>
        </div>
      </div>
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

  // Fermer la sidebar si clic en dehors (mobile)
  document.addEventListener('click', (e) => {
    if (window.innerWidth < 992 && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
      sidebar.classList.remove('active');
      body.classList.remove('sidebar-open');
    }
  });

  // Chart.js Statistiques
  const ctxStats = document.getElementById('statChart').getContext('2d');
  new Chart(ctxStats, {
    type: 'bar',
    data: {
      labels: @json($labels),
      datasets: [{
        label: 'Nombre d\'utilisateurs',
        data: @json($data),
        backgroundColor: 'var(--main-color)',
        borderRadius: 5,
        barPercentage: 0.6
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          max:200,
          ticks: { stepSize: 20 }
        }
      },
      plugins: {
        legend: {
          display: true,
          labels: { color: '#333', font: { weight: 'bold' } }
        }
      }
    }
  });

  // Chart.js Répartition rôles (camembert)
  const ctxRoles = document.getElementById('rolesChart').getContext('2d');
  new Chart(ctxRoles, {
    type: 'doughnut',
    data: {
      labels: ['Admin', 'Participant', 'Intervenant'],
      datasets: [{
        data: [{{ $adminCount }}, {{ $participantCount }}, {{ $intervenantCount }}],
        backgroundColor: ['#c82333', '#e5534b', '#f8a5a0'],
        hoverOffset: 10
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom',
          labels: { font: { weight: 'bold' } }
        }
      }
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
