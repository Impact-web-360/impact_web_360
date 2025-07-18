<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mot de passe oublié</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="col-md-5 mx-auto">
        <h4 class="mb-3">Réinitialiser le mot de passe</h4>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button class="btn btn-primary w-100">Envoyer le lien</button>
        </form>
    </div>
</div>
</body>
</html>