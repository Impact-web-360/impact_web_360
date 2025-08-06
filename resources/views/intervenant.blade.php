<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Impact Web 360</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body { background-color: black; color: white; font-family: 'Segoe UI', sans-serif;; scroll-behavior: smooth; overflow-x: hidden; }
    .navbar-custom { background-color: #000066; border-radius: 15px; margin-top: 20px; padding: 10px 20px; height: 70px; }
    .navbar-brand img { max-height: 160px; width: auto; }
    .btn-inscrire { background: red; color: white; border: none; border-radius: 8px; }
    .btn-inscrire:hover { background: linear-gradient(90deg, #ff3300, #DD2476); color: #000000; transform: scale(1.05);}
    .btn-outline-light { border-radius: 8px; }
    .btn-light:hover { background-color: #000000; color: #f8f9fa; border: none; }
    .footer { background-color: #000066; color: #ccccff; }
    .footer-links a { color: #ccccff; text-decoration: none; display: block; margin-bottom: 0.5rem; transition: all 0.3s ease; }
    .footer-links a:hover { color: #ff4500; padding-left: 4px; }
    .social-icon { display: inline-block; background-color: red; color: white; width: 36px; height: 36px; text-align: center; line-height: 36px; border-radius: 50%; margin: 0 5px; font-size: 16px;transition: transform 0.3s ease, background-color 0.3s ease; }
    .social-icon:hover { transform: scale(1.1); background-color: #ff2605; }

    .btn-outline-light {
      border-radius: 8px;
    }

    .card img {
      object-fit: cover;
      height: 250px;
      width: 100%;
    }

    .btn-gradient {
      background-color: #fff;
      border-radius: 20px;
    }

    .btn-danger {
      background-color: red;
      border-color: #ff4500;
    }

    .btn-danger:hover {
      background: linear-gradient(90deg, #ff3300, #DD2476); color: #000000; transform: scale(1.05);
    }

          /* ========== MEDIA QUERIES ========== */
    @media (max-width: 992px) {
        .navbar-brand img { margin-top: -70px; max-height: 180px; margin-left: -30px;; }
        .navbar-brand { max-height: 50px; }
        .navbar-custom { margin-top: 10px; }
        .yes{margin-bottom: 10px;}
        .yes2{margin-top: 10px;}
        #navbarNav { background-color:rgb(0, 0, 102); width: 100%; padding: 40px; position: absolute; top: 59px; left: 0; z-index: 999; text-align: left; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; }
        #navbarNav .nav-link { text-align: left; font-size: 22px; margin-top: 10px; font-weight: bod; }
        #navbarNav .btn{ margin-top: 50px; width: 100%; }
        #navbarNav .btn-inscrire { text-align: left; margin: 8px; text-align: center; }
        .hamburger { width: 30px; height: 22px; display: flex; flex-direction: column; justify-content: space-between; cursor: pointer; z-index: 1001; border: none; }
        .hamburger span { height: 3px; background-color: white; border-radius: 2px; transition: all 0.4s ease; border: none; }
        .navbar-toggler { border: none !important; background: transparent !important; box-shadow: none !important; outline: none !important; }
        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(8px, -9px); }
        .navbar-toggler-icon { background-image: none !important; }
        .footer-links { margin-bottom: 20px; }
        .social-icon { margin: 5px; }

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
          <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Acceuil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('evenement') }}">Événements</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">E-learning</a></li>
          <li class="nav-item"><a class="nav-link active" href="{{ route('intervenant') }}">Intervenants</a></li>
          <li class="nav-item"><a class="nav-link" href="">Billetterie</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('boutique') }}">Boutique</a></li>
          <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
          <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
        </ul>
      </div>
    </nav>

    <a href="#" id="backToTop" class="btn btn-danger shadow position-fixed" 
      style="bottom: 20px; right: 20px; display: none; z-index: 9999; border-radius: 50%;">
      <i class="fa fa-arrow-up"></i>
    </a>


<!-- Section Intervenants -->
<section class="container my-5" style="padding-top: 120px;">
  <center>
    <h2 class="mb-2 fw-bold">Nos intervenants</h2>
    <p class="text-light mb-4">Découvrez le profil de nos intervenants</p>
  </center>

  <!-- Aperçu limité (6 premiers) -->
  <div class="row g-4" id="intervenants-apercu">
    @foreach($intervenants->take(6) as $intervenant)
      <div class="col-md-4 col-sm-6">
        <div class="card bg-dark text-white text-center p-3 rounded-4 border-0 h-100 shadow">
          @if($intervenant->image)
            <img src="{{ asset('storage/' . $intervenant->image) }}" class="rounded-3 mb-3" alt="{{ $intervenant->nom }}" style="height: 200px; object-fit: cover;">
          @else
            <div class="bg-secondary rounded-3 mb-3 d-flex align-items-center justify-content-center" style="height: 200px;">
              <i class="fas fa-user fa-3x text-light"></i>
            </div>
          @endif
          <h5 class="mb-0">{{ $intervenant->nom }}</h5>
          <small class="text-muted d-block">{{ $intervenant->theme ?? 'Intervenant' }}</small>
          <small class="text-light fst-italic">Poste : {{ $intervenant->poste ?? 'Non défini' }}</small>
          @if($intervenant->evenements->count() > 0)
            <small class="text-light fst-italic">Événement : {{ $intervenant->evenements->first()->titre }}</small>
          @endif
          <a href="{{ route('intervenants.show', $intervenant->id) }}" class="btn btn-danger mt-3 rounded-pill">Voir profil</a>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Liste complète -->
  <div class="row g-4 d-none" id="intervenants-complet">
    @foreach($intervenants->skip(6) as $intervenant)
      <div class="col-md-4 col-sm-6">
        <div class="card bg-dark text-white text-center p-3 rounded-4 border-0 h-100 shadow">
          @if($intervenant->image)
            <img src="{{ asset('storage/' . $intervenant->image) }}" class="rounded-3 mb-3" alt="{{ $intervenant->nom }}" style="height: 200px; object-fit: cover;">
          @else
            <div class="bg-secondary rounded-3 mb-3 d-flex align-items-center justify-content-center" style="height: 200px;">
              <i class="fas fa-user fa-3x text-light"></i>
            </div>
          @endif
          <h5 class="mb-0">{{ $intervenant->nom }}</h5>
          <small class="text-muted d-block">{{ $intervenant->theme ?? 'Intervenant' }}</small>
          <small class="text-light fst-italic">Poste : {{ $intervenant->poste ?? 'Non défini' }}</small>
          @if($intervenant->evenements->count() > 0)
            <small class="text-light fst-italic">Événement : {{ $intervenant->evenements->first()->titre }}</small>
          @endif
          <a href="{{ route('intervenants.show', $intervenant->id) }}" class="btn btn-danger mt-3 rounded-pill">Voir profil</a>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-4 text-center">
    @if($intervenants->count() > 6)
      <button id="btn-decouvrir" class="btn btn-gradient">
        <i class="fas fa-eye me-2"></i>Découvrir tous les intervenants ({{ $intervenants->count() }})
      </button>
      <button id="btn-masquer" class="btn btn-outline-light d-none">
        <i class="fas fa-eye-slash me-2"></i>Voir moins
      </button>
    @endif
  </div>

  <!-- Section Admin - visible uniquement pour les admins -->
  @auth
    @if(auth()->user()->type === 'admin')
      <div class="mt-5 text-center">
        <a href="{{ route('dashboard.intervenants.index') }}" class="btn btn-primary">
          <i class="fas fa-cog"></i> Gérer les intervenants
        </a>
      </div>
    @endif
  @endauth
</section>

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
            <li><a href="#">Forum</a></li>
          </ul>
        </div>

        <!-- Colonne 2 -->
        <div class="col-6 col-md-4 col-sm-6 mb-4">
          <ul class="list-unstyled footer-links">
            <li><a href="{{ route('intervenant') }}">Intervenants</a></li>
            <li><a href="#">Partenaires & Sponsors</a></li>
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const toggler = document.querySelector('.navbar-toggler');
        const hamburger = document.getElementById('hamburgerBtn');

        toggler.addEventListener('click', () => {
          hamburger.classList.toggle('active');
        });
      });
    </script>

    <script>
  const backToTopBtn = document.getElementById("backToTop");

  // Afficher le bouton quand on descend de 200px
  window.onscroll = function () {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
      backToTopBtn.style.display = "block";
    } else {
      backToTopBtn.style.display = "none";
    }
  };

  // Animation douce de retour en haut
  backToTopBtn.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });
</script>

</body>
</html>
