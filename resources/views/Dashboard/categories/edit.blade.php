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

<div class="container form-container">
    <h2 class="mb-4">Modifier la Catégorie : {{ $categorie->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Dashboard.categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Indique que c'est une requête PUT pour la mise à jour --}}
        
        <div class="mb-3">
            <label for="name" class="form-label">Nom de la Catégorie</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', $categorie->name) }}" required>
        </div>

        <button type="submit" class="btn btn-danger">Mettre à Jour la Catégorie</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
