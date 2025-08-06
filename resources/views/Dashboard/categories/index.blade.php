<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        .actions-btn-group>* {
            margin-right: 5px;
        }

        .btn-primary {
            box-shadow: 0 3px 6px rgba(0, 123, 255, 0.3);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-success {
            font-weight: 600;
            border-left: 5px solid #28a745;
        }

        .container-box {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <button class="btn btn-danger mb-3 mt-3 ms-3" onclick="history.back()"><i class="fas fa-arrow-left"></i> Retour</button>
    <div class="container container-box">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestion des Catégories</h2>
            <a href="{{ route('Dashboard.categories.create') }}" class="btn btn-primary">Ajouter une Catégorie</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td>
                        <td>{{ $categorie->name }}</td>
                        <td>{{ $categorie->slug }}</td>
                        <td class="actions-btn-group">
                            <a href="{{ route('Dashboard.categories.edit', $categorie->id) }}"
                                class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('Dashboard.categories.destroy', $categorie->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center fst-italic">Aucune catégorie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>