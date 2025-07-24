<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Inscription</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #000;
      color: #fff;
    }

    .form-container {
      background-color: rgba(44, 44, 44, 0);
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
      padding: 20px;
      width: 100%;
      max-width: 400px;
    }

    .form-control {
      background-color: #222;
      color: #fff;
      border: none;
      padding: 10px 1rem;
    }

    .form-control::placeholder {
      color: #aaa;
    }

    .form-control:-webkit-autofill {
      -webkit-box-shadow: 0 0 0px 1000px #222 inset !important;
      -webkit-text-fill-color: #fff !important;
      caret-color: #fff;
      transition: background-color 5000s ease-in-out 0s;
    }

    .form-control:focus {
      background-color: #222;
      border: none;
      color: #fff;
    }

    .btn-primary {
      background-color: #ff2605;
      border: none;
      padding: 10px;
    }

    .btn-primary:hover {
      background-color: #e53218;
    }

    .logo-img {
      width: 100%;
      max-width: 300px;
      height: auto;
      margin-top: -110px;
      margin-bottom: -90px;
    }

    .form-text a {
      font-size: 0.85rem;
    }

    @media (max-width: 576px) {
      .logo-img {
        width: 90%;
        margin-top: -80px;
        margin-bottom: -40px;
      }

      .form-container {
        padding: 15px;
      }

      .form-text a {
        font-size: 0.8rem;
      }
    }
  </style>
</head>

<body>
  <div class="form-container">
    <div class="text-center">
      <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Logo Impact Web" class="logo-img">
    </div>
    <h2 class="text-center mb-4">Créer un compte</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-3">
        <input type="text" class="form-control" name="name" placeholder="Entrer votre nom" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="peterparker@gmail.com" required>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
      </div>
      <button class="btn btn-primary mt-3 mb-3 w-100">S'inscrire</button>
    </form>
    <div class="mt-2 text-center">
      Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-danger text-decoration-none">Se connecter</a>
    </div>
  </div>
</body>

</html>