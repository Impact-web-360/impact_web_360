
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Impact Web 360 - Billetterie</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    body { background-color: #0e0e12; color: white; font-family: 'Segoe UI', sans-serif; }
    .navbar-custom { background-color: #000066; border-radius: 15px; margin-top: 20px; padding: 10px 20px; height: 70px; }
    .navbar-brand img { max-height: 160px; width: auto; }
    .btn-inscrire { background: linear-gradient(90deg, #ff4d00, #ff3300); color: white; border: none; border-radius: 8px; }
    .btn-inscrire:hover { background: linear-gradient(90deg, #e63c00, #cc2900); }
    .btn-outline-light { border-radius: 8px; }
    .ticket { background: #ff3300; color: white; border-radius: 1rem; margin-top: 2rem; flex-wrap: wrap; text-align: center; gap: 1rem; }
    .ticket .d-flex > div {flex: 1 1 30%;min-width: 100px;}
    .ticket img {max-width: 100%; height: auto;}
    .ticket-header {background-color: #000066; display: flex; justify-content: space-between; align-items: center; border-top-left-radius: 1rem; border-top-right-radius: 1rem; padding: 1rem;}
    .div-form { background-color: white; border-radius: 1rem; padding: 2rem; color: black; margin-top: 1rem; }
    .step-nav { background-color: #f8f9fa; padding: 1rem; border-radius: 1rem; font-weight: 500;font-size: 16px; flex-wrap: wrap; overflow-x: auto; }
    .step-container {white-space: nowrap;font-weight: 500;font-size: 16px;display: inline-block;}
    .btn-orange { background-color: #ff2d0a; color: white; border-radius: 20px; }
    .btn-suivant { margin-top: 40px; margin-bottom: 150px; background: #ff3d00; color: white; border-radius: 30px; padding: 10px 50px; font-weight: bold; font-size: 16px; }
    .btn-suivant:hover { background: #cc2900; }
    .btn-orange:hover { background: linear-gradient(90deg, #e63c00, #cc2900); color: white;}
    .footer { background-color: #000066; color: #ccccff; }
    .footer-links a { color: #ccccff; text-decoration: none; display: block; margin-bottom: 0.5rem; transition: all 0.3s ease; }
    .footer-links a:hover { color: #ff4500; padding-left: 4px;}
    .social-icon { display: inline-block; background-color: #ff4500; color: white; width: 36px; height: 36px; text-align: center; line-height: 36px; border-radius: 50%; margin: 0 5px; font-size: 16px;transition: transform 0.3s ease, background-color 0.3s ease; }
    .social-icon:hover { transform: scale(1.1); background-color: #cc3700; }

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

    .step-nav span {
      display: inline-block;
      margin: 2px 5px;
    }

    .step-container {font-size: 14px;}
    .step-nav::-webkit-scrollbar {
      display: none; /* Optionnel : cache la barre de scroll */
    }

    }
  </style>
</head>
<body>
<!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom container">
      <a class="navbar-brand" href="index.php"><img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Logo Impact Web" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <div class="hamburger"  id="hamburgerBtn">
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
          <img src="" alt="Logo">
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
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=ImpactWeb360-2025&size=100x100&bgcolor=255-51-0&color=255-255-255" alt="QR Code">
      </div>
      <div>
        <h5>Lieu</h5>
        <h5></h5>
        <p></p>
      </div>
    </div>
  </div>

  <div class="step-nav mt-5 text-dark text-center">
    <div class="step-container">
      <span><strong class="text-primary"><a href="{{ route('step1') }}"> Informations</a></strong></span>
      <span class="mx-2 text-muted">&gt;</span>
      <span><a href="{{ route('step2') }}">Réservation de siège</a> </span>
      <span class="mx-2 text-muted">&gt;</span>
      <span><a href="{{ route('step3') }}">Confirmation</a></span>
      <span class="mx-2 text-muted">&gt;</span>
      <span>Paiement</span>
    </div>
  </div>



  <form class="form-section animate__animated animate__fadeInUp" method="POST" action="{{ route('step1.post') }}">
    @csrf
    <div class="alert alert-danger"></div>
   
    <div class="div-form">
      <input type="hidden" name="id_evenement" value="">
      <div class="row g-3">
        <div class="col-md-6"><input type="text" class="form-control p-3 rounded-4" name="prenom" placeholder="Prénom" required></div>
        <div class="col-md-6"><input type="text" class="form-control p-3 rounded-4" name="nom" placeholder="Nom de famille" required></div>
        <select name="pays" class="col-md-6 form-control p-3 rounded-4">
        <option value="">Sélectionnez un pays</option>
        @foreach($countries as $code => $name)
            <option value="{{ $name }}">{{ $name }}</option>
        @endforeach
        </select>

        <div class="col-md-6"><input type="text" class="form-control p-3 rounded-4" name="ville" placeholder="Ville"></div>
       <div class="col-md-6 d-flex gap-2">
          <input type="text" name="telephone" placeholder="Numéro" required> 
        <select name="indicatif" required>
            <option value="">Indicatif</option>
            @foreach($dialCodes as $code => $dial)
                <option value="{{ $dial }}">{{ $name }} ({{ $dial }})</option>
            @endforeach
        </select>
     </div> 
    
        <div class="col-md-6"><input type="email" class="form-control p-3 rounded-4" name="email" placeholder="E-mail" required></div>
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
