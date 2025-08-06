<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Replay - Edition 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
      body { background-color: black; color: white; font-family: 'Montserrat', sans-serif; scroll-behavior: smooth; overflow-x: hidden; }
      .container { max-width: 1200px; margin: auto; padding: 20px; }
      .table-responsive { overflow-x: auto; }
</style>
</head>
<body>

<button class="btn btn-danger mb-3 mt-3 ms-3" onclick="history.back()"><i class="fas fa-arrow-left"></i> Retour</button>
<div class="container py-5">
  <h2 class="mb-4 text-white text-center fw-bold">Liste des Replays</h2>

  <a href="{{ route('replay.create') }}" class="btn btn-danger mb-3">+ Ajouter un Replay</a>

  <div class="table-responsive">
    <table class="table table-dark table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Événement</th>
          <th>Titre</th>
          <th>Description</th>
          <th>Vidéo</th>
          <th>Présentateur</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($replays as $replay)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $replay->evenement->nom }}</td>
            <td>{{ $replay->titre }}</td>
            <td>{{ $replay->description }}</td>

            <td>
              @if ($replay->video_path)
                <video width="160" height="90" controls>
                  <source src="{{ asset('storage/' . $replay->video_path) }}" type="video/mp4">
                  Votre navigateur ne supporte pas la vidéo.
                </video>
              @else
                <span class="text-muted">Non fournie</span>
              @endif
            </td>

            <td>{{ $replay->presentateur_nom }}</td>

            <td>
              @if ($replay->presentateur_image)
                <img src="{{ asset('storage/' . $replay->presentateur_image) }}" alt="Présentateur" width="60" height="60" style="border-radius: 50%; object-fit: cover;">
              @else
                <span class="text-muted">Non fournie</span>
              @endif
            </td>

            <td>
              <a href="{{ route('replay.edit', $replay->id) }}" class="btn btn-sm btn-warning">Modifier</a>
              <form action="{{ route('replay.destroy', $replay->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Confirmer la suppression ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8">Aucun replay trouvé.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>


<script>
    AOS.init();
</script>
</body>
</html>

