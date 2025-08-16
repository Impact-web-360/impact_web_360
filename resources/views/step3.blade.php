<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Impact Web 360 - Billetterie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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

    .ticket-header-img {
      max-height: 160px;
      width: auto;
      margin-top: -65px;
      margin-bottom: -65px;
      margin-right: -40px;
    }


    .ticket-header {
      background-color: #000066;
      display: flex;
      justify-content: space-between;
      gap:6px;
      align-items: center;
      border-top-left-radius: 1rem;
      border-top-right-radius: 1rem;
      padding: 1rem;
    }

    .div-form {
      background-color: white;
      border-radius: 1rem;
      padding: 2rem;
      color: black;
      margin-top: 1rem;
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

    .btn-orange {
      background-color: #ff2d0a;
      color: white;
      border-radius: 20px;
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

    .btn-orange:hover {
      background: linear-gradient(90deg, #e63c00, #cc2900);
      color: white;
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
        margin-top: -70px;
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

    @media (max-width: 768px) {
      .card {
        margin: 1rem;
        border-radius: 1rem !important;
      }

      .card-footer {
        border-bottom-left-radius: 1rem !important;
        border-bottom-right-radius: 1rem !important;
        padding: 1.5rem !important;
      }

      .div-form {
        padding: 1rem;
      }

      .btn-suivant {
        margin-bottom: 50px;
        padding: 10px 30px;
      }
    }

    @media (max-width: 576px) {

      .step-nav {
        font-size: 14px;
        line-height: 1.8;
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

      .card {
        margin: 0.5rem;
      }

      .div-form {
        padding: 2rem;
      }

      .ticket-header h5 {
        font-size: 15px;
      }

      .ticket-header-img{
        width: 130px;
        margin-left: -30px;
      }

      .ticket-body-left h5 {
        font-size: 14px;
      }

      .qr-code img {
        width: 70%;
      }

      .btn-promo {
        font-size: 15px;
        width: 100%;
        color: black;
      }
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom container">
    <a class="navbar-brand" href="index.php"><img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}"
        alt="Logo Impact Web" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <div class="hamburger" id="hamburgerBtn">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link " href="{{ route('home') }}">Acceuil</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('evenement') }}">Événements</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">E-learning</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('intervenant') }}">Intervenants</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('step1') }}">Billetterie</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('boutique') }}">Boutique</a></li>
        <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
        <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
      </ul>
    </div>
  </nav>

  <div class="container" style="margin-top: 150px;">
    <div class="ticket text-center animate__animated animate__fadeIn">
      <div class="ticket-header p-3">
        <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Logo" class="ticket-header-img">
        <h5>Impact Web 360 – Édition 2025</h5>
        <div><strong>TK0001</strong></div>
      </div>
      <div class="d-flex justify-content-center align-items-center p-3">
        <div class="ticket-body-left">
          <h5>Date et heure</h5>
          <h6></h6>
          <p></p>
        </div>
        <div class="align-self-center qr-code">
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

    <div class="row justify-content-center">
      <div class="col-12">
        <div class="step-nav mt-5 text-dark text-center">
          <div class="step-container d-flex justify-content-center align-items-center flex-wrap gap-2">

            <!-- Étape 1 -->
            <span>
              <a href="{{ route('step1') }}" class="text-decoration-none">
                <span class="d-none d-md-inline text-dark">Informations</span>
                <span class="d-inline d-md-none step-icon"><i class="fa-regular fa-user text-dark"></i></span>
              </a>
            </span>

            <span class="mx-2 text-muted">></span>

            <!-- Étape 2 -->
            <span>
              <a href="{{ route('step2') }}" class="text-decoration-none">
                <span class="d-none d-md-inline text-dark">Réservation de siège</span>
                <span class="d-inline d-md-none step-icon"><i class="fa-solid fa-couch text-dark"></i></span>
              </a>
            </span>

            <span class="mx-2 text-muted">></span>

            <!-- Étape 3 -->
            <span>
              <a href="{{ route('step3') }}" class="text-decoration-none">
                <span class="d-none d-md-inline fw-bold text-primary">Confirmation</span>
                <span class="d-inline d-md-none step-icon text-reset"><i class="fa-regular fa-circle-check"></i></span>
              </a>
            </span>

            <span class="mx-2 text-muted">></span>

            <!-- Étape 4 (non cliquable) -->
            <span>
              <span>
                <span class="d-none d-md-inline text-dark">Paiement</span>
                <span class="d-inline d-md-none step-icon"><i class="bi bi-credit-card"></i></span>
              </span>
            </span>
          </div>
        </div>

        <form class="form-section animate__animated animate__fadeInUp" method="POST" action="{{ route('tickets.store') }}">
          @csrf

          <!-- Formulaire -->
          <div class="div-form mt-4">
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control p-3 rounded-4" name="nom" placeholder="Nom de famille"
                  value="{{ $step1['nom'] ?? '' }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control p-3 rounded-4" name="prenom" placeholder="Prénom"
                  value="{{ $step1['prenom'] ?? '' }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control p-3 rounded-4" name="pays" placeholder="Pays"
                  value="{{ $step1['pays'] ?? '' }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control p-3 rounded-4" name="ville" placeholder="Ville"
                  value="{{ $step1['ville'] ?? '' }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control p-3 rounded-4" name="telephone" placeholder="Téléphone"
                  value="{{ $step1['telephone'] ?? '' }}" required>
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control p-3 rounded-4" name="email" placeholder="Email"
                  value="{{ $step1['email'] ?? '' }}" required>
              </div>
            </div>
          </div>

          <!-- Carte avec réduction -->
          <div class="card mt-3 mx-auto border-0 rounded-5" style="max-width: 600px;">
            <div class="card-body">
              <hr class="mt-5">
              <div class="text-body-secondary p-2 d-flex justify-content-between card-subtitle">
                <h6>Billet: </h6>
                <h6>100.000FCFA</h6>
              </div>
              <div class="d-flex justify-content-between p-2 text-body-secondary card-subtitle">
                <h6>Rabais: </h6>
                <h6 id="rabais-display">---</h6>
              </div>
              <center>
                <button type="button" class="btn btn-promo text-danger rounded-5 mb-3 w-50 p-2" data-bs-toggle="modal"
                  data-bs-target="#exampleModal" style="border: solid 1px #ff4500;">
                  J'ai un code promo
                </button>
              </center>
            </div>
            <div class="card-footer justify-content-between p-3 d-flex align-items-center text-light"
              style="background-color: #ff4500;border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem;">
              <span class="fs-5">Résumé total</span>
              <span class="fs-4">100.000 FCFA</span>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-suivant">Payer</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- MODAL PROMO -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Code Promo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="promoForm">
            <input type="text" class="form-control" name="code_promo" id="codePromoInput"
              placeholder="Entrez votre code promo ici">
            <p class="text-muted mt-2">Si vous avez un code promo, entrez-le ici pour bénéficier d'une réduction sur
              votre billet.</p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" id="applyPromoBtn">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- ===== FOOTER ===== -->
  <footer class="footer text-white pt-5 mt-5">
    <div class="container">
      <div class="row">
        <!-- Logo -->
        <div class=" col-12 col-md-4 mb-4 text-center text-md-start">
          <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Logo Impact Web" class="img-fluid" style="max-width: 200px;">
        </div>

        <!-- Colonne 1 -->
        <div class="col-6 col-md-4 col-sm-6 mb-4">
          <ul class="list-unstyled footer-links">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('evenement') }}">Événements</a></li>
            <li><a href="{{ route('evenement') }}">Replays</a></li>
            <li><a href="{{ route('login') }}">E-learning</a></li>
            <li><a href="#">Entreprises & Recruteurs</a></li>
            <li><a href="https://chat.whatsapp.com/FZx7QMMdFsq3fF0D40Px8f" target="_blank">Forum</a></li>
          </ul>
        </div>

        <!-- Colonne 2 -->
        <div class="col-6 col-md-4 col-sm-6 mb-4">
          <ul class="list-unstyled footer-links">
            <li><a href="{{ route('intervenant') }}">Intervenants</a></li>
            <li><a href="{{ route('sponsors.show') }}">Partenaires & Sponsors</a></li>
            <li><a href="#">Ressources Gratuites</a></li>
            <li><a href="{{ route('step1') }}">Billetterie</a></li>
            <li><a href="{{ route('boutique') }}">Boutique</a></li>
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
          <a href="https://www.facebook.com/share/193YQEPeYH/?mibextid=wwXIfr" class="social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/impactweb360/" class="social-icon"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      console.log('DOM fully loaded and parsed');

      // Gestion du code promo
      const applyPromoBtn = document.getElementById('applyPromoBtn');
      const promoModalElement = document.getElementById('exampleModal');

      if (applyPromoBtn && promoModalElement) {
        console.log('Promo elements found');

        applyPromoBtn.addEventListener('click', function (e) {
          console.log('Apply promo button clicked');
          e.preventDefault();

          const codeInput = document.getElementById('codePromoInput');
          const code = codeInput ? codeInput.value.trim() : '';

          console.log('Code entered:', code);

          if (!code) {
            alert('Veuillez entrer un code promo.');
            return;
          }

          // Simulation de validation du code promo
          if (code === "IMPACT25") {
            const rabaisDisplay = document.getElementById('rabais-display');
            if (rabaisDisplay) {
              rabaisDisplay.textContent = '-25%';
              console.log('Discount applied');
            }

            // Fermer le modal de manière fiable avec plusieurs méthodes de repli
            try {
              // Méthode 1 : Utiliser l'API Bootstrap
              const modal = bootstrap.Modal.getInstance(promoModalElement);
              if (modal) {
                modal.hide();
              } else {
                // Si l'instance n'existe pas, créer une nouvelle et la fermer
                const newModal = new bootstrap.Modal(promoModalElement);
                newModal.hide();
              }
            } catch (error) {
              console.error('Error closing modal with Bootstrap API:', error);
              // Méthode 2 : Fermer manuellement avec JavaScript
              try {
                promoModalElement.classList.remove('show');
                promoModalElement.style.display = 'none';
                document.body.classList.remove('modal-open');
                const backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                  backdrop.remove();
                }
              } catch (manualError) {
                console.error('Error closing modal manually:', manualError);
              }
            }

            // Afficher un message de succès avec un délai pour s'assurer que le modal est fermé
            setTimeout(() => {
              alert('Code promo appliqué : 25% de réduction !');
            }, 100);
          } else {
            alert('Code promo invalide. Veuillez réessayer.');
          }
        });
      } else {
        console.log('Promo elements not found');
      }

      // Gestion du menu hamburger
      const hamburger = document.getElementById('hamburgerBtn');
      if (hamburger) {
        hamburger.addEventListener('click', function () {
          this.classList.toggle('active');
        });
      }
    });
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
