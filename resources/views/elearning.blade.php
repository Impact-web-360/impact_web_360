<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="Impact Web 360 - Formations en ligne pour développer vos compétences web et digitales. Apprenez à votre rythme, où que vous soyez.">
  <title>E-learning - Impact Web 360</title>
  <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-512x512.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body { background-color: black; color: white; font-family: 'Segoe UI', sans-serif; scroll-behavior: smooth; overflow-x: hidden; }
    .navbar-custom { background-color: #000066; border-radius: 15px; margin-top: 20px; padding: 10px 20px; height: 70px; }
    .navbar-brand img { max-height: 160px; width: auto; }
    .btn-inscrire { background: #ff4500; color: white; border: none; border-radius: 8px; }
    .btn-inscrire:hover { background: linear-gradient(90deg, #ff3300, #DD2476); color: #000000; transform: scale(1.05);}
    .btn-outline-light { border-radius: 8px; }
    .btn-light:hover { background-color: #000000; color: #f8f9fa; border: none; }
    .footer { background-color: #000066; color: #ccccff; }
    .footer-links a { color: #ccccff; text-decoration: none; display: block; margin-bottom: 0.5rem; transition: all 0.3s ease; }
    .footer-links a:hover { color: #ff4500; padding-left: 4px; }
    .social-icon { display: inline-block; background-color: #ff4500; color: white; width: 36px; height: 36px; text-align: center; line-height: 36px; border-radius: 50%; margin: 0 5px; font-size: 16px;transition: transform 0.3s ease, background-color 0.3s ease; }
    .social-icon:hover { transform: scale(1.1); background-color: #ff2605; }
    .btn-360 { background: #ff4500; color: white;border: none; border-radius: 20px; padding: 5px 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); transition: transform 0.3s; }
    .btn-360:hover { transform: scale(1.05); }
    .hero-section { background: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover; height: 600px; position: relative; }
    .hero-section .overlay { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 2rem; animation: fadeIn 1.5s ease-in-out; }
    .titre-avec-trait { display: flex; gap: 10px; margin: 20px 0; }
    .trait-vertical { width: 4px; height: auto; background-color: #ff4500; }
    .card { background-color: #1a1a1a; border: 1px solid #333; transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(255, 69, 0, 0.2); }
    .card-img-top { height: 200px; object-fit: cover; }
    .btn-primary { background-color: #ff4500; border: none; transition: background-color 0.3s ease; }
    .btn-primary:hover { background-color: #ff2605; }
    .btn-category { background-color: #333; color: white; border: none; border-radius: 20px; padding: 8px 20px; margin: 5px; transition: background-color 0.3s ease, transform 0.3s; }
    .btn-category.active { background-color: #ff4500; }
    .btn-category:hover { background-color: #ff4500; transform: scale(1.05); }
    #backToTop { background-color: #ff4500; border: none; }
    
    /* Styles responsives de la page d'accueil */
    @media (max-width: 976px) {
      .hero-section { height: 300px; }
      .yes {margin-bottom: 10px;}
      .yes2 {margin-top: 10px;}

      .btn-danger {
        background-color: #ff3300;
        border-radius: 50px;
        padding: 10px 20px;
        border: none;
      }
      .btn-danger:hover {
        background-color: #cc2900;
      }
      .btn-inscrire {
        background: linear-gradient(90deg, #ff4d00, #ff3300);
        color: white;
        border: none;
        border-radius: 8px;
      }
      .filters {
        background-color: rgba(28, 31, 38, 0);
        padding: 20px;
        border: solid 0.5px #1C1F26;
        border-radius: 10px;
        color: white;
      }

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
        text-align: left;
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
      .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
      }
      .hamburger.active span:nth-child(2) {
        opacity: 0;
      }
      .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(8px, -9px);
      }
      .navbar-toggler-icon {
        background-image: none !important;
      }
      .container-fluid.py-5.px-5 {
        padding-left: 15px !important;
        padding-right: 15px !important;
      }
    }
    @media (max-width: 768px) {
      .product-image-container {
        height: auto;
      }
      .product-info {
        padding: 15px;
      }
      .product-info h5 {
        margin-bottom: -30px;
        font-size: 10px;
      }
      .product-info p {
        font-size: 10px;
      }
      .center-button {
        margin-top: 50px;
      }
    }
    @media (max-width: 576px) {
      .product-image-container {
        height: auto;
      }
      .product-info h5 {
        font-size: 20px;
      }
      .product-info p {
        font-size: 20px;
      }
      .product-card {
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body>

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
        <li class="nav-item"><a class="nav-link active" href="{{ route('elearning') }}">E-learning</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('intervenant') }}">Intervenants</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('evenement') }}">Billetterie</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('boutique') }}">Boutique</a></li>
        <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
        <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
      </ul>
    </div>
  </nav>

  <header class="hero-section text-center" data-aos="zoom-in">
    <div class="overlay">
      <br><br><br>
      <h1 class="display-4 fw-bold">Développez vos compétences web</h1>
      <p class="lead">Accédez à des formations de haute qualité, animées par des experts du digital.</p>
    </div>
  </header>
  
  <a href="#" id="backToTop" class="btn btn-danger shadow position-fixed" 
   style="bottom: 20px; right: 20px; display: none; z-index: 9999; border-radius: 50%;">
    <i class="fa fa-arrow-up"></i>
  </a>

  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold" data-aos="fade-up">Nos Formations en ligne</h2>
        <p class="text-secondary" data-aos="fade-up" data-aos-delay="100">Choisissez une catégorie ou explorez toutes les formations.</p>
      </div>

      <div class="d-flex flex-wrap justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
        <button class="btn btn-category active" data-category="all">Toutes</button>
        @foreach ($categories as $categorie)
          <button class="btn btn-category" data-category="{{ $categorie->slug }}">{{ $categorie->name }}</button>
        @endforeach
      </div>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="formations-grid">
          @foreach ($formations as $formation)
            <div class="col training-card" data-category="{{ $formation->categorie->slug ?? 'uncategorized' }}" data-aos="zoom-in" data-aos-delay="100">
              <div class="card h-100 border-0 shadow">
                <img src="{{ $formation->image }}" class="card-img-top" alt="{{ $formation->title }}">
                <div class="card-body">
                  <span class="badge bg-danger mb-2">{{ $formation->categorie->name ?? 'Non classé' }}</span>
                  <h5 class="card-title fw-bold text-white">{{ $formation->title }}</h5>
                  <p class="card-text text-white">{{ Str::limit($formation->description, 100) }}</p>
                  <a href="{{ route('login') }}" class="btn btn-primary w-100 mt-3">Accéder à la formation</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

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
            <li><a href="#">Partenaires & Sponsors</a></li>
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
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
    
    // Fonctionnalité de filtrage des formations
    document.addEventListener('DOMContentLoaded', () => {
        const categoryButtons = document.querySelectorAll('.btn-category');
        const trainingCards = document.querySelectorAll('.training-card');

        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Gérer la classe 'active' sur les boutons
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const category = button.dataset.category;
                trainingCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
      
      const toggler = document.querySelector('.navbar-toggler');
      const hamburger = document.getElementById('hamburgerBtn');

      toggler.addEventListener('click', () => {
        hamburger.classList.toggle('active');
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
    });
  </script>
</body>
</html>