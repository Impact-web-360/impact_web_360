<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Formation</title>
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

        .btn-danger { /* Changed to danger for consistency with add button */
            box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3); /* Adjust shadow for red button */
            transition: background-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #bd2130; /* Darker red on hover */
        }

        .alert-danger {
            border-left: 5px solid #dc3545;
            font-weight: 500;
        }

        .form-text {
            font-size: 0.9rem;
        }

        .current-image, .current-avatar {
            border: 2px solid #ddd;
            border-radius: 5px;
            object-fit: cover; /* Assure que l'image remplit l'espace sans distorsion */
        }
        .current-avatar {
            border-radius: 50%; /* Pour un avatar rond */
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

        <h4 class="mb-3 text-dark">Informations Générales</h4>
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
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $formation->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image de la Formation</label>
            @if ($formation->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $formation->image) }}" alt="Image actuelle" class="current-image" style="max-width: 200px; height: auto;">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="clear_image" id="clear_image">
                        <label class="form-check-label text-secondary" for="clear_image">Supprimer l'image actuelle</label>
                    </div>
                </div>
            @endif
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <div class="form-text text-secondary">Laissez vide pour conserver l'image actuelle. Taille max : 2MB. Formats : JPG, PNG, GIF, SVG.</div>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix (FCFA)</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price"
                   value="{{ old('price', $formation->price) }}" required>
        </div>

        <hr class="my-4">
        <h4 class="mb-3 text-dark">Informations sur le Mentor</h4>

        <div class="mb-3">
            <label for="mentor" class="form-label">Nom du Mentor</label>
            <input type="text" class="form-control" id="mentor" name="mentor"
                   value="{{ old('mentor', $formation->mentor) }}" required>
        </div>
        <div class="mb-3">
            <label for="mentor_title" class="form-label">Titre du Mentor</label>
            <input type="text" class="form-control" id="mentor_title" name="mentor_title"
                   value="{{ old('mentor_title', $formation->mentor_title) }}">
        </div>
        <div class="mb-3">
            <label for="mentor_avatar" class="form-label">Avatar du Mentor</label>
            @if ($formation->mentor_avatar)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $formation->mentor_avatar) }}" alt="Avatar actuel" class="current-avatar" style="width: 80px; height: 80px;">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="clear_mentor_avatar" id="clear_mentor_avatar">
                        <label class="form-check-label text-secondary" for="clear_mentor_avatar">Supprimer l'avatar actuel</label>
                    </div>
                </div>
            @endif
            <input type="file" class="form-control" id="mentor_avatar" name="mentor_avatar" accept="image/*">
            <div class="form-text text-secondary">Laissez vide pour conserver l'avatar actuel. Taille max : 2MB. Formats : JPG, PNG, GIF, SVG.</div>
        </div>
        
        <div class="mb-3">
            <label for="mentor_bio" class="form-label">Biographie du Mentor</label>
            <textarea class="form-control" id="mentor_bio" name="mentor_bio" rows="3">{{ old('mentor_bio', $formation->mentor_bio) }}</textarea>
        </div>

        <hr class="my-4">
        <h4 class="mb-3 text-dark">Objectifs de la Formation</h4>
        <div id="objectives-container">
            @php
                // Utilisez $formation->objectives directement car il est casté en tableau
                $currentObjectives = old('objectives', $formation->objectives ?? []);
            @endphp
            @if(count($currentObjectives) > 0)
                @foreach($currentObjectives as $objective)
                    <div class="input-group mb-2">
                        <input type="text" name="objectives[]" class="form-control" value="{{ $objective }}" placeholder="Ajouter un objectif">
                        <button type="button" class="btn btn-outline-danger remove-objective-field"><i class="fas fa-minus"></i></button>
                    </div>
                @endforeach
            @else
                <div class="input-group mb-2">
                    <input type="text" name="objectives[]" class="form-control" placeholder="Ajouter un objectif">
                    <button type="button" class="btn btn-outline-danger remove-objective-field"><i class="fas fa-minus"></i></button>
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-info btn-sm mb-3" id="add-objective-field"><i class="fas fa-plus"></i> Ajouter un objectif</button>

        <hr class="my-4">
        <h4 class="mb-3 text-dark">Outils Utilisés</h4>
        <div id="tools-container">
            @php
                // Utilisez $formation->tools directement car il est casté en tableau
                $currentTools = old('tools', $formation->tools ?? []);
            @endphp
            @if(count($currentTools) > 0)
                @foreach($currentTools as $tool)
                    <div class="input-group mb-2">
                        <input type="text" name="tools[]" class="form-control" value="{{ $tool }}" placeholder="Ajouter un outil">
                        <button type="button" class="btn btn-outline-danger remove-tool-field"><i class="fas fa-minus"></i></button>
                    </div>
                @endforeach
            @else
                <div class="input-group mb-2">
                    <input type="text" name="tools[]" class="form-control" placeholder="Ajouter un outil">
                    <button type="button" class="btn btn-outline-danger remove-tool-field"><i class="fas fa-minus"></i></button>
                </div>
            @endif
        </div>
        <button type="button" class="btn btn-info btn-sm mb-3" id="add-tool-field"><i class="fas fa-plus"></i> Ajouter un outil</button>
        <br>
        <button type="submit" class="btn btn-danger mt-4">Mettre à Jour la Formation</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Dynamic fields for Objectives
    document.getElementById('add-objective-field').addEventListener('click', function() {
        const container = document.getElementById('objectives-container');
        const newField = document.createElement('div');
        newField.classList.add('input-group', 'mb-2');
        newField.innerHTML = `
            <input type="text" name="objectives[]" class="form-control" placeholder="Ajouter un objectif">
            <button type="button" class="btn btn-outline-danger remove-objective-field"><i class="fas fa-minus"></i></button>
        `;
        container.appendChild(newField);
    });

    document.getElementById('objectives-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-objective-field') || e.target.closest('.remove-objective-field')) {
            const button = e.target.closest('.remove-objective-field');
            // Ensure at least one field remains before removing, or clear its value
            if (this.querySelectorAll('.input-group').length > 1) {
                button.closest('.input-group').remove();
            } else {
                button.closest('.input-group').querySelector('input').value = ''; // Clear if it's the last one
            }
        }
    });

    // Dynamic fields for Tools
    document.getElementById('add-tool-field').addEventListener('click', function() {
        const container = document.getElementById('tools-container');
        const newField = document.createElement('div');
        newField.classList.add('input-group', 'mb-2');
        newField.innerHTML = `
            <input type="text" name="tools[]" class="form-control" placeholder="Ajouter un outil">
            <button type="button" class="btn btn-outline-danger remove-tool-field"><i class="fas fa-minus"></i></button>
        `;
        container.appendChild(newField);
    });

    document.getElementById('tools-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-tool-field') || e.target.closest('.remove-tool-field')) {
            const button = e.target.closest('.remove-tool-field');
            // Ensure at least one field remains before removing, or clear its value
            if (this.querySelectorAll('.input-group').length > 1) {
                button.closest('.input-group').remove();
            } else {
                button.closest('.input-group').querySelector('input').value = ''; // Clear if it's the last one
            }
        }
    });
</script>
</body>
</html>