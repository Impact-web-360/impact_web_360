<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billet Électronique</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50; /* Bleu foncé, presque noir */
            --secondary-color: #3498db; /* Bleu vif */
            --background-color: #ecf0f1; /* Gris clair */
            --card-background: #ffffff;
            --text-color-dark: #2d3436;
            --shadow-light: 0 4px 15px rgba(0, 0, 0, 0.08);
            --border-radius-large: 15px;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color-dark);
            margin: 0;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }

        .billet-container {
            background-color: var(--card-background);
            border-radius: var(--border-radius-large);
            box-shadow: var(--shadow-light);
            padding: 30px 40px;
            max-width: 400px;
            margin: 0 auto;
            width: 100%;
            border: 1px solid #e0e6e9;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .billet-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        .header-section {
            padding-bottom: 20px;
            border-bottom: 2px dashed #e0e6e9;
            margin-bottom: 20px;
        }

        .header-section h2 {
            font-size: 1.8em;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0 0 5px 0;
        }
        
        .header-section .event-name {
            font-size: 1.1em;
            font-weight: 500;
            color: #ff4500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
        }

        .details-section {
            text-align: left;
            margin-bottom: 25px;
        }

        .details-section p {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            margin: 0;
            border-bottom: 1px solid #f0f4f7;
            font-size: 0.95em;
        }

        .details-section p:last-child {
            border-bottom: none;
        }

        .details-section p strong {
            color: var(--primary-color);
            font-weight: 500;
        }

        .qr-code-section {
            padding-top: 20px;
        }

        .qr-code-section p {
            margin-bottom: 15px;
            font-size: 0.9em;
            color: #7f8c8d;
        }
        
        .qr-code-section img, .qr-code-section svg {
            max-width: 100%;
            height: auto;
            display: block;
            margin: auto;
        }

        @media (max-width: 480px) {
            .billet-container {
                padding: 25px;
                border-radius: 10px;
            }
            .header-section h2 {
                font-size: 1.6em;
            }
            .header-section .event-name {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="billet-container">
        <div class="header-section">
            <h2>Billet Électronique</h2>
            <p class="event-name">{{ $evenement->nom }}</p>
        </div>
        
        <div class="details-section">
            <p><strong>Nom & Prénom :</strong> <span>{{ $step1['prenom'] }} {{ $step1['nom'] }}</span></p>
            <p><strong>Email :</strong> <span>{{ $step1['email'] }}</span></p>
            <p><strong>Téléphone :</strong> <span>{{ $step1['telephone'] }}</span></p>
            <p><strong>Catégorie :</strong> <span>{{ $step2['categorie'] }}</span></p>
            <p><strong>Prix :</strong> <span>{{ intval($step2['prix']) }} FCFA</span></p>
        </div>

        <div class="qr-code-section">
            <p>Scannez ce code pour valider votre billet.</p>
            {!! QrCode::size(150)->generate($qrData) !!}
        </div>
    </div>
</body>
</html>