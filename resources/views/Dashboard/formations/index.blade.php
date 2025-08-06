<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion des Formations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            font-weight: 700;
            color: #343a40;
        }

        /* Conteneur blanc avec ombre */
        .content-box {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        /* Tableau stylisé */
        table {
            font-size: 0.9rem;
        }
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
        .table-hover tbody tr:hover {
            background-color: #eef4ff;
        }

        /* Avatar mentor */
        .table-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        /* Liste compacte */
        .compact-list {
            font-size: 0.85em;
            max-height: 60px;
            overflow-y: auto;
            padding-left: 15px;
            margin-bottom: 0;
        }
        .compact-list li {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Boutons actions */
        .actions-btn-group > * {
            margin-right: 5px;
        }

        .btn-primary {
            box-shadow: 0 3px 6px rgba(0, 123, 255, 0.3);
        }

        /* Alerte succès */
        .alert-success {
            font-weight: 600;
            border-left: 5px solid #28a745;
        }

        /* Responsive table */
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
<button class="btn btn-danger mb-3 mt-3 ms-3" onclick="history.back()"><i class="fas fa-arrow-left"></i> Retour</button>
<div class="container content-box">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestion des Formations</h2>
        <a href="{{ route('Dashboard.formations.create') }}" class="btn btn-danger">➕ Ajouter une Formation</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Mentor</th>
                    <th>Titre Mentor</th>
                    <th>Avatar Mentor</th>
                    <th>Objectifs</th>
                    <th>Outils</th>
                    <th>Vidéos</th>
                    <th>Prix</th>
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
                        <td>{{ $formation->mentor_title ?? 'N/A' }}</td>
                        <td>
                            @if ($formation->mentor_avatar)
                                <img src="{{ asset('storage/' . $formation->mentor_avatar) }}" alt="Avatar" class="table-avatar">
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if ($formation->objectives && count($formation->objectives) > 0)
                                <ul class="compact-list">
                                    @foreach ($formation->objectives as $objective)
                                        <li>{{ $objective }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if ($formation->tools && count($formation->tools) > 0)
                                <ul class="compact-list">
                                    @foreach ($formation->tools as $tool)
                                        <li>{{ $tool }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $formation->total_videos ?? 0 }}</td>
                        <td>{{ number_format($formation->price, 0, ',', '.') }}FCFA</td>
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
                        <td colspan="14" class="text-center fst-italic">Aucune formation trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
    AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
