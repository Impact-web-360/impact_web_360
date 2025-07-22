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
    body { background-color: #000; color: #fff; font-family: 'Segoe UI', sans-serif; }
    .navbar-custom { background-color: #000066; border-radius: 15px; margin-top: 20px; padding: 10px 20px; height: 70px; }
    .navbar-brand img { max-height: 160px; width: auto; }
    .btn-danger { background-color: #ff3300; border-radius: 50px; padding: 10px 20px; border: none; }
    .btn-danger:hover { background-color: #cc2900; }
    .btn-inscrire { background: linear-gradient(90deg, #ff4d00, #ff3300); color: white; border: none; border-radius: 8px; }
    .filters { background-color:rgba(28, 31, 38, 0); padding: 0 10px; border-radius: 10px; color: white; }
    .product-card { background-color:rgba(28, 31, 38, 0); border-radius: 10px; padding: 15px; transition: transform 0.3s ease; height: 100%;border: solid 1px #1C1F26; }
    .product-card:hover { transform: translateY(-5px); }
    .product-link { text-decoration: none; color: inherit; display: block; height: 100%; }
    .newsletter-section { background-color: #ff4500; color: white; padding: 40px 0; text-align: center; }
    .newsletter-section input[type="email"] { border-radius: 50px; padding: 10px; border: none; width: 53%;; }
    .newsletter-section button { border-radius: 50px; padding: 10px; border: none; background-color: white; color: black; font-weight: bold; cursor: pointer; width: 53%; font-size: 100%;}
    .newsletter-section button:hover { background-color:rgb(231, 231, 231); color: black; }
    .custom-select {background-color: #1C1F26; color: white; border: 1px solid gray; padding: 10px; border-radius: 6px;}
    .filter-color-btn { width: 25px; height: 25px; border-radius: 50%; border: none; margin: 5px; cursor: pointer; display: inline-block; }
    .footer { background-color: #000066; color: #ccccff; padding: 40px 0 20px; }
    .footer-links a{ color: #ccccff; text-decoration: none; display: block; margin-bottom: 0.5rem; transition: all 0.3s ease;}
    .footer-links a:hover{ color: #ff4500; padding-left: 4px;}
    .navbar-links a:hover{color: #ff3300;}
    .social-icon { display: inline-block; background-color: #ff4500; color: white; width: 36px; height: 36px; text-align: center; line-height: 36px; border-radius: 50%; margin: 0 5px; font-size: 16px; transition: transform 0.3s ease, background-color 0.3s ease;}
    .social-icon:hover { transform: scale(1.1); background-color: #cc3700;}
    @media (max-width: 976px) {
      .navbar-brand img { margin-top: -65px; max-height: 180px; margin-left: -30px; }
      .navbar-brand { max-height: 50px; }
      .navbar-custom { margin-top: 10px; border-radius: 15px;width: 100vw;}
      .img-fluid{margin-top: -60px; margin-bottom: -60px;}
      .product-card { margin-top: 30x; }
      .yes{margin-bottom: 10px;}
      .yes2{margin-top: 10px;}
      .newsletter-section input[type="email"],
      .newsletter-section button {width: 90%;}

      #navbarNav {
        background-color:rgb(0, 0, 102);
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

      #navbarNav .btn{
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
          <li class="nav-item"><a class="nav-link" href="{{ route('billet') }}">Billetterie</a></li>
          <li class="nav-item"><a class="nav-link active" href="{{ route('boutique') }}">Boutique</a></li>
          <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
          <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
        </ul>
      </div>
    </nav>

<!-- CONTENU -->
<div class="container-fluid py-5 px-3" style="margin-top: 100px; margin-bottom: 50px;">
  <div class="row">
    <!-- Filtres -->
    <div class="col-12 col-md-3 mb-4">
      <button class="btn border-dark w-100 mb-3 d-md-none text-light" data-bs-toggle="collapse" data-bs-target="#filtersCollapse">
        Filtres <i class="fas fa-chevron-down"></i>
      </button>
      <div class="collapse d-md-block" id="filtersCollapse">
        <div class="filters">
          <h5>Filtres</h5>
          <form method="GET" action="boutique.php">
            <h6><label for="type">Type</label></h6>
            <select id="type" name="type" class="form-select custom-select mt-2 mb-3">
              <option value="">-- Tous --</option>
            </select>

            <label for="max_price" class="fw-bold">Prix :  FCFA</label>
            <input type="range" class="form-range mb-3" min="1000" max="15000" step="500" id="max_price" name="max_price" >


            <h6><label>Couleur</label></h6>
              <label class="filter-color-btn" >
                <input type="radio" name="color" value="" style="display:none" ;>
              </label>
            <br>
            <label><input type="radio" name="color" value=""> Toutes les couleurs</label>

            <hr>

            <h6><label for="size">Taille</label></h6>
            <select id="size" name="size" class="form-select custom-select mt-2 mb-3">
              <option value="">-- Toutes --</option>
              

            </select>

            <button type="submit" class="btn btn-danger w-100 mb-3">Appliquer</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Produits -->
    <div class="col-12 col-md-9">
      <div class="row" id="product-list">
            <div class="col-6 col-md-4 mb-4 product-item">
              <a href="" class="product-link">
                <div class="product-card">
                  <img src="" class="img-fluid mb-2" alt="">
                  <h5></h5>
                  <p> FCFA</p>
                  <!--<p>Type : </p>
                  <p>Taille :</p>
                  <p>Couleur : <span style="display:inline-block;width:20px;height:20px;background-color;border:1px solid #ccc;"></span></p> 
                  -->
                </div>
              </a>
            </div>
          <p class="text-center">Aucun produit disponible pour le moment.</p>
      </div>
        <div class="text-center mt-3">
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
                
                    <div class="alert alert-success mt-3"></div>
                    <div class="alert alert-danger mt-3"></div>
            </div>
            <div class="col-md-6">
                <form method="POST" action="boutique.php" class="d-flex flex-column justify-content-center align-items-center">
                    <input type="email" name="email_newsletter" placeholder="Entrer votre adresse email" class="form-control text-center" required />
                    <button type="submit" class="btn mt-2">S'abonner à la Newsletter</button>
                </form>
            </div>
        </div>
    </div>
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
  const toggleBtn = document.getElementById('toggleProductsBtn');
  let isExpanded = false;

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      const allItems = document.querySelectorAll('.product-item');

      if (!isExpanded) {
        allItems.forEach(item => item.style.display = 'block');
        toggleBtn.textContent = 'Voir moins';
        isExpanded = true;
      } else {
        allItems.forEach((item, index) => {
          if (index >= 6) item.style.display = 'none';
        });
        toggleBtn.textContent = 'Voir plus';
        isExpanded = false;
        document.getElementById('product-list').scrollIntoView({ behavior: 'smooth' });
      }
    });
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
