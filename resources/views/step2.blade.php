<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Impact Web 360 - Réservation de siège</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #0e0e12;
      color: white;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar-custom {
      background-color: #000066;
      border-radius: 15px;
      margin-top: 20px;
      padding: 10px 20px;
      height: 70px;
    }

    .navbar-brand img {
      max-height: 160px;
      width: auto;
    }

    .btn-inscrire {
      background: linear-gradient(90deg, #ff4d00, #ff3300);
      color: white;
      border: none;
      border-radius: 8px;
    }

    .btn-inscrire:hover {
      background: linear-gradient(90deg, #e63c00, #cc2900);
    }

    .btn-outline-light {
      border-radius: 8px;
    }

    .form-section {
      background-color: white;
      border-radius: 1rem;
      padding: 2rem;
      color: black;
      margin-top: 2rem;
    }

    .btn-orange {
      background-color: #ff2d0a;
      color: white;
      border-radius: 20px;
    }

    .ticket {
      background: #ff3300;
      color: white;
      border-radius: 1rem;
      margin-top: 2rem;
      flex-wrap: wrap;
      text-align: center;
      gap: 1rem;
    }

    .ticket .d-flex>div {
      flex: 1 1 30%;
      min-width: 100px;
    }

    .ticket img {
      max-width: 100%;
      height: auto;
    }

    .ticket-header {
      background-color: #000066;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      padding: 1rem;
    }

    .step-nav {
      background-color: #f8f9fa;
      padding: 1rem;
      border-radius: 1rem;
      font-weight: 500;
      font-size: 16px;
      flex-wrap: wrap;
      overflow-x: auto;
    }

    .step-container {
      white-space: nowrap;
      font-weight: 500;
      font-size: 16px;
      display: inline-block;
    }

    .seat-map {
      background: white;
      color: black;
      border-radius: 20px;
      padding: 2rem;
      margin-top: 1rem;
      text-align: center;
    }

    .seat-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(40px, 1fr));
      gap: 10px;
      justify-items: center;
    }

    .seat {
      width: 45px;
      height: 45px;
      background: #f0f0f0;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 500;
      cursor: pointer;
    }

    .seat.reserved {
      background: #999;
      cursor: not-allowed;
    }

    .seat.selected {
      background: #007bff;
      color: white;
    }

    .btn-suivant {
      margin-top: 40px;
      margin-bottom: 150px;
      background: #ff3d00;
      color: white;
      border-radius: 30px;
      padding: 10px 50px;
      font-weight: bold;
      font-size: 16px;
    }

    .btn-suivant:hover {
      background: #cc2900;
    }

    .footer {
      background-color: #000066;
      color: #ccccff;
    }

    .footer-links a {
      color: #ccccff;
      text-decoration: none;
      display: block;
      margin-bottom: 0.5rem;
      transition: all 0.3s ease;
    }

    .footer-links a:hover {
      color: #ff4500;
      padding-left: 4px;
    }

    .social-icon {
      display: inline-block;
      background-color: #ff4500;
      color: white;
      width: 36px;
      height: 36px;
      text-align: center;
      line-height: 36px;
      border-radius: 50%;
      margin: 0 5px;
      font-size: 16px;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .social-icon:hover {
      transform: scale(1.1);
      background-color: #cc3700;
    }

    @media (max-width: 976px) {
      .navbar-brand img {
        margin-top: -65px;
        max-height: 180px;
        margin-left: -30px;
      }

      .navbar-brand {
        max-height: 50px;
      }

      .navbar-custom {
        margin-top: 10px;
        border-radius: 15px;
        width: 100vw;
      }

      .img-fluid {
        margin-top: -60px;
        margin-bottom: -60px;
      }

      .product-card {
        margin-top: 30px;
      }

      .yes {
        margin-bottom: 10px;
      }

      .yes2 {
        margin-top: 10px;
      }

      .newsletter-section input[type="email"],
      .newsletter-section button {
        width: 90%;
      }

      #navbarNav {
        background-color: rgb(0, 0, 102);
        width: 100%;
        padding: 40px;
        position: absolute;
        top: 59px;
        left: 0;
        z-index: 999;
        text-align: left;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
      }

      #navbarNav .nav-link {
        text-align: left;
        font-size: 22px;
        margin-top: 10px;
      }

      #navbarNav .btn {
        margin-top: 50px;
        width: 100%;
      }

      #navbarNav .btn-inscrire {
        margin: 8px;
        text-align: center;
      }

      .hamburger {
        width: 30px;
        height: 22px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        cursor: pointer;
        z-index: 1001;
        border: none;
      }

      .hamburger span {
        height: 3px;
        background-color: white;
        border-radius: 2px;
        transition: all 0.4s ease;
        border: none;
      }

      .navbar-toggler {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        outline: none !important;
      }


      /* Animation croix */
      .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
      }

      .hamburger.active span:nth-child(2) {
        opacity: 0;
      }

      .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(8px, -9px);
      }

      /* Supprimer styles Bootstrap par défaut */
      .navbar-toggler-icon {
        background-image: none !important;
      }
    }

    @media (max-width: 576px) {
      .step-nav {
        font-size: 14px;
        line-height: 1.8;
      }

      .legend{
        font-size: 14px;
      }

      .step-nav span {
        display: inline-block;
        margin: 2px 5px;
      }

      .step-container {
        font-size: 14px;
      }

      .step-nav::-webkit-scrollbar {
        display: none;
        /* Optionnel : cache la barre de scroll */
      }
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom container">
    <a class="navbar-brand" href="index.php"><img src="logo.png" alt="Logo Impact Web" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <div class="hamburger" id="hamburgerBtn">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="evenement.php">Événements</a></li>
        <li class="nav-item"><a class="nav-link" href="#">E-learning</a></li>
        <li class="nav-item"><a class="nav-link" href="intervenant.php">Intervenants</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Billetterie</a></li>
        <li class="nav-item"><a class="nav-link" href="boutique.php">Boutique</a></li>
        <li class="nav-item"><a class="btn btn-light mx-2" href="connexion.html">Se connecter</a></li>
        <li class="nav-item"><a class="btn btn-inscrire" href="inscription.html">S'inscrire</a></li>
      </ul>
    </div>
  </nav>

  <div class="container" style="margin-top: 150px;">
    <div class="ticket text-center animate__animated animate__fadeIn">
      <div class="ticket-header p-3">
        <img src="log.png" alt="Logo">
        <h5>Impact Web 360 – Édition 2025</h5>
        <div class="text-end"><strong></strong></div>
      </div>
      <div class="d-flex justify-content-center align-items-center p-3">
        <div>
          <h5>Date et heure</h5>
          <h6></h6>
          <p></p>
        </div>
        <div class="align-self-center">
          <img
            src="https://api.qrserver.com/v1/create-qr-code/?data=ImpactWeb360-2025&size=100x100&bgcolor=255-51-0&color=255-255-255"
            alt="QR Code">
        </div>
        <div>
          <h5>Lieu</h5>
          <h5></h5>
          <p></p>
        </div>
      </div>
    </div>

    <div class="step-nav mt-5 text-dark text-center">
      <div class="step-container d-flex justify-content-center align-items-center flex-wrap gap-2">

        <!-- Étape 1 -->
        <span>
          <a href="{{ route('step1') }}" class="text-decoration-none">
            <span class="d-none d-md-inline text-dark">Informations</span>
            <span class="d-inline d-md-none step-icon"><i class="fa-regular fa-user text-dark"></i></span>
          </a>
        </span>

        <span class="mx-2 text-muted">&gt;</span>

        <!-- Étape 2 -->
        <span>
          <a href="{{ route('step2') }}" class="text-decoration-none">
            <span class="d-none d-md-inline fw-bold text-primary">Réservation de siège</span>
            <span class="d-inline d-md-none step-icon"><i class="fa-solid fa-couch"></i></span>
          </a>
        </span>

        <span class="mx-2 text-muted">&gt;</span>

        <!-- Étape 3 -->
        <span>
          <a href="{{ route('step3') }}" class="text-decoration-none">
            <span class="d-none d-md-inline text-dark">Confirmation</span>
            <span class="d-inline d-md-none step-icon text-reset"><i class="fa-regular fa-circle-check text-dark"></i></span>
          </a>
        </span>

        <span class="mx-2 text-muted">&gt;</span>

        <!-- Étape 4 (non cliquable) -->
        <span>
          <span>
            <span class="d-none d-md-inline text-dark">Paiement</span>
            <span class="d-inline d-md-none step-icon"><i class="bi bi-credit-card"></i></span>
          </span>
        </span>

      </div>
    </div>


    <form action="{{ route('step2.post') }}" method="POST" onsubmit="">
      @csrf
      <div class="seat-map shadow">
        <h4>Choisissez votre catégorie</h4>
        <div class=" mt-3" id="grid">
          <p> -----------------------------------------</p>
          <p> □□□□□ Scène □□□□□ </p>
          <p> -----------------------------------------</p>
          <p> 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨</p>
          <p> 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 🟨 ← VIP</p>
          <p> -----------------------------------------</p>
          <p> 🟩 🟩 🟩 🟩 🟩 🟩 ← Étudiants</p>
          <p> 🟩 🟩 🟩 🟩 🟩 🟩 🟩 🟩 🟩 </p>
          <p> ----------------------------------------- </p>
          <p> 🟦 🟦 🟦 🟩 🟩 </p>
          <p> 🟦 🟦 🟦 🟩 🟩 </p>
          <p> 🟦 🟦 🟦 🟩 🟩 </p>
          <p> 🟦 🟦 🟦 🟩 🟩 </p>
          <p> 🟦 🟦 🟦 🟩 🟩 </p>
          <p> 🟦 🟦 🟦 🟩 🟩 </p>
          <p> ----------------------------------------- </p>
          <center>
            <h4>Légende</h4>
          </center>
          <center>
            <div class="d-flex mt-3 justify-content-center legend">
              <div class="me-2">
                <label for="" class="fw-bold fs-7">🟨 VIP</label>
                <input type="radio" name="categorie" value="VIP">
              </div>
              <div class="me-2">
                <label for="" class="fw-bold fs-7">🟩 Étudiants</label>
                <input type="radio" name="categorie" value="Etudiant">
              </div>
              <div class="me-2">
                <label for="" class="fw-bold fs-7">🟦 Participants</label>
                <input type="radio" name="categorie" value="Participant">
              </div>
            </div>
          </center>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-suivant">Suivant</button>
      </div>
    </form>
  </div>


  <!-- ===== FOOTER ===== -->
  <footer class="footer text-white pt-5">
    <div class="container">
      <div class="row">
        <!-- Logo -->
        <div class=" col-12 col-md-4 mb-4 text-center text-md-start">
          <img src="logo.png" alt="Logo Impact Web" class="img-fluid" style="max-width: 200px;">
        </div>

        <!-- Colonne 1 -->
        <div class="col-6 col-md-4 col-sm-6 mb-4">
          <ul class="list-unstyled footer-links">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Événements</a></li>
            <li><a href="#">Replays</a></li>
            <li><a href="#">E-learning</a></li>
            <li><a href="#">Entreprises & Recruteurs</a></li>
            <li><a href="#">Forum</a></li>
          </ul>
        </div>

        <!-- Colonne 2 -->
        <div class="col-6 col-md-4 col-sm-6 mb-4">
          <ul class="list-unstyled footer-links">
            <li><a href="#">Intervenants</a></li>
            <li><a href="#">Partenaires & Sponsors</a></li>
            <li><a href="#">Ressources Gratuites</a></li>
            <li><a href="#">Billetterie</a></li>
            <li><a href="#">Boutique</a></li>
            <li><a href="#">Plan d'action + Mentorat</a></li>
          </ul>
        </div>
      </div>

      <!-- Ligne rouge -->
      <hr class="footer-line">

      <!-- Mentions + réseaux -->
      <div class="footer-mentions row align-items-center pt-3 pb-4">
        <div class="col-md-4 text-center yes text-md-start">
          <small>2025 @ Impact Web 360</small>
        </div>
        <div class="col-md-4 text-center">
          <a href="#" class="text-white footer-link text-decoration-none">Mentions légales</a>
        </div>
        <div class="col-md-4 text-center yes2 text-md-end">
          <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const seats = document.querySelectorAll('.seat:not(.reserved)');
    let selected = null;

    seats.forEach(seat => {
      seat.addEventListener('click', () => {
        if (selected) selected.classList.remove('selected');
        seat.classList.add('selected');
        selected = seat;
        document.getElementById('siege_choisi').value = seat.dataset.siege;
      });
    });

    function validerSiege() {
      if (!document.getElementById('siege_choisi').value) {
        alert('Veuillez sélectionner un siège.');
        return false;
      }
      return true;
    }
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const toggler = document.querySelector('.navbar-toggler');
      const hamburger = document.getElementById('hamburgerBtn');

      toggler.addEventListener('click', () => {
        hamburger.classList.toggle('active');
      });
    });
  </script>
</body>

</html>