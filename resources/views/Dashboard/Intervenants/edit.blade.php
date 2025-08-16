<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
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

        .btn-primary {
            box-shadow: 0 3px 6px rgba(0, 123, 255, 0.3);
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert-danger {
            border-left: 5px solid #dc3545;
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container mt-5 pt-5">
    <h1 class="mb-4">Modifier un intervenant</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('intervenants.update', $intervenant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $intervenant->nom) }}" required>
        </div>
        <div class="mb-3">
            <label for="fonction" class="form-label">Fonction</label>
            <input type="text" class="form-control" id="fonction" name="fonction" value="{{ old('fonction', $intervenant->fonction) }}" required>
        </div>
        <div class="mb-3">
            <label for="biographie" class="form-label">Biographie</label>
            <textarea class="form-control" id="biographie" name="biographie" rows="5" required>{{ old('biographie', $intervenant->biographie) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="theme" class="form-label">Thème</label>
            <input type="text" class="form-control" id="theme" name="theme" value="{{ old('theme', $intervenant->theme) }}">
        </div>
        <div class="mb-3">
            <label for="evenement_id" class="form-label">Événement associé</label>
            <select class="form-control" id="evenement_id" name="evenement_id">
                <option value="">Sélectionner un événement</option>
                @foreach($evenements as $evenement)
                    <option value="{{ $evenement->id }}" {{ $intervenant->evenement_id == $evenement->id ? 'selected' : '' }}>
                        {{ $evenement->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image actuelle</label><br>
            @if($intervenant->image)
                <img src="{{ $intervenant->image }}" alt="Image actuelle" class="img-thumbnail" style="width: 150px;">
            @else
                <p>Aucune image</p>
            @endif
            <input type="file" class="form-control mt-2" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="whatsapp" class="form-label">Lien WhatsApp</label>
            <input type="url" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $intervenant->whatsapp) }}">
        </div>
        <div class="mb-3">
            <label for="facebook" class="form-label">Lien Facebook</label>
            <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $intervenant->facebook) }}">
        </div>
        <div class="mb-3">
            <label for="instagram" class="form-label">Lien Instagram</label>
            <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $intervenant->instagram) }}">
        </div>
        <div class="mb-3">
            <label for="tiktok" class="form-label">Lien TikTok</label>
            <input type="url" class="form-control" id="tiktok" name="tiktok" value="{{ old('tiktok', $intervenant->tiktok) }}">
        </div>
        <div class="mb-3">
            <label for="linkedln" class="form-label">Lien LinkedIn</label>
            <input type="url" class="form-control" id="linkedln" name="linkedln" value="{{ old('linkedln', $intervenant->linkedln) }}">
        </div>
        <div class="mb-3">
            <label for="snapchat" class="form-label">Lien Snapchat</label>
            <input type="url" class="form-control" id="snapchat" name="snapchat" value="{{ old('snapchat', $intervenant->snapchat) }}">
        </div>
        <div class="mb-3">
            <label for="x" class="form-label">Lien X</label>
            <input type="url" class="form-control" id="x" name="x" value="{{ old('x', $intervenant->x) }}">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('intervenants.index') }}" class="btn btn-secondary">Annuler</a>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
