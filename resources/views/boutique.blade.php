<div>
  <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Boutique - Impact Web 360</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #000;
      color: #fff;
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

    .product-card {
      position: relative;
      background-color: rgba(28, 31, 38, 0);
      border-radius: 10px;
      transition: transform 0.3s ease;
      border: solid 1px #1C1F26;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .product-item {
      display: block;
    }


    .product-image-container {
      border-radius: 10px 10px 0 0;
      width: 100%;
      height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      margin-bottom: 10px;
    }

    .center-button {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      /* Ajustez la marge si nécessaire */
    }


    .product-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .product-info {
      padding: 10px 15px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .product-title {
      flex-grow: 1;
    }

    .product-price {
      margin-top: auto;
    }

    .product-card:hover {
      transform: translateY(-5px);
    }

    .product-link {
      text-decoration: none;
      color: inherit;
      display: block;
      height: 100%;
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

    .custom-select {
      background-color: #1C1F26;
      color: white;
      border: 1px solid gray;
      padding: 10px;
      border-radius: 6px;
    }

    .filter-color-btn {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      border: none;
      margin: 5px;
      cursor: pointer;
      display: inline-block;
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

      /* Affichage en une seule colonne sur mobile */

      .product-item {
        display: none;
      }

      .product-item.visible {
        display: block;
      }
    }

    /* Ajout de media queries supplémentaires pour de meilleurs responsives */
    @media (max-width: 768px) {

      .product-image-container {
        height: 200px;
      }

      .product-info {
        padding: 15px;
      }

      .product-info h5 {
        margin-bottom: -30px;
      }

      .center-button {
        margin-top: 50px;
      }
    }

    @media (max-width: 576px) {
      .product-image-container {
        height: 200px;
      }

      .product-card {
        margin-bottom: 20px;
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

  <!-- CONTENU -->
  <div class="container-fluid py-5 px-5" style="margin-top: 100px; margin-bottom: 50px;">
    <div class="row v-tab">
      <!-- Filtres -->
      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <button class="btn border-dark w-100 mb-3 d-md-none text-light" data-bs-toggle="collapse"
          data-bs-target="#filtersCollapse">
          Filtres <i class="fas fa-chevron-down"></i>
        </button>
        <div class="collapse d-md-block" id="filtersCollapse">
          <div class="filters">
            <h5>Filtres</h5>
            <form method="GET" action="{{ route('boutique') }}">
              <hr>
              <h6><label for="type">Type</label></h6>
              <select id="type" name="type" class="form-select custom-select mt-2 mb-3">
                <option value="">-- Tous --</option>
                <option value="T-shirt" {{ request('type') == 'T-shirt' ? 'selected' : '' }}>T-shirt</option>
                <option value="Hoodie" {{ request('type') == 'Hoodie' ? 'selected' : '' }}>Hoodie</option>
                <option value="Jeans" {{ request('type') == 'Jeans' ? 'selected' : '' }}>Jeans</option>
                <option value="Short" {{ request('type') == 'Short' ? 'selected' : '' }}>Short</option>
                <option value="Shirt" {{ request('type') == 'Shirt' ? 'selected' : '' }}>Shirt</option>
                <option value="Accessoires" {{ request('type') == 'Accessoires' ? 'selected' : '' }}>Accessoires</option>
                <option value="Autre" {{ request('type') == 'Autre' ? 'selected' : '' }}>Autre</option>
              </select>

              <hr>

              <label for="max_price" class="fw-bold">Prix : &nbsp;</label><span
                id="price-value">{{ request('max_price', 10000) }} FCFA</span>
              <input type="range" class="form-range mb-3" min="100" max="10000" step="500" id="max_price"
                name="max_price" value="{{ request('max_price', 10000) }}">

              <hr>


              <h6><label>Couleur</label></h6>
              <div class="d-flex flex-wrap">
                @if(isset($couleurs))
              @foreach($couleurs as $couleur)
            <div class="me-2 mb-2">
            <input type="radio" name="color" value="{{ $couleur }}"
            id="color-{{ str_replace('#', '', $couleur) }}" {{ request('color') == $couleur ? 'checked' : '' }}
            style="display: none;">
            <label for="color-{{ str_replace('#', '', $couleur) }}" class="filter-color-btn"
            style="background-color: {{ $couleur }}; width: 30px; height: 30px; border-radius: 50%; cursor: pointer; border: 2px solid #fff;"></label>
            </div>
          @endforeach
        @endif
              </div>

              <hr>

              <h6><label for="size">Taille</label></h6>
              <select id="size" name="size" class="form-select custom-select mt-2 mb-3">
                <option value="">-- Toutes --</option>
                <option value="XXS" {{ request('size') == 'XXS' ? 'selected' : '' }}>XXS</option>
                <option value="XS" {{ request('size') == 'XS' ? 'selected' : '' }}>XS</option>
                <option value="S" {{ request('size') == 'S' ? 'selected' : '' }}>S</option>
                <option value="M" {{ request('size') == 'M' ? 'selected' : '' }}>M</option>
                <option value="L" {{ request('size') == 'L' ? 'selected' : '' }}>L</option>
                <option value="XL" {{ request('size') == 'XL' ? 'selected' : '' }}>XL</option>
                <option value="XXL" {{ request('size') == 'XXL' ? 'selected' : '' }}>XXL</option>
                <option value="4XL" {{ request('size') == '4XL' ? 'selected' : '' }}>4XL</option>
              </select>

              <hr>

              <button type="submit" class="btn btn-danger w-100 mt-2">Appliquer</button>
              <a href="{{ route('boutique') }}" class="btn btn-outline-light w-100 mt-3">Réinitialiser</a>
            </form>
          </div>
        </div>
      </div>

      <!-- Produits -->
      <div class="col-12 col-md-8 col-lg-9">
        <div class="row" id="product-list">
          @if(isset($articles) && $articles->count() > 0)
          @foreach($articles as $index => $article)
        <div class="col-12 col-sm-6 col-md-4 mb-4 product-item" data-index="{{ $index }}"
        data-type="{{ $article->type }}" data-size="{{ $article->taille }}" data-color="{{ $article->couleur }}">
        <a href="{{ route('boutique_plus', $article->id) }}" class="product-link">
          <div class="product-card">
          <div class="product-image-container">
          <img src="{{ asset('storage/' . $article->image) }}" class="product-image" alt="{{ $article->nom }}">
          </div>
          <div class="product-info">
          <h5 class="product-title">{{ $article->nom }}</h5>
          <p class="product-price">{{ number_format($article->prix, 0, ',', ' ') }} FCFA</p>
          </div>
          </div>
        </a>
        </div>
        @endforeach
      @else
        <div class="col-12">
        <div class="text-center">
          <h3 class="mb-4">Aucun produit disponible pour le moment</h3>
          <p class="mb-4">Nous travaillons activement à l'ajout de nouveaux produits dans notre boutique.</p>
          <p>Revenez bientôt pour découvrir nos nouveautés !</p>
        </div>
        </div>
      @endif
        </div>
        <div class="center-button">
          <button id="toggleProductsBtn" class="btn btn-danger">Voir plus</button>
        </div>
      </div>
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
    document.addEventListener('DOMContentLoaded', function () {
      const productItems = document.querySelectorAll('.product-item');
      const toggleBtn = document.getElementById('toggleProductsBtn');
      const priceSlider = document.getElementById('max_price');
      const priceValue = document.getElementById('price-value');
      let isExpanded = false; // Par défaut, les produits sont masqués

      // Mise à jour de l'affichage de la valeur du curseur de prix
      if (priceSlider && priceValue) {
        priceSlider.addEventListener('input', function () {
          priceValue.textContent = this.value + ' FCFA';
        });
      }

      // Fonction pour afficher tous les produits
      function showAllProducts() {
        productItems.forEach((item) => {
          item.style.display = 'block';
        });
        toggleBtn.textContent = 'Voir moins';
        isExpanded = true;
      }

      // Fonction pour masquer certains produits (6 premiers seulement)
      function showInitialProducts() {
        productItems.forEach((item, index) => {
          if (index < 6) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
        toggleBtn.textContent = 'Voir plus';
        isExpanded = false;
      }

      // Gérer le clic sur le bouton
      if (toggleBtn) {
        toggleBtn.addEventListener('click', () => {
          if (!isExpanded) {
            showAllProducts();
          } else {
            showInitialProducts();
            document.getElementById('product-list').scrollIntoView({ behavior: 'smooth' });
          }
        });
      }

      // Initial display - show initial products
      showInitialProducts();

      // Afficher le bouton "Voir plus" seulement s'il y a plus de 6 produits
      if (productItems.length <= 6) {
        toggleBtn.style.display = 'none'; // Masquer le bouton si 6 ou moins
      } else {
        toggleBtn.style.display = 'block'; // Afficher le bouton si plus de 6
      }
    });
  </script>

</body>

</html>