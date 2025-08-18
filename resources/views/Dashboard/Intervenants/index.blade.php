<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion des Intervenants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Conteneur blanc avec ombre */
        .content-box {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        h2 {
            font-weight: 700;
            color: #343a40;
        }

        /* Bouton de retour stylisé */
        .btn-retour {
            background-color: #dc3545; /* Couleur rouge */
            border-color: #dc3545;
            color: white;
        }
        .btn-retour:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Tableau stylisé */
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #eef4ff;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        /* Boutons d'actions */
        .actions-btn-group > * {
            margin-right: 5px;
        }

        /* Alerte succès */
        .alert-success {
            font-weight: 600;
            border-left: 5px solid #28a745;
        }
        
    </style>
</head>
<body>
<a href="{{ route('admin.dashboard') }}"><button class="btn btn-danger mb-3 mt-3 ms-3"><i class="fas fa-arrow-left"></i> Retour</button></a>
<div class="container content-box">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestion des Intervenants</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Fonction</th>
                    <th>Événement</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($intervenants as $intervenant)
                <tr>
                    <td>{{ $intervenant->nom }}</td>
                    <td>{{ $intervenant->fonction }}</td>
                    <td>
                        @if($intervenant->evenement)
                            {{ $intervenant->evenement->nom }}
                        @else
                            <span class="text-muted fst-italic">Aucun</span>
                        @endif
                    </td>
                    <td class="actions-btn-group text-center">
                        <a href="{{ route('intervenants.edit', $intervenant->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('intervenants.destroy', $intervenant->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet intervenant ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>