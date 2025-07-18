<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3 class="text-center">Connexion</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="password" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <button class="btn btn-primary w-100">Connexion</button>
                <br>
                <a href="{{ route('password.request') }}">Mp oublié</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>