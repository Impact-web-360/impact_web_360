<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test Kkiapay Sandbox</title>
</head>
<body>
    <h1>Test Kkiapay Sandbox</h1>

    <p>Montant : 1000 FCFA</p>
    <button id="payBtn">Payer 1000 FCFA</button>

    <!-- Kkiapay Widget JS -->
    <script src="https://cdn.kkiapay.me/k.js"></script>

    <script>
    document.getElementById("payBtn").addEventListener("click", function() {
        openKkiapayWidget({
            amount: 1000, // Montant à payer en FCFA
            position: "center",
            sandbox: true, // true pour sandbox
            key: "{{ config('services.kkiapay.public') }}", // Ta clé publique
            callback: "{{ route('kkiapay.callback') }}" // Route Laravel callback
        });
    });
    </script>
</body>
</html>
