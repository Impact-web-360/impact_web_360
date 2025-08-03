<h2>Paiement Monero pour {{ $formation->title }}</h2>

<p>Adresse : {{ $payment->monero_address }}</p>
<p>Montant : {{ $payment->amount_monero }} XMR</p>
<img src="{{ $qr_code_url }}" alt="QR Code">

<p>Statut : <span id="status">{{ ucfirst($payment->status) }}</span></p>

<button onclick="checkStatus()">Vérifier paiement</button>

<script>
function checkStatus() {
    fetch('{{ route('monero.payment.status', $payment->id) }}')
        .then(res => res.json())
        .then(data => {
            document.getElementById('status').innerText = data.status;
        });
}
</script>
