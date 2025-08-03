<h1>Nouveau message du formulaire de contact</h1>
<p><strong>Nom :</strong> {{ $formData['name'] }}</p>
<p><strong>Email :</strong> {{ $formData['email'] }}</p>
<p><strong>Sujet :</strong> {{ $formData['subject'] }}</p>
<hr>
<p><strong>Message :</strong></p>
<p>{{ $formData['message'] }}</p>