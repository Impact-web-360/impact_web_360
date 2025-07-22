<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('formations.store') }}" method="POST">
    @csrf
    <input type="text" name="titre" placeholder="Titre"><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <select name="categorie_id">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
        @endforeach
    </select><br>
    <button type="submit">Créer</button>
</form>
</form>
</body>
</html>