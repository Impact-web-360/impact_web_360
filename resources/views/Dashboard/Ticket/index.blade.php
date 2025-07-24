<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($tickets as $ticket)
    <div>
        {{ $ticket->prenom }} - {{ $ticket->categorie }}
        <a href="{{ route('tickets.edit', $ticket) }}">Éditer</a>
        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </div>
@endforeach
</body>
</html>