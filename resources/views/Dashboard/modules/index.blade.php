<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion des Modules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        /* CSS personnalisé basé sur vos styles précédents */
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
        .btn-danger { /* Cohérent avec votre thème principal */
            box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3);
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #bd2130;
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
            <h2>Gestion des Modules</h2>
            <a href="{{ route('Dashboard.modules.create') }}" class="btn btn-danger">Ajouter un Module</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Titre du Module</th>
                    <th>Formation</th>
                    <th>Durée</th>
                    <th>Ordre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($modules as $module)
                    <tr>
                        <td>{{ $module->id }}</td>
                        <td>{{ $module->title }}</td>
                        <td>{{ $module->formation->title ?? 'N/A' }}</td> {{-- Accéder au titre de la formation parente --}}
                        <td>{{ $module->duration }}</td>
                        <td>{{ $module->order }}</td>
                        <td class="actions-btn-group">
                            <a href="{{ route('Dashboard.modules.edit', $module->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('Dashboard.modules.destroy', $module->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce module ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center fst-italic">Aucun module trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>