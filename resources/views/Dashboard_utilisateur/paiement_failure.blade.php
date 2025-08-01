<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Échoué</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }
        .container-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 700px;
            width: 100%;
        }
        .icon-failure {
            color: #dc3545; /* Couleur rouge pour l'échec */
            font-size: 60px;
            margin-bottom: 20px;
        }
        h1 {
            color: #e01b1b;
            margin-bottom: 15px;
            font-size: 2.5rem;
        }
        p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
            font-size: 1.1rem;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
        }
        .btn-retry {
            background-color: #6c757d; /* Gris pour le bouton de réessai */
            margin-left: 15px;
        }
        .btn-retry:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container-box">
        <i class="fas fa-times-circle icon-failure"></i>
        <h1>Paiement Échoué ou Annulé</h1>
        <p>
            Malheureusement, votre paiement n'a pas pu être complété. Cela peut être dû à diverses raisons :
            fonds insuffisants, annulation de la transaction, ou un problème technique.
        </p>
        <p>
            Veuillez vérifier les informations de votre méthode de paiement et réessayer.
            Si le problème persiste, n'hésitez pas à nous contacter.
        </p>
        @if (session('error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{ route('caisse', ['formationId' => request()->query('formation_id')]) }}" class="btn btn-custom btn-retry">Réessayer le paiement</a>
        <a href="{{ route('dashboard_utilisateur') }}" class="btn btn-custom">Retour au Tableau de Bord</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>