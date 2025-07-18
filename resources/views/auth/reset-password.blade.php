<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Réinitialiser le mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="col-md-5 mx-auto">
        <h4 class="mb-3">Créer un nouveau mot de passe</h4>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Nouveau mot de passe</label>
                <input type="password" class="form-control" name="password" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Confirmer mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <button class="btn btn-success w-100">Réinitialiser</button>
        </form>
    </div>
</div>
</body>
</html>