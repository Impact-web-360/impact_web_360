<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire Multi-étapes Modal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .step { display: none; }
    .step.active { display: block; }
    .progress-bar { height: 8px; background-color: #4CAF50; transition: width 0.3s; }
    .btn-container { display: flex; justify-content: space-between; margin-top: 20px; }
    .form-group { margin-bottom: 15px; }
    input[type="text"], input[type="email"], input[type="url"], select {
      width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;
    }
  </style>
</head>
<body class="p-4">

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#multiStepModal">Ouvrir le Formulaire</button>

<div class="modal fade" id="multiStepModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-4">
      <h4 class="mb-3">Formulaire Multi-Étapes</h4>

      <div class="progress mb-4">
        <div class="progress-bar" id="progressBar" style="width: 0%;"></div>
      </div>

      <!-- Étape 1: Événement -->
      <form class="step active" data-action="{{ route('evenements.store') }}" id="formStep1">
        <h5>Événement</h5>
        <div class="form-group">
          <label>Nom de l'événement</label>
          <input type="text" name="nom_evenement" required>
        </div>
        <div class="form-group">
          <label>Date</label>
          <input type="date" name="date_evenement" required>
        </div>
        <div class="form-group">
          <label>Heure</label>
          <input type="time" name="heure_evenement" required>
        </div>
      </form>

      <!-- Étape 2: Sponsor -->
      <form class="step" data-action="{{ route('sponsors.store') }}" id="formStep2">
        <h5>Sponsor</h5>
        <div class="form-group">
          <label>Nom du sponsor</label>
          <input type="text" name="nom_sponsor" required>
        </div>
        <div class="form-group">
          <label>Logo (URL)</label>
          <input type="url" name="logo_sponsor">
        </div>
      </form>

      <!-- Étape 3: Participant + Réseaux -->
      <form class="step" data-action="" id="formStep3">
        <h5>Participant</h5>
        <div class="form-group">
          <label>Nom</label>
          <input type="text" name="nom_participant" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email_participant" required>
        </div>

        <h6 class="mt-3">Réseaux sociaux</h6>
        <div class="form-group">
          <label>Facebook</label>
          <input type="url" name="reseaux[facebook]">
        </div>
        <div class="form-group">
          <label>Twitter</label>
          <input type="url" name="reseaux[twitter]">
        </div>
        <div class="form-group">
          <label>Instagram</label>
          <input type="url" name="reseaux[instagram]">
        </div>
      </form>

      <!-- Boutons de navigation -->
      <div class="btn-container mt-4">
        <button class="btn btn-secondary" id="prevBtn" style="display: none;">Précédent</button>
        <button class="btn btn-success" id="nextBtn">Suivant</button>
        <button class="btn btn-primari" id="submitBtn" style="display: none;">Soumettre</button>
      </div>

      <!-- Résumé final -->
      <div id="finalMessage" class="mt-4 text-success fw-bold" style="display: none;">
        🎉 Tous les formulaires ont été soumis avec succès !
      </div>
    </div>
  </div>
</div>

<script>
  const forms = document.querySelectorAll(".step");
  const progressBar = document.getElementById("progressBar");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");
  const submitBtn = document.getElementById("submitBtn");
  const finalMessage = document.getElementById("finalMessage");
  let currentStep = 0;

  function showStep(step) {
    forms.forEach((form, index) => {
      form.classList.toggle("active", index === step);
    });
    prevBtn.style.display = step === 0 ? "none" : "inline-block";
    nextBtn.style.display = step === forms.length - 1 ? "none" : "inline-block";
    submitBtn.style.display = step === forms.length - 1 ? "inline-block" : "none";
    progressBar.style.width = ((step + 1) / forms.length) * 100 + "%";
  }

  prevBtn.onclick = () => {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  };

  nextBtn.onclick = () => {
    const form = forms[currentStep];
    const action = form.dataset.action;
    const data = new FormData(form);

    fetch(action, {
      method: "POST",
      headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' },
      body: data
    })
    .then(response => response.json())
    .then(result => {
      if (result.success) {
        currentStep++;
        showStep(currentStep);
      } else {
        alert("Erreur : " + (result.message || "vérifiez les champs."));
      }
    })
    .catch(() => alert("Erreur serveur."));
  };

  submitBtn.onclick = () => {
    const form = forms[currentStep];
    const action = form.dataset.action;
    const data = new FormData(form);

    fetch(action, {
      method: "POST",
      headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' },
      body: data
    })
    .then(response => response.json())
    .then(result => {
      if (result.success) {
        finalMessage.style.display = "block";
        submitBtn.disabled = true;
        nextBtn.disabled = true;
      } else {
        alert("Erreur lors de la soumission.");
      }
    })
    .catch(() => alert("Erreur serveur."));
  };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
