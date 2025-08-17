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
      background-color: #000;
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
      background: #000;
      border-radius: 1rem;
      border: 1px solid #444;
    }

    .event-card-body {
      border-bottom-left-radius: 1rem;
      border-bottom-right-radius: 1rem;
    }

    .footer {
      background-color: #000066;
      color: #ccccff;
      font-family: 'Segoe UI', sans-serif;
    }

    .footer-links li {
      margin-bottom: 0.5rem;
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
        margin-top: -70px;
        max-height: 180px;
        margin-left: -30px;
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
    }

    @media (max-width: 768px) {
      .event-card-top img {
        width: 100% !important;
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
        <li class="nav-item"><a class="nav-link active" href="{{ route('evenement') }}">Événements</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('elearning') }}">E-learning</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('intervenant') }}">Intervenants</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('step1') }}">Billetterie</a></li>
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


  <!-- SECTION : Tous les événements -->
  <section class="text-white py-5" style="margin-top: 100px;">
    <div class="container ">
      <h2 class="mb-3 fw-bold">Nos Événements</h2>
      <p class="mb-4 fs-6">Chaque événement impact Web 360 est pensé pour connecter, inspirer et former les pasionnés du
        numérique au Bénin et en Afrique. <br> Entre conférences, ateliers, panels et sessions de networking, nos
        rencontres offrent une expérience unique autour <br> des métiers du digital, de l'entrepreneuriat et de
        l'innovation.</p>

      <!-- Aperçu limité -->
      <div class="row g-4" id="evenements-liste">
        @foreach ($evenements as $evenement)
      <div class="col-md-6 evenement-item">
        <div class="card bg-transparent border-3 text-white">
        <img src="{{ $evenement->image }}" class="card-img-top w-100 rounded"
          style="max-height: 400px; object-fit: cover;" alt="">
        <div class="card-body px-0">
          <p class="fs-6">{{ $evenement->date_debut }}</p>
          <h5>Thème : "{{ $evenement->theme }}"</h5>
          <a href="{{ route('replays_evenement', ['id' => $evenement->id]) }}" class=" text-decoration-none mt-3">Replay disponibles <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        <a href="{{ route('step1', ['evenementId' => $evenement->id]) }}" class="btn btn-danger btn-lg mt-1">Réserver mon billet <i class="fa-solid fa-arrow-right ms-1"></i></a>
      </div>
    @endforeach
      </div>
    </div>

    @if(count($evenements) > 2)
    <div class="mt-4 text-center">
      <button id="btn-decouvrir" class="btn btn-danger"><i class="fas fa-eye me-2"></i>Découvrir tous les
        événements</button>
    </div>
    @endif


    </div>
  </section>

  <!-- SECTION : Événement à venir -->

  <section class="text-white py-5">
    <div class="container">
      <h2 class="mb-3">Événements à venir</h2>
      <p class="mb-4">Ne rate pas les prochains rendez-vous de la communauté Impact Web 360. Réserve ta place dès
        maintenant !</p>

      @if(count($evenements) > 0)
      <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">

        @foreach($evenements as $index => $evenement)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
      <div class="event-card rounded-4 text-center">
        <img src="{{ $evenement->image }}" class="img-fluid p-4 rounded w-50 mx-auto"
        alt="Image événement">
        <div class="event-card-body bg-dark p-4">
        <h4>{{ $evenement->nom }}</h4>
        <p class="mb-1"><strong>Date : </strong>{{ $evenement->date_debut }}</p>
        <p class="mb-1"><strong>Heure : </strong>{{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}
        </p>
        <p class="mb-1"><strong>Lieu : </strong>{{ $evenement->lieu }}</p>
        <p class="mb-1"><strong>Thème : </strong>{{ $evenement->theme }}</p>
        <p class="mb-1"><strong>Description : </strong>{{ $evenement->description }}</p>
        <a href="{{ route('step1', ['evenementId' => $evenement->id]) }}" class="btn btn-danger btn-lg mt-3">Réserver mon billet <i
        class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
      </div>
      </div>
      @endforeach

      </div>

      <!-- Contrôles manuels -->
      <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
      </button>
      </div>
    @else
      <p class="text-center">Aucun événement à venir pour le moment.</p>
    @endif
    </div>
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
            <li><a href="{{ route('elearning') }}">E-learning</a></li>
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
    document.addEventListener('DOMContentLoaded', () => {
      const evenementItems = document.querySelectorAll('.evenement-item');
      const btnDecouvrir = document.getElementById('btn-decouvrir');
      const btnMasquer = document.getElementById('btn-masquer');

      const afficherNombre = (nombre) => {
        evenementItems.forEach((item, index) => {
          if (index < nombre) {
            item.classList.remove('d-none');
          } else {
            item.classList.add('d-none');
          }
        });
      };

      // Afficher seulement 2 événements au chargement
      afficherNombre(2);

      // Au clic sur "Découvrir"
      btnDecouvrir.addEventListener('click', () => {
        afficherNombre(evenementItems.length);
        btnDecouvrir.classList.add('d-none');
        btnMasquer.classList.remove('d-none');
      });

      // Au clic sur "Voir moins"
      btnMasquer.addEventListener('click', () => {
        afficherNombre(2);
        btnMasquer.classList.add('d-none');
        btnDecouvrir.classList.remove('d-none');
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
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