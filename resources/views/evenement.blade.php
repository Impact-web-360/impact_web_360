
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nos Événements - Impact Web 360</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #111;
      color: #f0f0f0;
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar-custom {
      background-color: #000066;
      border-radius: 15px;
      margin-top: 20px;
      padding: 10px 20px;
      display: flex;
      align-items: center;
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

    .event-card {
      background: linear-gradient(to bottom right, #151a25, #1e2230);
      border-radius: 1rem;
    }

    .footer {
      background-color: #000066;
      color: #ccccff;
      font-family: 'Segoe UI', sans-serif;
    }

    .footer-links li {
      margin-bottom: 0.5rem;
    }

    .footer-links a{ color: #ccccff; 
      text-decoration: none; 
      display: block; 
      margin-bottom: 0.5rem; 
      transition: all 0.3s ease;
    }
    
    .footer-links a:hover{ 
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

    .btn-danger {
      background-color: #ff4500;
      border-color: #ff4500;
      border-radius: 30px;
    }

    .btn-danger:hover {
      background-color: #cc3700;
      border-color: #cc3700;
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
      }

      .yes{
        margin-bottom: 10px;
      }
      .yes2{
        margin-top: 10px;
      }

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
      <a class="navbar-brand" href="index.php"><img src="logo.png" alt="Logo Impact Web" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <div class="hamburger"  id="hamburgerBtn">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link active" href="evenement.php">Événements</a></li>
          <li class="nav-item"><a class="nav-link" href="#">E-learning</a></li>
          <li class="nav-item"><a class="nav-link" href="intervenant.php">Intervenants</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Billetterie</a></li>
          <li class="nav-item"><a class="nav-link" href="boutique.php">Boutique</a></li>
          <li class="nav-item"><a class="btn btn-light mx-2" href="connexion.html">Se connecter</a></li>
          <li class="nav-item"><a class="btn btn-inscrire" href="inscription.html">S'inscrire</a></li>
        </ul>
      </div>
</nav>

<!-- SECTION : Tous les événements -->
<section class="text-white py-5" style="margin-top: 120px;" >
  <div class="container ">
    <h2 class="mb-3 fw-bold">Nos Événements</h2>
    <p class="mb-4">Chaque événement Impact Web 360 est pensé pour connecter, inspirer et former les passionnés du numérique au Bénin et en Afrique...</p>

    <!-- Aperçu limité -->
    <div class="row g-4" id="evenements-apercu">
      <div class="col-md-6">
        <div class="card bg-transparent border-0 text-white">
          <img src="" class="card-img-top rounded-4" alt="">
          <div class="card-body px-0">
            <small class="text-black"></small>
            <h5 class="mt-2">Thème : </h5>
            <p></p>
            <p><strong>Lieu :</strong> </p>
            <a href="" class="btn btn-danger btn-sm">Réserver <i class="fa-solid fa-arrow-right ms-1"></i></a>

          </div>
        </div>
      </div>

    </div>

    
    <!-- Liste complète cachée au départ -->
    <div class="row g-4 d-none" id="evenements-complet">
      
      <div class="col-md-6">
        <div class="card bg-transparent border-0 text-white">
          <img src="i" class="card-img-top rounded-4" alt="">
          <div class="card-body px-0">
            <small class="text-black"></small>
            <h5 class="mt-2">Thème : ""</h5>
            <p></p>
            <p><strong>Lieu :</p>
            <a href="#" class="btn btn-danger btn-sm">Réserver <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>
      
    </div>

    <div class="mt-4 text-center">
      <button id="btn-decouvrir" class="btn btn-danger"><i class="fas fa-eye me-2"></i>Découvrir tous les événements</button>
      <button id="btn-masquer" class="btn btn-outline-light d-none"><i class="fas fa-eye-slash me-2"></i>Voir moins</button>
    </div>
    

  </div>
</section>

<!-- SECTION : Événement à venir -->

<section class="text-white py-5" style="background-color:rgba(5, 5, 41, 0.6);">
  <div class="container">
    <h2 class="mb-3">Événement à venir</h2>
    <p class="mb-4">Ne rate pas le prochain rendez-vous de la communauté Impact Web 360. Réserve ta place dès maintenant !</p>
    <div class="event-card p-4 rounded-4 text-center ">
      <img src="" class="img-fluid rounded mb-3 " alt="Image événement">
      <h4></h4>
      <p><strong>Date :</strong> </p>
      <p><strong>Heure :</strong> </p>
      <p><strong>Lieu :</strong></p>
      <p><strong>Thème :</strong></p>
      <p><strong>Description :</strong></p>
      <a href="#" class="btn btn-danger btn-lg mt-3">Réserver mon billet <i class="fa-solid fa-arrow-right ms-1"></i></a>
    </div>
  </div>
</section>

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
  const btnDecouvrir = document.getElementById('btn-decouvrir');
  const btnMasquer = document.getElementById('btn-masquer');
  const evenementsApercu = document.getElementById('evenements-apercu');
  const evenementsComplet = document.getElementById('evenements-complet');

  btnDecouvrir.addEventListener('click', () => {
    evenementsComplet.classList.remove('d-none');
    evenementsApercu.classList.add('d-none');
    btnDecouvrir.classList.add('d-none');
    btnMasquer.classList.remove('d-none');
  });

  btnMasquer.addEventListener('click', () => {
    evenementsComplet.classList.add('d-none');
    evenementsApercu.classList.remove('d-none');
    btnMasquer.classList.add('d-none');
    btnDecouvrir.classList.remove('d-none');
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
