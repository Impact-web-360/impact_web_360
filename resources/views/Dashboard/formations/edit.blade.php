<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .form-text {
            font-size: 0.9rem;
        }

        img {
            border: 2px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2 class="mb-4">Modifier la Formation : {{ $formation->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Dashboard.formations.update', $formation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titre de la Formation</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ old('title', $formation->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('category_id', $formation->category_id) == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mentor" class="form-label">Nom du Mentor</label>
            <input type="text" class="form-control" id="mentor" name="mentor"
                   value="{{ old('mentor', $formation->mentor) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $formation->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image de la Formation</label>
            @if ($formation->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $formation->image) }}" alt="Image actuelle" style="max-width: 200px; height: auto;">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="clear_image" id="clear_image">
                        <label class="form-check-label text-secondary" for="clear_image">Supprimer l'image actuelle</label>
                    </div>
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <div class="form-text text-secondary">Laissez vide pour conserver l'image actuelle. Taille max : 2MB.</div>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix ($)</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price"
                   value="{{ old('price', $formation->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Note (sur 5)</label>
            <input type="number" step="0.1" min="0" max="5" class="form-control" id="rating" name="rating"
                   value="{{ old('rating', $formation->rating) }}">
            <div class="form-text text-secondary">Ex: 4.5</div>
        </div>

        <button type="submit" class="btn btn-danger">Mettre à Jour la Formation</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
