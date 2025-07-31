<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Initié</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }
        .container-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
        }
        .icon-success {
            color: #28a745;
            font-size: 60px;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
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
    </style>
</head>
<body>
    <div class="container-box">
        <i class="fas fa-check-circle icon-success"></i>
        <h1>Paiement Initié avec Succès !</h1>
        <p>
            Votre demande de paiement a bien été reçue par Fedapay.
            Nous attendons la confirmation finale de leur part. Cela peut prendre quelques instants.
            Une fois le paiement entièrement confirmé, votre accès à la formation sera activé.
        </p>
        <p>
            Veuillez ne pas fermer cette page tout de suite si vous êtes toujours sur le processus de paiement Fedapay.
            Vous recevrez un email de confirmation dès que votre accès sera disponible.
        </p>
        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('dashboard_utilisateur') }}" class="btn btn-custom">Retour au Tableau de Bord</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>