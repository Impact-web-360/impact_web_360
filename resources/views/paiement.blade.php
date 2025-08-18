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

    :root {
      --primary-color: #2c3e50;
      --secondary-color: #ff4500;
      --background-color: #ecf0f1;
      --card-background: #ffffff;
      --text-color-dark: #2d3436;
      --shadow-light: 0 4px 15px rgba(0, 0, 0, 0.08);
      --border-radius-large: 15px;
      }

    body {
      background-color: #0e0e12;
      color: white;
      font-family: 'Segoe UI', sans-serif;
    }

    .billet-container {
        background-color: var(--card-background);
        border-radius: var(--border-radius-large);
        box-shadow: var(--shadow-light);
        padding: 30px 40px;
        max-width: 400px;
        width: 100%;
        text-align: center;
        color: #0e0e12;
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
        color: var(--secondary-color);
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

    .download-btn {
        display: inline-block;
        background-color: var(--secondary-color);
        color: #fff;
        padding: 12px 25px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 500;
        margin-top: 30px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .download-btn:hover {
        transform: translateY(-2px);
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

    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom container">
    <a class="navbar-brand" href="index.php"><img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}"alt="Logo Impact Web" /></a>
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
        <li class="nav-item"><a class="nav-link" href="{{ route('elearning') }}">E-learning</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('intervenant') }}">Intervenants</a></li>
        <li class="nav-item"><a class="nav-link active" href="">Billetterie</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('boutique') }}">Boutique</a></li>
        <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
        <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
      </ul>
    </div>
  </nav>

  <a href="#" id="backToTop" class="btn btn-danger text-light shadow position-fixed" 
   style="bottom: 20px; right: 20px; display: none; z-index: 9999; border-radius: 50%; background: #ff4500;">
    <i class="fa fa-arrow-up"></i>
  </a>

  <div class="container" style="margin-top: 100px; mb-5">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="step-nav mt-5 text-dark text-center">
          <div class="step-container d-flex justify-content-center align-items-center flex-wrap gap-2">

            <span>
              <a href="" class="text-decoration-none">
                <span class="d-none d-md-inline text-dark">Informations</span>
                <span class="d-inline d-md-none step-icon"><i class="fa-regular fa-user text-dark"></i></span>
              </a>
            </span>

            <span class="mx-2 text-muted">></span>

            <span>
              <a href="" class="text-decoration-none">
                <span class="d-none d-md-inline text-dark">Réservation de siège</span>
                <span class="d-inline d-md-none step-icon"><i class="fa-solid fa-couch text-dark"></i></span>
              </a>
            </span>

            <span class="mx-2 text-muted">></span>

            <span>
              <a href="" class="text-decoration-none">
                <span class="d-none d-md-inline text-dark">Confirmation</span>
                <span class="d-inline d-md-none step-icon text-reset"><i class="fa-regular fa-circle-check text-dark"></i></i></span>
              </a>
            </span>

            <span class="mx-2 text-muted">></span>

            <span>
              <span>
                <span class="d-none d-md-inline fw-bold text-primary">Paiement</span>
                <span class="d-inline d-md-none step-icon"><i class="bi bi-credit-card text-primary"></i></span>
              </span>
            </span>

          </div>
        </div>

        <div class="d-flex justify-content-center">
          <div class="billet-container mt-5">
            <div class="header-section">
                <h2>🎫 Billet Électronique</h2>
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

            <a href="{{ route('billet.pdf', $evenement->id) }}" class="download-btn" target="_blank">
                Télécharger le billet en PDF
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <footer class="footer text-white pt-5 mt-5">
    <div class="container">
      <div class="row">
        <div class=" col-12 col-md-4 mb-4 text-center text-md-start">
          <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Logo Impact Web" class="img-fluid" style="max-width: 200px;">
        </div>

        <div class="col-6 col-md-4 col-sm-6 mb-4">
          <ul class="list-unstyled footer-links">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('evenement') }}">Événements</a></li>
            <li><a href="{{ route('evenement') }}">Replays</a></li>
            <li><a href="{{ route('elearning') }}">E-learning</a></li>
            <li><a href="#">Entreprises & Recruteurs</a></li>
            <li><a href="https://chat.whatsapp.com/FZx7QMMdFsq3fF0D40Px8f" target="_blank">Forum</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-4 col-sm-6 mb-4">
          <ul class="list-unstyled footer-links">
            <li><a href="{{ route('intervenant') }}">Intervenants</a></li>
            <li><a href="{{ route('sponsors.show') }}">Partenaires & Sponsors</a></li>
            <li><a href="#">Ressources Gratuites</a></li>
            <li><a href="{{ route('evenement') }}">Billetterie</a></li>
            <li><a href="{{ route('boutique') }}">Boutique</a></li>
            <li><a href="#">Plan d'action + Mentorat</a></li>
          </ul>
        </div>
      </div>

      <hr class="footer-line">

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
    document.addEventListener('DOMContentLoaded', () => {
      const toggler = document.querySelector('.navbar-toggler');
      const hamburger = document.getElementById('hamburgerBtn');

      toggler.addEventListener('click', () => {
        hamburger.classList.toggle('active');
      });
    });

    const backToTopBtn = document.getElementById("backToTop");
    window.onscroll = function() {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTopBtn.style.display = "block";
      } else {
        backToTopBtn.style.display = "none";
      }
    };

    backToTopBtn.addEventListener("click", function(e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
    
  </script>
</body>

</html>