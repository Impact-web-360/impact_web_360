<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Impact Web 360</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: black;
      color: white;
      font-family: 'Montserrat', sans-serif;
      scroll-behavior: smooth;
      overflow-x: hidden;
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
      background: red;
      color: white;
      border: none;
      border-radius: 8px;
    }

    .btn-inscrire:hover {
      background: linear-gradient(90deg, #ff3300, #DD2476);
      color: #000000;
      transform: scale(1.05);
    }

    .btn-outline-light {
      border-radius: 8px;
    }

    .btn-light:hover {
      background-color: #000000;
      color: #f8f9fa;
      border: none;
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
      background-color: red;
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
      background-color: #ff2605;
    }

    .btn-360 {
      background: red;
      color: white;
      border: none;
      border-radius: 20px;
      padding: 5px 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s;
    }

    .btn-360:hover {
      transform: scale(1.05);
    }

    .hero-section {
      background: url('{{ asset(' dossiers/image/homme.png') }}') no-repeat center center/cover;
      height: 750px;
      position: relative;
    }

    .hero-section .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 2rem;
      animation: fadeIn 1.5s ease-in-out;
    }

    .taille {
      font-size: 17px;
    }

    #countdown {
      font-size: 1.5rem;
      padding: 5px 10px;
      font-weight: bold;
      background-color: rgba(85, 84, 160, 0.6);
      border-radius: 10px;
    }

    .btn-danger {
      background-color: red;
      transform: translateY(-2px);
      border-radius: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s;
    }

    .btn-danger:hover {
      transform: scale(1.05);
      background: linear-gradient(90deg, #ff3300, #DD2476);
      color: #000000;
    }

    img.img-fluid:hover {
      transform: scale(1.05);
      transition: 0.3s ease;
    }

    .titre-avec-trait {
      display: flex;
      gap: 10px;
      margin: 20px 0;
    }

    .trait-vertical {
      width: 4px;
      height: auto;
      background-color: red;
    }

    .titre-avec-trait-noir {
      display: flex;
      gap: 10px;
      margin: 20px 0;
    }

    .trait-vertical-noir {
      width: 4px;
      height: auto;
      background-color: #31292969;
    }

    .partners-section {
      padding: 80px 15px;
      text-align: center;
    }

    .partners-section h2 {
      font-size: 2.5rem;
      font-weight: 700;
    }

    .partners-section p {
      color: #ccc;
      max-width: 700px;
      margin: 20px auto;
    }

    .logo-box {
      background-color: #1a1d29;
      padding: 18px;
      border-radius: 12px;
      width: 64px;
      height: 64px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform 0.3s ease;
    }

    .logo-box:hover {
      transform: scale(1.1);
    }

    .logo-box img {
      max-width: 100%;
      height: auto;
    }

    .btn-cta {
      margin-top: 50px;
      background-color: #ff2605;
      color: #fff;
      padding: 12px 32px;
      border-radius: 30px;
      font-weight: 600;
      border: none;
      font-size: 1rem;
    }

    .btn-cta:hover {
      transform: scale(1.05);
      background: linear-gradient(90deg, #ff3300, #DD2476);
      color: #000000;
    }

    .card-body {
      background-color: #000000;
    }

    /* ----- Partie Événement ----- */
    .countdown-container {
      background-color: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(8px);
      border-radius: 16px;
      padding: 25px 50px;
      display: flex;
      gap: 30px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
    }

    .time-box {
      text-align: center;
      color: white;
    }

    .time-box .number {
      font-size: 2.8rem;
      font-weight: bold;
    }

    .time-box .label {
      font-size: 0.9rem;
      color: #c0c0c0;
      margin-top: 5px;
    }


    /* ----- Partie forum ----- */
    .forum-section {
      padding: 60px 15px;
    }

    .forum-title {
      font-size: 2.5rem;
      font-weight: 700;
    }

    .forum-text {
      color: #ccc;
      font-size: 1rem;
      max-width: 600px;
    }

    .btn-join {
      background-color: red;
      color: #fff;
      padding: 12px 28px;
      border-radius: 30px;
      font-weight: 500;
      border: none;
    }

    .btn-join:hover {
      background-color: #ff2605;
      color: black;
      transform: scale(1.05);
    }

    .circle-container {
      position: relative;
      width: 400px;
      height: 400px;
      margin: 40px auto 0 auto;
    }

    /* Conteneur de rotation */
    .rotation-wrapper {
      position: absolute;
      width: 100%;
      height: 100%;
      animation: rotateCircle 30s linear infinite;
      transform-origin: center;
    }

    /* Animation rotation lente */
    @keyframes rotateCircle {
      from {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(360deg);
      }
    }

    @keyframes pulseGlow {
      0% {
        filter: drop-shadow(0 0 0px #00bfff);
      }

      50% {
        filter: drop-shadow(0 0 30px #00bfff);
      }

      100% {
        filter: drop-shadow(0 0 0px #00bfff);
      }
    }

    /* Ombres sombres avatars */
    .user-img {
      position: absolute;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 0px solid #fff;
      filter: brightness(0.4);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.7);
    }

    /* Halo bleu éclatant logo central */
    .center-logo {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 200px;
      animation: pulseGlow 2.5s ease-in-out infinite;
    }

    /* Positions circulaires statiques */
    .img1 {
      top: 0%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .img2 {
      top: 20%;
      right: 0%;
      transform: translate(50%, -50%);
    }

    .img3 {
      bottom: 20%;
      right: 0%;
      transform: translate(50%, 50%);
    }

    .img4 {
      bottom: 0%;
      left: 50%;
      transform: translate(-50%, 50%);
    }

    .img5 {
      bottom: 20%;
      left: 0%;
      transform: translate(-50%, 50%);
    }

    .img6 {
      top: 20%;
      left: 0%;
      transform: translate(-50%, -50%);
    }


    /* ========== MEDIA QUERIES ========== */
    @media (max-width: 976px) {

      /* Navbar mobile */
      .navbar-brand img {
        margin-top: -65px;
        max-height: 180px;
        margin-left: -30px;
        ;
      }

      .navbar-brand {
        max-height: 50px;
      }

      .navbar-custom {
        margin-top: 10px;
      }

      .yes {
        margin-bottom: 10px;
      }

      .yes2 {
        margin-top: 10px;
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
        font-weight: bod;
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

      /* Hero section mobile */
      .hero-section {
        height: 60vh;
      }

      .hero-section .overlay h1 {
        font-size: 2rem;
        line-height: 1.2;
      }

      .hero-section .overlay p {
        font-size: 2rem;
      }

      #countdown {
        font-size: 1rem;
        flex-wrap: wrap;
      }

      /* Événement section mobile */
      .titre-avec-trait {
        flex-direction: column;
        align-items: flex-start;
      }

      .trait-vertical {
        width: 50px;
        height: 4px;
      }

      /* Forum section mobile */
      .forum-title {
        font-size: 1.8rem;
      }

      .text-center-mobile {
        text-align: center;
      }

      .circle-container {
        width: 300px;
        height: 300px;
      }

      .user-img {
        width: 50px;
        height: 50px;
      }

      .center-logo {
        width: 150px;
      }

      /* Boutique section mobile */
      .card {
        margin-bottom: 20px;
      }

      /* Footer mobile */
      .footer-links {
        margin-bottom: 20px;
      }

      .social-icon {
        margin: 5px;
      }
    }


    @media (max-width: 768px) {

      /* Ajustements supplémentaires pour petits écrans */
      .hero-section .overlay h1 {
        font-size: 1.8rem;
      }

      .hero-section .overlay p {
        font-size: 0.9rem;
      }

      #countdown {
        font-size: 0.9rem;
      }

      .circle-container {
        width: 250px;
        height: 250px;
      }

      .center-logo {
        width: 120px;
      }

      .user-img {
        width: 40px;
        height: 40px;
      }

      /* Partenaires bande */
      .container.d-flex {
        flex-direction: column;
        gap: 10px;
      }

      /* Événement section */
      .row.mt-2.align-items-center .col-md-6 {
        margin-bottom: 20px;
      }

      .row.mt-2.align-items-center .col-md-6 img {
        max-width: 100%;
        height: auto;
      }

      .btn-join {
        margin-bottom: 30px;
      }
    }

    /* Très petits écrans */
    @media (max-width: 576px) {
      .center-logo {
        width: 300px;
        height: 100px;
      }

      .hero-section {
        height: 650px;
      }

      .hero-section .overlay h1 {
        font-size: 1.5rem;
      }

      .hero-section .overlay p {
        font-size: 0.8rem;
      }

      .btn-lg {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
      }

      #countdown {
        font-size: 0.8rem;
      }

      .circle-container {
        width: 200px;
        height: 200px;
      }

      .center-logo {
        width: 100px;
      }

      .user-img {
        width: 30px;
        height: 30px;
      }

      .forum-title {
        font-size: 1.5rem;
      }

      .btn-join {
        padding: 8px 20px;
      }

      .partners-section h2 {
        font-size: 1.8rem;
      }

      .logo-box {
        width: 60px;
        height: 60px;
        padding: 12px;
      }

      .btn-cta {
        padding: 10px 26px;
        font-size: 0.95rem;
      }

      .countdown-container {
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
      }

      .time-box .number {
        font-size: 2rem;
      }
    }


    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.95);
      }

      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <section>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom container">
      <a class="navbar-brand" href="index.php"><img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Logo Impact Web" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <div class="hamburger" id="hamburgerBtn">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Acceuil</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('evenement') }}">Événements</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">E-learning</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('intervenant') }}">Intervenants</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('billet') }}">Billetterie</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('boutique') }}">Boutique</a></li>
          <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
          <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
        </ul>
      </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center" data-aos="zoom-in">
      <div class="overlay">
        <br><br><br>
        <button class="btn btn-360 mb-3">Impact Web 360 ➔</button>
        <h1 class="display-5">Nous partons de Zéro pour <br> impacter la Jeunesse <br> Africaine.</h1>
        <p class="lead">Comment générer un revenu à 6 chiffres grâce <br> au web ?</p>
        <a href="{{ route('billet') }}" class="btn btn-danger btn-lg mt-3 mb-5"><i class="fa fa-ticket-alt me-2 "></i>Réserver mon billet →</a>

        <div class="countdown-container">
          <div class="time-box">
            <div class="number" id="days">00</div>
            <div class="label">Jours</div>
          </div>
          <div class="time-box">
            <div class="number" id="hours">00</div>
            <div class="label">Heures</div>
          </div>
          <div class="time-box">
            <div class="number" id="minutes">00</div>
            <div class="label">Min</div>
          </div>
          <div class="time-box">
            <div class="number" id="seconds">00</div>
            <div class="label">Sec</div>
          </div>
        </div>

      </div>
      </div>
    </header>

    <a href="#" id="backToTop" class="btn btn-danger shadow position-fixed"
      style="bottom: 20px; right: 20px; display: none; z-index: 9999; border-radius: 50%;">
      <i class="fa fa-arrow-up"></i>
    </a>


  </section>
  <!-- Bande de Partenaires -->
  <section class="py-4 text-white text-center mb-5" style="background-color: red; " data-aos="fade-right">
    <marquee behavior="" direction="">
      <div class="container d-flex flex-wrap justify-content-center gap-4">
        @foreach ($sponsors as $sponsor)
        <div class="me-4 part"><img src="{{ asset('storage/' . $sponsor->logo) }}" alt="" width="50"> &nbsp;&nbsp;&nbsp;&nbsp;♦&nbsp;&nbsp;&nbsp;&nbsp;</div>
        @endforeach
      </div>
    </marquee>
  </section>

  <!-- Statistiques -->
  <section class="py-5 bg-black text-center taille" data-aos="fade-up">
    <div class="container">
      <p class="mb-5" style="color: #ccc;"><strong style="color: white; font-size: 20px;">Impact Web 360</strong> est bien plus qu'un simple événement, c'est un mouvement qui transforme la jeunesse africaine.
        Depuis notre création, nous avons formé et inspiré des centaines de jeunes entrepreneurs à travers des ateliers pratiques, des conférences stimulantes et un réseau solidaire.
        Notre communauté grandissante témoigne de l'impact réel de nos actions sur le développement des compétences digitales en Afrique.
      </p>
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-md-4 mb-4" data-aos="flip-right">
          <h3 class="text-danger">+500</h3>
          <p>participants en 2024</p>
        </div>
        <div class="col-md-4 mb-4">
          <h3 class="text-danger">+15</h3>
          <p>experts et intervenants</p>
        </div>
        <div class="col-md-4 mb-4">
          <h3 class="text-danger">+1000</h3>
          <p>connexions professionnelles</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Événement dynamique -->
  <section class="py-5 text-white text-center" data-aos="zoom-in">
    <div class="container">

      <div>
        <h1 class="mb-3 fw-bold">Impact Web 360 - Edition 2025</h1>
        <p class="mb-4 taille" style="color: #ccc;">Oser sans permissions, c'est maintenant tout commmence ! </p>
      </div>
      <h2 class="mb-3"> </h2>
      <p class="lead"> </p>
      <div class="row mt-2 align-items-center mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="col-md-6 text-start mb-4 mb-md-0">
          <div class="titre-avec-trait">
            <div class="trait-vertical"></div>
            <h5 class="fw-bold">📁 Projet</h5>
          </div>
          <br>

          <div class="titre-avec-trait-noir" data-aos="fade-up" data-aos-delay="200">
            <div class="trait-vertical-noir"></div>
            <h5 class="fw-bold mt-4">📅 Date et Heure</h5>
          </div>
          <br>

          <div data-aos="fade-up" data-aos-delay="200">
            <p><strong>A</strong></p>
            <h5 class="fw-bold mt-4">📍 Lieu</h5>
            <p>Indication du lieu</p>
          </div>

        </div>

        <div class="col-md-6">
          <img src="{{ asset('dossiers/image/logo-tounée.jpg') }}" alt="Image événement" class="img-fluid rounded" style="width: 400px; height: auto;">
        </div>
      </div>
      <div class="mt-4">
        <a href="{{route('billet')}}" class="btn btn-danger me-3 taille">Réserver Mon Billet</a>
        <a href="#" class="text-decoration-underline taille" style="color: #ccc;">En savoir plus</a>
      </div>
    </div>
  </section>

  <!-- Partenaires dynamiques -->
  <section class="partners-section" data-aos="fade-up">
    <div class="container">
      <h2 data-aos="zoom-in">Nos Partenaires Officiels</h2>
      <p data-aos="fade-up" data-aos-delay="100">
        Ils croient en l’impact du digital au Bénin et soutiennent activement notre mission.
        Grâce à leur engagement, Impact Web 360 peut offrir une expérience unique, inspirante et accessible à tous.
      </p>

      <div class="d-flex flex-wrap justify-content-center gap-3 mt-4" data-aos="fade-up" data-aos-delay="200">

        <div class="logo-box" data-aos="zoom-in" data-aos-delay="300">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" alt="Docker">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/gitlab/gitlab-original.svg" alt="GitLab">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-plain.svg" alt="WordPress">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/chrome/chrome-original.svg" alt="Chrome">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg" alt="VS Code">
        </div>

        <div class="logo-box">
          <img src="https://upload.wikimedia.org/wikipedia/commons/d/da/Google_Drive_logo.png" alt="Google Drive">
        </div>

      </div>

      <div class="d-flex flex-wrap justify-content-center gap-3 mt-3" data-aos="fade-up" data-aos-delay="200">
        <div class="logo-box" data-aos="zoom-in" data-aos-delay="300">
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/Microsoft_Excel_2013-2019_logo.svg" alt="Excel">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter">
        </div>

        <div class="logo-box">
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/33/Figma-logo.svg" alt="Figma">
        </div>

        <div class="logo-box">
          <img src="https://upload.wikimedia.org/wikipedia/commons/4/45/Notion_app_logo.png" alt="Notion">
        </div>

        <div class="logo-box">
          <img src="https://resources.jetbrains.com/storage/products/company/brand/logos/WebStorm_icon.png" alt="WebStorm">
        </div>

        <div class="logo-box">
          <img src="https://seeklogo.com/images/S/stripe-logo-9A02E77FC3-seeklogo.com.png" alt="Stripe">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JavaScript">
        </div>

      </div>

      <div class="d-flex flex-wrap justify-content-center gap-3 mt-3" data-aos="fade-up" data-aos-delay="200">

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" alt="Bootstrap">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma 2">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/firebase/firebase-plain.svg" alt="Firebase">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" alt="Node.js">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python">
        </div>

        <div class="logo-box">
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5">
        </div>

      </div>

      <a href="sponsor.php" class="btn btn-cta mt-5">En savoir plus</a>
    </div>
  </section>

  <!-- Section FORUM -->
  <section class="forum-section">
    <div class="container">
      <div class="row align-items-center">
        <!-- Texte -->
        <div class="col-md-6 order-1 order-md-1 text-center-mobile" data-aos="flip-down" data-aos-duration="1000">
          <h2 class="forum-title">Forum Impact Web 360</h2>
          <p class="forum-text mt-3">
            Rejoignez notre espace d'échange privilégié où entrepreneurs débutants et experts se connectent. Partagez vos défis, obtenez des solutions personnalisées et collaborez sur des projets concrets avec d'autres membres ambitieux de notre écosystème.
          </p>
          <button class="btn btn-join mt-4" data-aos="fade-right">Rejoindre</button>
        </div>

        <!-- Cercle + photos -->
        <div class="col-md-6 order-2 order-md-2">
          <div class="circle-container position-relative">
            <div class="rotation-wrapper">
              <!-- Utilisateurs autour -->
              <img src="https://randomuser.me/api/portraits/women/44.jpg" class="user-img img1" alt="user1">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" class="user-img img2" alt="user2">
              <img src="https://randomuser.me/api/portraits/men/45.jpg" class="user-img img3" alt="user3">
              <img src="https://randomuser.me/api/portraits/men/52.jpg" class="user-img img4" alt="user4">
              <img src="https://randomuser.me/api/portraits/men/60.jpg" class="user-img img5" alt="user5">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" class="user-img img6" alt="user6">
            </div>
            <!-- Logo central fixe -->
            <img src="{{ asset('dossiers/image//Impact-Web-360-Logo1.png') }}" alt="Impact Web" class="center-logo">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Section Boutique -->
  <section class="py-5 bg-black text-white">
    <div class="container" data-aos="zoom-in">
      <h2 class="mb-4 fw-bold text-center">Découvrez la boutique officielle <br>
        <span class="fw-bold" style="color: red; font-size: 40px;"> Impact Web 360</span>
      </h2>
      <p class="mb-4 text-center">Affiche ton appartenance à la communauté des acteurs du digital avec nos produits exclusifs ! 👕 T-shirts Officiels, </p>
      <div class="row justify-content-center" data-aos="flip-right">
        <div class="col-md-4 mb-4">
          <div class="card bg-dark text-white h-100" style="width: 20x;">
            <img src="./homme2.png" class="card-img-top" alt="motif">
            <div class="card-body">
              <h5 class="card-title">T-shirt</h5>
              <p class="card-text">450000 FCFA</p>
            </div>
          </div>
        </div>
      </div>
      <center>
        <a href="#" class="btn btn-danger mt-3">Voir plus</a>
      </center>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="footer text-white pt-5 mt-5">
    <div class="container">
      <div class="row">
        <!-- Logo -->
        <div class=" col-12 col-md-4 mb-4 text-center text-md-start">
          <img src="./Impact-Web-360-Logo.png" alt="Logo Impact Web" class="img-fluid" style="max-width: 200px;">
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
          <a href="https://www.facebook.com/share/193YQEPeYH/?mibextid=wwXIfr" class="social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
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
    AOS.init();
    const eventDate = new Date("2025-11-29T09:00:00").getTime();

    function updateCountdown() {
      const now = new Date().getTime();
      const distance = eventDate - now;

      if (distance < 0) {
        document.querySelector(".countdown-container").innerHTML = "<h4>Événement commencé !</h4>";
        return;
      }

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById("days").textContent = String(days).padStart(2, '0');
      document.getElementById("hours").textContent = String(hours).padStart(2, '0');
      document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
      document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
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

  <script>
    const backToTopBtn = document.getElementById("backToTop");

    // Afficher le bouton quand on descend de 200px
    window.onscroll = function() {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTopBtn.style.display = "block";
      } else {
        backToTopBtn.style.display = "none";
      }
    };

    // Animation douce de retour en haut
    backToTopBtn.addEventListener("click", function(e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  </script>
</body>

</html>