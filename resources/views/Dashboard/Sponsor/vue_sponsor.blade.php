<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
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
  <h2 class="mb-5 text-white text-center fw-bold">Liste des Sponsors</h2>

  <table class="table table-dark table-bordered table-hover mb-5">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Promoteur</th>
        <th>Description</th>
        <th>Logo</th>
        <th>Événement</th>
      </tr>
    </thead>
    <tbody>
      @forelse($sponsors as $sponsor)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $sponsor->nom }}</td>
          <td>{{ $sponsor->promoteur }}</td>
          <td>{{ $sponsor->description }}</td>
          <td>
            @if ($sponsor->logo)
              <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo" width="60" height="60">
            @else
              <span class="text-muted">Non fourni</span>
            @endif
          </td>
          <td>{{ $sponsor->evenement->nom ?? 'Non spécifié' }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">Aucun sponsor trouvé.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</body>
</html>