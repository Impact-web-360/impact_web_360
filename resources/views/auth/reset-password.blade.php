<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Réinitialiser le mot de passe</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
            font-size: 16px;
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

        .btn-primari {
            background-color: #ff2605;
            border: none;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            border-radius: 7px;
            transition: background-color 0.3s ease;
        }

        .btn-primari:hover {
            background-color: #e53218;
        }

        .form-text a {
            font-size: 0.85rem;
        }

        @media (max-width: 576px) {
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
        <h4 class="mb-5 text-center">Créer un nouveau mot de passe</h4>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}" />

            <div class="input-box mb-3">
                <input type="email" class="form-control" name="email" placeholder="Entrer votre adresse email" required />
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="input-box mb-3">
                <input type="password" class="form-control" name="password" placeholder="Nouveau mot de passe" required />
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="input-box mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required />
            </div>

            <button class="btn-primari w-100">Réinitialiser</button>
        </form>
    </div>
</body>

</html>