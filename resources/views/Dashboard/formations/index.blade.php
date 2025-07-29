<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion des Formations</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* CSS personnalisé */
        body {
            background-color: #f8f9fa; /* fond clair gris */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            font-weight: 700;
            color: #343a40;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Espacement entre boutons dans la colonne actions */
        .actions-btn-group > * {
            margin-right: 5px;
        }

        /* Bouton "Ajouter" */
        .btn-primary {
            box-shadow: 0 3px 6px rgba(0, 123, 255, 0.3);
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Style alerte succès */
        .alert-success {
            font-weight: 600;
            border-left: 5px solid #28a745;
        }
    </style>
</head>
<body>
    <div class="container mt-5 p-4 bg-white rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestion des Formations</h2>
            <a href="{{ route('Dashboard.formations.create') }}" class="btn btn-danger">Ajouter une Formation</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Mentor</th>
                    <th>Prix</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($formations as $formation)
                    <tr>
                        <td>{{ $formation->id }}</td>
                        <td>{{ $formation->title }}</td>
                        <td>{{ $formation->categorie->name ?? 'N/A' }}</td>
                        <td>{{ $formation->mentor }}</td>
                        <td>${{ number_format($formation->price, 0, ',', '.') }}</td>
                        <td>{{ $formation->rating }}</td>
                        <td class="actions-btn-group">
                            <a href="{{ route('Dashboard.formations.edit', $formation->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('Dashboard.formations.destroy', $formation->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center fst-italic">Aucune formation trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
