<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajouter un Replay</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Police Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet" />
  
  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

  <style>
    body {
      background-color: black;
      color: #ffffff;
      font-family: 'Montserrat', sans-serif;
    }

    .form-container {
      max-width: 800px;
      margin: auto;
    }

    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(255, 255, 255, 0.05);
    }

    .card h2 {
      font-weight: 700;
    }

    .form-label {
      font-weight: 500;
    }

    .btn-danger {
      background-color: #e63946;
      border: none;
    }

    .btn-danger:hover {
      background-color: #d62839;
    }

    .btn-secondary {
      background-color: #6c757d;
    }

    textarea.form-control {
      min-height: 120px;
    }
  </style>
</head>
<body>

<div class="container py-5 form-container">
  <div class="card p-4">
    <h2 class="mb-4 text-center">Modifier le Replay</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('replay.update', $replay->id) }}" method="POST" enctype="multipart/form-data">

      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="id_evenement" class="form-label fw-bold" style="font-size: 20px">Événement</label>
        <select name="id_evenement" class="form-select" required>
          <option value="">-- Choisir un événement --</option>
          @foreach ($evenements as $evenement)
            <option value="{{ $evenement->id }}" {{ $evenement->id == $replay->id_evenement ? 'selected' : '' }}>
              {{ $evenement->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Upload vidéo -->
        <div class="mb-3">
            <label for="video" class="form-label fw-bold" style="font-size: 20px">Vidéo du replay</label>
            <input type="file" name="video" id="video" class="form-control" accept="video/*" required>
        </div>

      <div class="mb-3">
        <label class="form-label fw-bold" style="font-size: 20px">Titre du Replay</label>
        <input type="text" name="titre" class="form-control" value="{{ $replay->titre }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" style="font-size: 20px">Description</label>
        <textarea name="description" class="form-control" required>{{ $replay->description }}</textarea>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" style="font-size: 20px">Nom du présentateur</label>
        <input type="text" name="presentateur_nom" class="form-control" value="{{ $replay->presentateur_nom }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold" style="font-size: 20px">Poste du présentateur</label>
        <input type="text" name="presentateur_poste" class="form-control" value="{{ $replay->presentateur_poste }}" required>
      </div>

        <div class="mb-3">
            <label for="presentateur_image" class="form-label fw-bold" style="font-size: 20px">Image du présentateur</label>
            <input type="file" name="presentateur_image" id="presentateur_image" class="form-control" accept="image/*" required>
        </div>

      <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-danger px-4">Mettre à jour</button>
        <a href="{{ route('replay.index') }}" class="btn btn-secondary px-4">Annuler</a>
      </div>
    </form>
  </div>
</div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <!-- Icons (Bootstrap Icons) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>

