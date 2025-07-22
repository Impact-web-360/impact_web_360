<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ isset($categorie) ? 'Modifier' : 'Nouvelle' }} Catégorie</h1>
@if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
<form action="{{ isset($categorie) ? route('dashboard.categories.update',$categorie) : route('dashboard.categories.store') }}" method="POST">
  @csrf
  @if(isset($categorie)) @method('PUT') @endif
  <div class="mb-3">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" value="{{ old('nom',$categorie->nom ?? '') }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" name="description" rows="3">{{ old('description',$categorie->description ?? '') }}</textarea>
  </div>
  <button class="btn btn-success">Enregistrer</button>
  <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary">Annuler</a>
</form>
</body>
</html>