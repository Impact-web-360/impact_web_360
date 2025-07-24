<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000000;
            color: #fff;
            padding: 20px;
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
            margin-top: -80px;
            margin-bottom: -40px;
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

            .btn-primary {
                padding: 10px 6px;
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
        <h4 class="text-center mb-4">Connectez-vous à votre compte</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="peterparker@gmail.com" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                <div class="text-end mt-2">
                    <a href="{{ route('password.request') }}" class="text-decoration-none text-danger">Mot de passe oublié ?</a>
                </div>
            </div>
            <button class="btn btn-primary w-100 mb-3">Connexion</button>
            <div class="text-center">
                <p class="">Pas encore de compte ? <a href="{{ route('register') }}" class="text-decoration-none text-danger">S'inscrire</a></p>
            </div>
        </form>
    </div>
</body>

</html>