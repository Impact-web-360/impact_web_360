<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('modules.store') }}" method="POST">
    @csrf
    <input type="text" name="titre" placeholder="Titre du module"><br>
    <textarea name="contenu" placeholder="Texte du module"></textarea><br>
    <input type="text" name="video" placeholder="Lien vidéo (YouTube, etc.)"><br>
    <select name="formation_id">
        @foreach($formations as $formation)
            <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
        @endforeach
    </select><br>
    <button type="submit">Créer Module</button>
</form>
</body>
</html>