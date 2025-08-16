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
      max-width: 100%;
      height: auto;
    }
    @media (max-width: 768px) {
      h2 {
        font-size: 1.5rem;
      }
      .btn {
        font-size: 0.9rem;
      }
      td, th {
        font-size: 0.85rem;
      }
    }
  </style>
</head>
<body>

<button class="btn btn-danger mb-3 mt-3 ms-3" onclick="history.back()">
  <i class="fas fa-arrow-left"></i> Retour
</button>

<div class="container py-5">
  <h2 class="mb-5 text-white text-center fw-bold">Liste des Sponsors</h2>

  <div class="table-responsive">
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
                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo" width="60">
              @else
                <span class="text-muted">Non fourni</span>
              @endif
            </td>
            <td>{{ $sponsor->evenement ?? '—' }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center">Aucun sponsor trouvé.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
