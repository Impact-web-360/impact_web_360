<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Participants - Edition 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: black;
      color: white;
      font-family: 'Montserrat', sans-serif;
      scroll-behavior: smooth;
      overflow-x: hidden;
    }
    .container {
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    img {
      object-fit: cover;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <h2 class="mb-4 text-white text-center fw-bold">Liste des Intervenants</h2>

  <table class="table table-dark table-bordered table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Thème</th>
        <th>Description</th>
        <th>Image</th>
        <th>Événement</th>
      </tr>
    </thead>
    <tbody>
      @forelse($intervenants as $intervenant)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $intervenant->nom }}</td>
          <td>{{ $intervenant->theme }}</td>
          <td>{{ $intervenant->description }}</td>
          <td>
            @if ($intervenant->image)
              <img src="{{ asset('storage/' . $intervenant->image) }}" alt="Image" width="60" height="60">
            @else
              <span class="text-muted">Non fournie</span>
            @endif
          </td>
          <td>{{ $intervenant->evenement->nom ?? 'Non spécifié' }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">Aucun intervenant trouvé.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</body>
</html>