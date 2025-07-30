<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Module</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa; /* fond clair */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
        }

        .form-container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        label {
            font-weight: 500;
        }

        .btn-danger { /* Cohérent avec votre thème */
            box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3);
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }

        .alert-danger {
            border-left: 5px solid #dc3545;
            font-weight: 500;
        }

        .form-text {
            font-size: 0.9rem;
        }

        .current-asset {
            background-color: #e9ecef;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9em;
            word-break: break-all; /* Pour les longues URLs/chemins */
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2 class="mb-4">Modifier le Module : {{ $module->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Dashboard.modules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h4 class="mb-3 text-dark">Informations Générales du Module</h4>
        <div class="mb-3">
            <label for="formation_id" class="form-label">Formation Associée</label>
            <select class="form-select" id="formation_id" name="formation_id" required>
                <option value="">Sélectionner une formation</option>
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}" {{ old('formation_id', $module->formation_id) == $formation->id ? 'selected' : '' }}>
                        {{ $formation->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titre du Module</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ old('title', $module->title) }}" required>
        </div>
        {{-- Le champ description a été retiré car il n'est pas dans la base de données --}}
        <div class="mb-3">
            <label for="duration" class="form-label">Durée du Module (en minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration"
                   value="{{ old('duration', $module->duration) }}" min="1">
            <div class="form-text text-secondary">Ex: 60 pour 1 heure.</div>
        </div>
        <div class="mb-3">
            <label for="order" class="form-label">Ordre du Module</label>
            <input type="number" class="form-control" id="order" name="order"
                   value="{{ old('order', $module->order) }}" min="0">
            <div class="form-text text-secondary">L'ordre d'apparition du module dans la formation.</div>
        </div>

        <hr class="my-4">
        <h4 class="mb-3 text-dark">Contenu du Module</h4>

        <div class="mb-3">
            <label for="video_path" class="form-label">Lien Vidéo du Module (URL)</label>
            @if ($module->video_path)
                <div class="mb-2">
                    <p class="mb-1 text-muted">Lien actuel :</p>
                    <div class="current-asset">
                        <a href="{{ $module->video_path }}" target="_blank" rel="noopener noreferrer">{{ $module->video_path }}</a>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="clear_video" id="clear_video" value="1">
                        <label class="form-check-label text-secondary" for="clear_video">Supprimer le lien vidéo actuel</label>
                    </div>
                </div>
            @endif
        </div>
        <div class="mb-3">
                    @csrf
                    <label for="video_path" class="form-label text-dark">Vidéo à Télécharger </label>
                    <input type="file" class="form-control" name="video_path" accept="video/mp4,video/mov,video/ogg,video/qt" >
                    <div class="form-text text-secondary">Vidéo, etc. Taille max : 50MB.</div>
        </div>

        <div class="mb-3">
            <label for="file_path" class="form-label">Fichier à Télécharger (Optionnel)</label>
            @if ($module->file_path)
                <div class="mb-2">
                    <p class="mb-1 text-muted">Fichier actuel :</p>
                    <div class="current-asset">
                        <a href="{{ asset('storage/' . $module->file_path) }}" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-file-alt me-1"></i> {{ basename($module->file_path) }}
                        </a>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="clear_file" id="clear_file" value="1">
                        <label class="form-check-label text-secondary" for="clear_file">Supprimer le fichier actuel</label>
                    </div>
                </div>
            @endif
            <input type="file" class="form-control" id="file_path" name="file_path">
            <div class="form-text text-secondary">Laissez vide pour conserver l'actuel. Choisissez un fichier pour le remplacer. Taille max : 5MB.</div>
        </div>

        <button type="submit" class="btn btn-danger mt-4">Mettre à Jour le Module</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>