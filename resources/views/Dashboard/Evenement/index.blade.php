
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin - Impact Web 360</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { background-color: #f8f9fa; }
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
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .table th {
      background: #f1f1f1;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
  
<nav id="sidebar" aria-label="Sidebar Navigation" class="col-md-3 col-lg-2 d-md-block sidebar">
  <h4><i class="fa fa-cogs me-2 mb-3"></i>Admin Panel</h4>
  <a href="#stats" ><i class="fas fa-chart-bar"></i> Statistiques</a>
  <a href="{{ route('evenements.index') }}" class="nav-link nav-link active"><i class="fa fa-calendar-alt"></i>Événements</a>
  <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i>Sponsors</a>
  <a href="boutique.php" class="nav-link"><i class="fa fa-store"></i>Boutique</a>
  <a href="ajouter_intervenant.php" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
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
                
            @foreach ($evenements as $evenement)
                        <div class="card-body d-flex me-2">
                          <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $evenement->image) }}" alt="{{ $evenement->nom }}" class="img-fluid" >
                            <div class="card-body">
                              <h5 class="card-title mb-3">{{ $evenement->nom }}</h5>
                              <h6>{{ $evenement->promoteur }}</h6>
                              <div class="mt-3">
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
                              <a href="#" class="btn btn-danger fw-bold">Informations</a>
                              </div>
                              <center><a href="{{ route('sponsors.index') }}" class="btn btn-dark text-white fs-6 fw-bold mt-3 text-center" data-bs-toggle="modal" data-bs-target="#addSponsorModal">Ajouter un sponsor</a></center>
                              <center><a href="{{ route('sponsors.index') }}" class="btn btn-dark text-white fs-6 fw-bold mt-3 text-center" data-bs-toggle="modal" data-bs-target="#addIntervenantModal" >Ajouter un intervenant</a></center>
                            </div>
                          </div>
          
            @endforeach
            
        </div>
      </div>


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
<div class="modal fade" id="addEvenementModal" tabindex="-1"  aria-hidden="true">
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
<div class="modal fade" id="addSponsorModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable ">
    <form method="POST" action="{{ route('sponsors.store') }}" enctype="multipart/form-data" class="modal-content">
      @csrf
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="addsponsorLabel">Ajouter un sponsor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
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
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Enregistrer</button>
      </div>
    </form>
  </div>
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
function ajouterReseau() {
    const container = document.getElementById('reseaux-container');
    const nouveau = document.createElement('div');
    nouveau.classList.add('d-flex', 'mb-2');
    nouveau.innerHTML = `
        <input type="text" name="reseaux[nom][]" class="form-control me-2" placeholder="Nom du réseau">
        <input type="url" name="reseaux[lien][]" class="form-control" placeholder="Lien du profil">
    `;
    container.appendChild(nouveau);
}
</script>
</body>
</html>
