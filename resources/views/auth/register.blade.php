<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #000000;
      color: #fff;
    }
    
    .form-control {
      background-color: #222;
      color: #fff;
      border: none;
      padding: 10px;
    }
    
    .form-container {
      background-color: rgba(44, 44, 44, 0);
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);
      padding: 10px 30px;
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
    .google-btn, .facebook-btn {
      width: 100%;
      margin-bottom: 10px;
    }
    .form-section {
      width: 100%;
      max-width: 400px;
      text-align: left;
    }
    
    .logo-img {
      width: 60%;
      height: auto;
      margin-top: -90px;
      margin-bottom: -90px;
    }
    
    .divider {
      display: flex;
      align-items: center;
      text-align: center;
      color: #aaa;  
      margin: 10px 0;  
    }
    .divider::before, .divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background: #444;
    }
    .divider::before {
      margin-right: .5em;
    }
    .divider::after {
      margin-left: .5em;
    }
    .form-text a {
      font-size: 0.85rem;
    }
    @media(max-width: 768px) {
        .logo-img {
            width: 80%;
            margin-top: -60px;
            margin-bottom: -60px;
        }
      }
    </style>
</head>
<body>
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="form-container col-12 col-sm-10 col-md-8 col-lg-5">
            <div class="text-center">
                <img src="logo.png" alt="Logo Impact Web" class="logo-img">
            </div>
            <h4 class="text-center mb-3">Créer un compte</h4>
            <a href="{{ url('auth/google') }}" class="btn btn-dark google-btn">
                <i class="fab fa-google me-2"></i> Google
            </a>
            <button class="btn btn-dark facebook-btn">
                <i class="fab fa-facebook-f me-2"></i> Facebook
            </button>
            <div class="divider">Ou connectez-vous avec votre e-mail</div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="name" placeholder="Entrer votre nom" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="peterparker@dpop.site" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for=""> Confirmer mot de passe</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                </div>
                <button class="btn btn-primary w-100">S'inscrire</button>
            </form>
            <div class="mt-2 text-center">
                Vous avez déjà un compte ? <a href="connexion2.html" class="text-danger">Se connecter</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>