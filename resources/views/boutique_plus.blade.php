<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($produit['nom']) ?> - Impact Web 360</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    .product-image img {
      width: 100%;
      border-radius: 10px;
    }

    .color-circle {
      width: 20px;
      height: 20px;
      border-radius: 50%;
      border: 2px solid white;
      display: inline-block;
      margin-right: 10px;
      cursor: pointer;
    }

    .size-option {
      margin-right: 10px;
    }

    .card-review {
      background-color: #1C1F26;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
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

    .btn-inscrire:hover {
      background: linear-gradient(90deg, #ff3300, #ff4d00);
    }


    .btn-secondary {
      background-color: #33394a;
      border: none;
      color: #fff;
      padding: 5px 15px;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn-secondary:hover {
      background-color: #555f7f;
    }

    .footer {
      background-color: #000066;
      color: #ccccff;
      padding: 40px 0 20px;
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

    .navbar-links a:hover {
      color: #ff3300;
    }

    .social-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #ff4500;
      color: white;
      text-decoration: none;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      margin: 0 5px;
      font-size: 16px;
      transition: transform 0.3s ease, background-color 0.3s ease;
    }


    .social-icon:hover {
      transform: scale(1.1);
      background-color: #cc3700;
    }

    .newsletter-section {
      background-color: #ff4500;
      color: white;
      padding: 40px 0;
      text-align: center;
    }

    .newsletter-section input[type="email"] {
      border-radius: 50px;
      padding: 10px;
      border: none;
      width: 53%;
      ;
    }

    .newsletter-section button {
      border-radius: 50px;
      padding: 10px;
      border: none;
      background-color: white;
      color: black;
      font-weight: bold;
      cursor: pointer;
      width: 53%;
      font-size: 100%;
    }

    .newsletter-section button:hover {
      background-color: rgb(231, 231, 231);
      color: black;
    }

    .scroll-container {
      width: 100%;
    }

    .scroll-content {
      width: max-content;
      animation: scroll-loop 60s linear infinite;
    }

    .scroll-container {
      width: 100%;
    }

    @keyframes scroll-loop {
      0% {
        transform: translateX(0%);
      }

      100% {
        transform: translateX(-50%);
      }
    }


    /* Dégradé début/fin */
    .scroll-mask::before,
    .scroll-mask::after {
      content: "";
      position: absolute;
      top: 0;
      width: 30px;
      height: 100%;
      z-index: 10;
      pointer-events: none;
    }

    .scroll-mask::before {
      left: 0;
      background: linear-gradient(to right, #000 0%, transparent 100%);
    }

    .scroll-mask::after {
      right: 0;
      background: linear-gradient(to left, #000 0%, transparent 100%);
    }

    @media (max-width: 576px) {
      .product-thumb {
        display: none;
      }
      }

    @media (max-width: 976px) {
      .navbar-brand img {
        margin-top: -70px;
        max-height: 180px;
        margin-left: -30px;
      }


      .product-image img {
        margin-bottom: 20px;
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

      /* Améliorations responsives */
      .container-fluid.py-5.px-5 {
        padding-left: 15px !important;
        padding-right: 15px !important;
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
        <li class="nav-item"><a class="nav-link" href="{{ route('step1') }}">Billetterie</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('boutique') }}">Boutique</a></li>
        <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
        <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
      </ul>
    </div>
  </nav>

  <!-- CONTENU PRODUIT -->
  <div class="container py-5" style="margin-top: 100px;">
    <div class="row">
      <div class="col-md-2">
        <div class="product-thumb mb-3">
          <img src="{{ asset('storage/' . $produit->image) }}" alt="thumb" class="img-fluid rounded">
        </div>
      </div>
      <div class="col-md-5 product-image">
        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="img-fluid rounded">
      </div>
      <div class="col-md-5">
        <h2>{{ $produit->nom }}</h2>
        <p><span class="text-warning fs-3">★★★★☆</span> 4.5/5</p>
        <h3>{{ number_format($produit->prix, 0, '', ' ') }} F</h3>
        <p class="mb-3">{{ $produit->description }}</p>

        <h6>Couleurs </h6>
        <div>
          <span class="color-circle"
            style="background-color:{{ $produit->couleur }}; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid #fff;"></span>
        </div>

        <h6 class="mt-4">Taille disponible </h6>
        <div class="btn-group mb-5" role="group">
          <label class="btn btn-dark px-5 rounded-5 text-white">{{ $produit->taille }}</label>
        </div>

        <div class="d-flex align-items-center">
          <div class="bg-dark rounded-5 py-1" style="color: #ff4500">
            <button class="btn bg-transparent btn-sm text-light rounded-5"><i class="fas fa-plus" style="color: #ff4500"></i></button>
            <span class="mx-2">1</span>
            <button class="btn bg-transparent text-light btn-sm rounded-5"><i class="fas fa-minus"style="color: #ff4500"></i></button>
          </div>
          <button class="btn btn-inscrire ms-3 py-2 px-5 btn-sm rounded-5">Ajouter au panier</button>
        </div>
      </div>
    </div>

    <hr class="my-5">

    <!-- COMMENTAIRES -->
    <div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Notes et commentaires</h4>
        <div class="d-flex justify-content-between align-items-center">
          <button class="btn btn-inscrire rounded-5 btn-md" onclick="showCommentForm()">Laisser un avis</button>
        </div>
      </div>
      <h5 class="mb-4">Tous les avis ({{ count($comments) }})</h5>


      @if ($comments->count())
      <div class="scroll-mask position-relative">
      <div class="scroll-container overflow-hidden position-relative">
        <div class="scroll-content d-flex">
        @foreach ([$comments, $comments] as $commentSet)
        @foreach ($commentSet as $c)
        <div class="card card-review p-4 mx-2 text-white" style="width: 400px; flex: 0 0 auto;">
        <span class="text-warning fs-4">
        {!! str_repeat('★', $c->note) . str_repeat('☆', 5 - $c->note) !!}
        </span>
        <h5>{{ $c->auteur }}
        <span><i class="fas fa-check-circle text-success ms-2"></i></span>
        </h5>
        <p>{!! nl2br(e($c->commentaire)) !!}</p>
        <small>Affiché le {{ \Carbon\Carbon::parse($c->date_publication)->translatedFormat('d F Y') }}</small>
        </div>
        @endforeach
      @endforeach
        </div>
      </div>
      </div>
    @else
      <p class="text-muted fst-italic">Aucun commentaire pour le moment.</p>
    @endif

      @if (session('comment_error'))
      <div class="alert alert-danger mt-3">{{ session('comment_error') }}</div>
    @endif

      <!-- Formulaire -->
      <div id="comment-form" class="mt-5 d-none">
        <h4>Laisser un avis</h4>
        <form method="POST" action="{{ route('produit.commentaire', $produit->id) }}" class="mb-4">
          @csrf
          <div class="mb-3">
            <label for="auteur" class="form-label">Nom</label>
            <input type="text" class="form-control" id="auteur" name="auteur" required>
          </div>
          <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <select class="form-select" id="note" name="note" required>
              <option value="">Choisissez une note</option>
              <option value="5">★★★★★</option>
              <option value="4">★★★★☆</option>
              <option value="3">★★★☆☆</option>
              <option value="2">★★☆☆☆</option>
              <option value="1">★☆☆☆☆</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="commentaire" class="form-label">Commentaire</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-inscrire py-2 btn-md">Envoyer</button>
        </form>
      </div>
    </div>

    <hr class="my-5">

    <!-- SUGGESTIONS -->
    <h1 class="mb-5 text-center">Vous aimerez aussi</h1>

    <!-- Wrapper pour le scroll horizontal -->
    <div class="d-md-none overflow-auto" style="white-space: nowrap;">
      <div class="d-flex flex-nowrap">
        @foreach ($suggestions as $sugg)
      <a href="{{ route('boutique', $sugg->id) }}" class="text-decoration-none text-white me-3"
        style="flex: 0 0 auto; width: 75%;">
        <div class="product-card bg-transparent p-3" style="border-radius:10px;">
        <img src="{{ asset('storage/' . $sugg->image) }}" class="img-fluid rounded mb-3" alt="{{ $sugg->nom }}"
          style="height: 300px; width: 100%; object-fit: cover;">
        <h5>{{ $sugg->nom }}</h5>
        <p>{{ number_format($sugg->prix, 0, '', ' ') }} FCFA</p>
        </div>
      </a>
    @endforeach
      </div>
    </div>

    <!-- Grille normale sur desktop -->
    <div class="row g-4 d-none d-md-flex">
      @foreach ($suggestions as $sugg)
      <div class="col-md-4">
      <a href="{{ route('boutique_plus', $sugg->id) }}" class="text-decoration-none text-white">
        <div class="product-card bg-transparent p-3" style="border-radius:10px;">
        <img src="{{ asset('storage/' . $sugg->image) }}" class="img-fluid rounded mb-3" alt="{{ $sugg->nom }}"
          style="height: 300px; width: 100%; object-fit: cover;">
        <h5>{{ $sugg->nom }}</h5>
        <p>{{ number_format($sugg->prix, 0, '', ' ') }} FCFA</p>
        </div>
      </a>
      </div>
    @endforeach
    </div>

  </div>

  <!-- Newsletter -->
  <div class="newsletter-section">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 text-center mb-3 mb-md-0">
          <h3>Restez à jour sur nos dernières offres</h3>
        </div>
        <div class="col-md-6">
          <form method="POST" action="boutique.php"
            class="d-flex flex-column justify-content-center align-items-center">
            <input type="email" name="email_newsletter" placeholder="Entrer votre adresse email"
              class="form-control text-center" required />
            <button type="submit" class="btn mt-2">S'abonner à la Newsletter</button>
          </form>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function showCommentForm() {
      const form = document.getElementById('comment-form');
      if (form.classList.contains('d-none')) {
        form.classList.remove('d-none');
        form.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>

</body>

</html>