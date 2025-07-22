<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Catégories</h1>
  <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary">Ajouter</a>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<table class="table table-striped">
  <thead><tr><th>#</th><th>Nom</th><th>Formations</th><th></th></tr></thead>
  <tbody>
    @foreach($categories as $cat)
    <tr>
      <td>{{ $cat->id }}</td>
      <td>{{ $cat->nom }}</td>
      <td>{{ $cat->formations()->count() }}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.categories.edit',$cat) }}">Éditer</a>
        <form action="{{ route('dashboard.categories.destroy',$cat) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $categories->links() }}
</body>
</html>