<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $formation->titre }}</h1>
<p><strong>Catégorie:</strong> {{ $formation->categorie->nom ?? '-' }}</p>
@if($formation->image)
  <img src="{{ asset('storage/'.$formation->image) }}" alt="cover" class="img-fluid mb-3" style="max-height:250px;object-fit:cover;">
@endif
<p>{{ $formation->description }}</p>
<p><strong>Durée estimée:</strong> {{ $formation->duree_minutes ?? 'N/A' }} min</p>
<p><strong>Publication:</strong> {{ $formation->is_published ? 'Publiée' : 'Brouillon' }}</p>
<hr>
<h2>Modules</h2>
@include('dashboard.modules._list',['formation'=>$formation])
</body>
</html>