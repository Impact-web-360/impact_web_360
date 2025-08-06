<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - Evènements</title>

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
      overflow-x: hidden;
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
      padding: 1rem 1rem;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
      width: 77%;
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
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
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
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

      header h1 {
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

      <main id="content" class="col-md-9 col-lg-10">
        <h2 id="evenements">📅 Gestion des événements</h2>
        <div class="card mb-4">
          <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#ajouterEvenementModal">
            <i class="fa fa-plus"></i> Ajouter un événement
          </button>

          <div class="row">
            @foreach ($evenements as $evenement)
        <div class="col-md-6 col-lg-4 mb-4 d-flex">
          <div class="card w-100 d-flex flex-column justify-content-between bg-light shadow">

          <div class="image-wrapper">
            <img src="{{ asset('storage/' . $evenement->image) }}" class="card-img-top"
            alt="Affiche de l'évènement" style="height: 200px; object-fit: cover;">
          </div>

          <div class="card-body d-flex flex-column">
            <h5 class="card-title mb-3">{{ $evenement->nom }}</h5>
            <h6>{{ $evenement->promoteur }}</h6>

            <div class="mt-auto">
            <div class="mb-2">
              <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal"
              data-bs-target="#editEventModal{{ $evenement->id }}">
              <i class="fas fa-edit"></i>
              </button>

              <form method="POST" action="{{ route('evenements.destroy', $evenement->id) }}"
              onsubmit="return confirm('Confirmer la suppression ?');" style="display:inline;">
              @csrf
              @method('DELETE')
              <br>
              <button type="submit" class="btn btn-outline-danger btn-sm me-2">
                <i class="fas fa-trash"></i>
              </button>
              </form>
              <a href="#" class="btn btn-danger fw-bold" data-bs-toggle="modal"
              data-bs-target="#">Informations</a>
            </div>

            <a href="{{ route('sponsors.index') }}" class="btn btn-dark text-white fs-6 fw-bold w-100 mb-2"
              data-bs-toggle="modal" data-bs-target="#addSponsorModal">Ajouter un sponsor</a>
            <a href="#" class="btn btn-dark text-white fs-6 fw-bold w-100" data-bs-toggle="modal"
              data-bs-target="#addIntervenantModal">Ajouter un intervenant</a>
            </div>
          </div>

          </div>
        </div>
      @endforeach
          </div>


        </div>

<!-- Modal Ajouter Événement -->
<div class="modal fade" id="ajouterEvenementModal" tabindex="-1" aria-labelledby="ajouterEvenementLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow rounded-4">
      <div class="modal-header bg-dark text-white rounded-top-4">
        <h5 class="modal-title" id="ajouterEvenementLabel">Ajouter un événement</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="nom" class="form-label">Nom de l'événement</label>
              <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="promoteur" class="form-label">Promoteur</label>
              <input type="text" name="promoteur" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" ></textarea>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="lieu" class="form-label">Lieu</label>
              <input type="text" name="lieu" class="form-control" >
            </div>
            <div class="col-md-6">
              <label for="theme" class="form-label">Thème</label>
              <input type="text" name="theme" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="date_debut" class="form-label">Date de début</label>
              <input type="date" name="date_debut" class="form-control" required> >
            </div>
            <div class="col-md-6">
              <label for="date_fin" class="form-label">Date de fin</label>
              <input type="date" name="date_fin" class="form-control" >
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="heure" class="form-label">Heure</label>
              <input type="time" name="heure" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="nb_places" class="form-label">Nombre de places</label>
              <input type="number" name="nb_places" class="form-control" >
            </div>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
          </div>

          <div class="row mb-3">
            <div class="col-md-3">
              <label for="facebook" class="form-label">Lien Facebook</label>
              <input type="url" name="facebook" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="whatsapp" class="form-label">Lien WhatsApp</label>
              <input type="url" name="whatsapp" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="instagram" class="form-label">Lien Instagram</label>
              <input type="url" name="instagram" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="tiktok" class="form-label">Lien TikTok</label>
              <input type="url" name="tiktok" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light rounded-bottom-4">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>
        <!-- Modals de modification -->
     @foreach ($evenements as $evenement)
      <div class="modal fade" id="editEventModal{{ $evenement->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form method="POST" action="{{ route('evenements.update', $evenement->id) }}" enctype="multipart/form-data"
          class="modal-content">
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
            <input type="date" name="date_debut" class="form-control" value="{{ $evenement->date_debut }}"
            required>
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
            <input type="number" name="nb_places" class="form-control" value="{{ $evenement->nb_places }}"
            required>
          </div>
          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($evenement->image)
        <small class="text-muted mt-3">
        Image actuelle :
        <img src="{{ asset('storage/' . $evenement->image) }}" class="img-fluid mt-3"
          style="max-height: 60px;">
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
        <!-- Champ caché pour l'ID de l'événement -->
        @foreach ($evenements as $evenement)
        <input type="hidden" name="evenement_id" id="modalEventId" value="{{ $evenement->id }}">
        @endforeach
        
        <div class="mb-3">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
          <label for="fonction" class="form-label">Fonction</label>
          <input type="text" class="form-control" id="fonction" name="fonction" placeholder="Expert en IA" required>
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
          <div class="d-flex flex-wrap gap-2">
            <input type="text" name="whatsapp" class="form-control" placeholder="WhatsApp">
            <input type="text" name="facebook" class="form-control" placeholder="Facebook">
            <input type="text" name="instagram" class="form-control" placeholder="Instagram">
            <input type="text" name="tiktok" class="form-control" placeholder="TikTok">
            <input type="text" name="linkedln" class="form-control" placeholder="LinkedIn">
            <input type="text" name="snapchat" class="form-control" placeholder="Snapchat">
            <input type="text" name="x" class="form-control" placeholder="X (Twitter)">
          </div>
        </div>
      </div>
      <div class="modal-footer">
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
            @foreach ($evenements as $evenement)
        <label for="nom" class="form-label">{{ $evenement->nom }}</label>
        <input type="hidden" class="form-control" name="evenement_id" value="{{ $evenement->id }}">
      @endforeach
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

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const openSidebarBtn = document.getElementById('openSidebar');
      const closeSidebarBtn = document.getElementById('closeSidebar');
      const sidebar = document.querySelector('.sidebar-left');

      if (openSidebarBtn) {
        openSidebarBtn.addEventListener('click', function () {
          sidebar.classList.add('show');
        });
      }

      if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', function () {
          sidebar.classList.remove('show');
        });
      }

      // Optional: Close sidebar when clicking outside on mobile
      document.addEventListener('click', function (event) {
        if (sidebar.classList.contains('show') && !sidebar.contains(event.target) && !openSidebarBtn.contains(event.target)) {
          sidebar.classList.remove('show');
        }
      });

      // Add simple hover effects (handled mostly by CSS, but can extend with JS for complex animations)
      const cards = document.querySelectorAll('.speaker-card, .sponsor-card, .song-item');

      cards.forEach(card => {
        card.addEventListener('mouseenter', function () {
          // Can add more complex JS animations here if needed
          // e.g., gsap.to(this, { duration: 0.2, y: -5, ease: "power1.out" });
        });
        card.addEventListener('mouseleave', function () {
          // e.g., gsap.to(this, { duration: 0.2, y: 0, ease: "power1.out" });
        });

        card.addEventListener('click', function () {
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

    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('eventModal');
      const openModalBtn = document.getElementById('openModalBtn');

      openModalBtn.addEventListener('click', function () {
        modal.style.display = 'flex';
      });
      const closeModalBtn = document.getElementById('closeModalBtn');
      closeModalBtn.addEventListener('click', function () {
        modal.style.display = 'none';
      });
    });
  </script>
  </main>


</body>

</html><!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin - Evènements</title>

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
      overflow-x: hidden;
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
      padding: 1rem 1rem;
      transition: margin-left 0.3s ease;
      min-height: 100vh;
      width: 77%;
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
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
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
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

      header h1 {
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

      <main id="content" class="col-md-9 col-lg-10">
        <h2 id="evenements">📅 Gestion des événements</h2>
        <div class="card mb-4">
          <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#ajouterEvenementModal">
            <i class="fa fa-plus"></i> Ajouter un événement
          </button>

          <div class="row">
            @foreach ($evenements as $evenement)
        <div class="col-md-6 col-lg-4 mb-4 d-flex">
          <div class="card w-100 d-flex flex-column justify-content-between bg-light shadow">

          <div class="image-wrapper">
            <img src="{{ asset('storage/' . $evenement->image) }}" class="card-img-top"
            alt="Affiche de l'évènement" style="height: 200px; object-fit: cover;">
          </div>

          <div class="card-body d-flex flex-column">
            <h5 class="card-title mb-3">{{ $evenement->nom }}</h5>
            <h6>{{ $evenement->promoteur }}</h6>

            <div class="mt-auto">
            <div class="mb-2">
              <button class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal"
              data-bs-target="#editEventModal{{ $evenement->id }}">
              <i class="fas fa-edit"></i>
              </button>

              <form method="POST" action="{{ route('evenements.destroy', $evenement->id) }}"
              onsubmit="return confirm('Confirmer la suppression ?');" style="display:inline;">
              @csrf
              @method('DELETE')
              <br>
              <button type="submit" class="btn btn-outline-danger btn-sm me-2">
                <i class="fas fa-trash"></i>
              </button>
              </form>
              <a href="#" class="btn btn-danger fw-bold" data-bs-toggle="modal"
              data-bs-target="#">Informations</a>
            </div>

            <a href="{{ route('sponsors.index') }}" class="btn btn-dark text-white fs-6 fw-bold w-100 mb-2"
              data-bs-toggle="modal" data-bs-target="#addSponsorModal">Ajouter un sponsor</a>
            <a href="#" class="btn btn-dark text-white fs-6 fw-bold w-100" data-bs-toggle="modal"
              data-bs-target="#addIntervenantModal">Ajouter un intervenant</a>
            </div>
          </div>

          </div>
        </div>
      @endforeach
          </div>


        </div>

<!-- Modal Ajouter Événement -->
<div class="modal fade" id="ajouterEvenementModal" tabindex="-1" aria-labelledby="ajouterEvenementLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow rounded-4">
      <div class="modal-header bg-dark text-white rounded-top-4">
        <h5 class="modal-title" id="ajouterEvenementLabel">Ajouter un événement</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="nom" class="form-label">Nom de l'événement</label>
              <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="promoteur" class="form-label">Promoteur</label>
              <input type="text" name="promoteur" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" ></textarea>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="lieu" class="form-label">Lieu</label>
              <input type="text" name="lieu" class="form-control" >
            </div>
            <div class="col-md-6">
              <label for="theme" class="form-label">Thème</label>
              <input type="text" name="theme" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="date_debut" class="form-label">Date de début</label>
              <input type="date" name="date_debut" class="form-control" required> >
            </div>
            <div class="col-md-6">
              <label for="date_fin" class="form-label">Date de fin</label>
              <input type="date" name="date_fin" class="form-control" >
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label for="heure" class="form-label">Heure</label>
              <input type="time" name="heure" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="nb_places" class="form-label">Nombre de places</label>
              <input type="number" name="nb_places" class="form-control" >
            </div>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
          </div>

          <div class="row mb-3">
            <div class="col-md-3">
              <label for="facebook" class="form-label">Lien Facebook</label>
              <input type="url" name="facebook" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="whatsapp" class="form-label">Lien WhatsApp</label>
              <input type="url" name="whatsapp" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="instagram" class="form-label">Lien Instagram</label>
              <input type="url" name="instagram" class="form-control">
            </div>
            <div class="col-md-3">
              <label for="tiktok" class="form-label">Lien TikTok</label>
              <input type="url" name="tiktok" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light rounded-bottom-4">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>
        <!-- Modals de modification -->
     @foreach ($evenements as $evenement)
      <div class="modal fade" id="editEventModal{{ $evenement->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form method="POST" action="{{ route('evenements.update', $evenement->id) }}" enctype="multipart/form-data"
          class="modal-content">
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
            <input type="date" name="date_debut" class="form-control" value="{{ $evenement->date_debut }}"
            required>
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
            <input type="number" name="nb_places" class="form-control" value="{{ $evenement->nb_places }}"
            required>
          </div>
          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($evenement->image)
        <small class="text-muted mt-3">
        Image actuelle :
        <img src="{{ asset('storage/' . $evenement->image) }}" class="img-fluid mt-3"
          style="max-height: 60px;">
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
        <!-- Champ caché pour l'ID de l'événement -->
        @foreach ($evenements as $evenement)
        <input type="hidden" name="evenement_id" id="modalEventId" value="{{ $evenement->id }}">
        @endforeach
        
        <div class="mb-3">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
          <label for="fonction" class="form-label">Fonction</label>
          <input type="text" class="form-control" id="fonction" name="fonction" placeholder="Expert en IA" required>
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
          <div class="d-flex flex-wrap gap-2">
            <input type="text" name="whatsapp" class="form-control" placeholder="WhatsApp">
            <input type="text" name="facebook" class="form-control" placeholder="Facebook">
            <input type="text" name="instagram" class="form-control" placeholder="Instagram">
            <input type="text" name="tiktok" class="form-control" placeholder="TikTok">
            <input type="text" name="linkedln" class="form-control" placeholder="LinkedIn">
            <input type="text" name="snapchat" class="form-control" placeholder="Snapchat">
            <input type="text" name="x" class="form-control" placeholder="X (Twitter)">
          </div>
        </div>
      </div>
      <div class="modal-footer">
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
            @foreach ($evenements as $evenement)
        <label for="nom" class="form-label">{{ $evenement->nom }}</label>
        <input type="hidden" class="form-control" name="evenement_id" value="{{ $evenement->id }}">
      @endforeach
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

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const openSidebarBtn = document.getElementById('openSidebar');
      const closeSidebarBtn = document.getElementById('closeSidebar');
      const sidebar = document.querySelector('.sidebar-left');

      if (openSidebarBtn) {
        openSidebarBtn.addEventListener('click', function () {
          sidebar.classList.add('show');
        });
      }

      if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', function () {
          sidebar.classList.remove('show');
        });
      }

      // Optional: Close sidebar when clicking outside on mobile
      document.addEventListener('click', function (event) {
        if (sidebar.classList.contains('show') && !sidebar.contains(event.target) && !openSidebarBtn.contains(event.target)) {
          sidebar.classList.remove('show');
        }
      });

      // Add simple hover effects (handled mostly by CSS, but can extend with JS for complex animations)
      const cards = document.querySelectorAll('.speaker-card, .sponsor-card, .song-item');

      cards.forEach(card => {
        card.addEventListener('mouseenter', function () {
          // Can add more complex JS animations here if needed
          // e.g., gsap.to(this, { duration: 0.2, y: -5, ease: "power1.out" });
        });
        card.addEventListener('mouseleave', function () {
          // e.g., gsap.to(this, { duration: 0.2, y: 0, ease: "power1.out" });
        });

        card.addEventListener('click', function () {
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

    document.addEventListener('DOMContentLoaded', function () {
      const modal = document.getElementById('eventModal');
      const openModalBtn = document.getElementById('openModalBtn');

      openModalBtn.addEventListener('click', function () {
        modal.style.display = 'flex';
      });
      const closeModalBtn = document.getElementById('closeModalBtn');
      closeModalBtn.addEventListener('click', function () {
        modal.style.display = 'none';
      });
    });
  </script>
  </main>


</body>

</html>