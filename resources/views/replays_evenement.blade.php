<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Replay - Edition 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
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

    h2 span {
      color: red;
    }

    .btn-custom {
      background-color: red;
      color: white;
      transition: background-color 0.3s ease;
    }

    .btn-custom:hover { background: linear-gradient(90deg, #ff3300, #DD2476); color: #000000; transform: scale(1.05); }

    .fleche {
      background-color: transparent;
      border: 1px solid white;
      color: white;
    }

    .fleche:hover {
      background-color: white;
      color: black;
      transform: scale(1.1);
    }
    .rating-stars {
      color: #FFB400;
    }

    .download-link {
      color: red;
      text-decoration: none;
      font-weight: 600;
    }

    .download-link:hover {
      text-decoration: underline;
    }

    .testimonial-img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #fff;
    }

    .text-muted {
      color: #cccccc !important;
    }

    .video-container {
      border: 2px solid red;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s ease;
      cursor: pointer;
    }

    .video-container:hover {
      transform: scale(1.02);
    }

    .video-player {
      width: 100%;
      height: 100%;
      background-color: #000;
    }

    .nav-buttons button {
      border-radius: 50%;
      width: 36px;
      height: 36px;
      padding: 0;
    }

    .section-description {
      max-width: 700px;
      margin: 0 auto 2rem auto;
      line-height: 1.6;
      font-size: 1rem;
      color: #cccccc;
    }

    /* Styles pour la vue détaillée */
    .video-detail-container {
      display: none;
      margin-bottom: 30px;
    }

    .video-detail {
      width: 100%;
      margin-bottom: 20px;
    }

    .video-list-container {
      max-height: 800px;
      overflow-y: auto;
      padding-right: 15px;
    }

    .video-list-item {
      display: flex;
      margin-bottom: 15px;
      cursor: pointer;
      transition: all 0.3s ease;
      padding: 5px;
      border-radius: 5px;
    }

    .video-list-item:hover {
      background-color: #222;
    }

    .video-list-thumbnail {
      width: 168px;
      height: 94px;
      border-radius: 5px;
      margin-right: 10px;
      flex-shrink: 0;
      position: relative;
      overflow: hidden;
      background-color: #000;
    }

    .video-list-thumbnail video {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .video-list-info {
      flex-grow: 1;
    }

    .video-list-title {
      font-weight: bold;
      margin-bottom: 5px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .video-list-channel {
      font-size: 0.8rem;
      color: #aaa;
    }

    /* Styles pour la grille de vidéos */
    .video-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-bottom: 30px;
    }

    .video-grid-item {
      cursor: pointer;
    }

    .video-grid-thumbnail {
      width: 100%;
      height: 0;
      padding-bottom: 56.25%; /* 16:9 aspect ratio */
      position: relative;
      margin-bottom: 10px;
      background-color: #000;
      border-radius: 8px;
      overflow: hidden;
    }

    .video-grid-thumbnail video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .video-grid-info {
      padding: 0 5px;
    }

    .video-grid-title {
      font-weight: bold;
      margin-bottom: 5px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .video-grid-channel {
      font-size: 0.8rem;
      color: #aaa;
    }

    @media (max-width: 976px) {
      .video-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .navbar-brand img { margin-top: -70px; max-height: 180px; margin-left: -30px;; }
      .navbar-brand { max-height: 50px; }
      .navbar-custom { margin-top: 10px; }
      .yes{margin-bottom: 10px;}
      .yes2{margin-top: 10px;}
      #navbarNav { background-color:rgb(0, 0, 102); width: 100%; padding: 40px; position: absolute; top: 59px; left: 0; z-index: 999; text-align: left; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px; }
      #navbarNav .nav-link { text-align: left; font-size: 22px; margin-top: 10px; font-weight: bod; }
      #navbarNav .btn{ margin-top: 50px; width: 100%; }
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

    @media (max-width: 768px) {
      .video-grid {
        grid-template-columns: 1fr;
      }
      
      .video-detail-container {
        flex-direction: column;
      }
      
      .video-list-container {
        max-height: none;
        margin-top: 20px;
      }
    }
  </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom container">
      <a class="navbar-brand" href="index.php"><img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png')}}" alt="Logo Impact Web" /></a>
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
          <li class="nav-item"><a class="nav-link active" href="{{ route('evenement') }}">Événements</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('elearning') }}">E-learning</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('intervenant') }}">Intervenants</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('evenement') }}">Billetterie</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('boutique') }}">Boutique</a></li>
          <li class="nav-item"><a class="btn btn-light mx-2" href="{{ route('login') }}">Se connecter</a></li>
          <li class="nav-item"><a class="btn btn-inscrire" href="{{ route('register') }}">S'inscrire</a></li>
        </ul>
      </div>
    </nav>

    <a href="#" id="backToTop" class="btn shadow position-fixed text-white" 
      style="bottom: 20px; right: 20px; display: none; z-index: 9999; border-radius: 50%; background-color: #ff4500;">
      <i class="fa fa-arrow-up"></i>
    </a>

  <div class="container py-5">

    <h2 class="mb-3 text-center fw-bold" style="margin-top: 100px;">
      Édition 2024 : <span class="fw-semibold">"Le digital comme moteur d'opportunités"</span>
    </h2>

    <p class="text-muted section-description text-center mb-5">
      Chaque replay est une source d'inspiration, de formation et d'opportunités pour les passionnés du digital,
      les entrepreneurs et les curieux du web.
    </p>

    <div id="videoDetailContainer" class="video-detail-container">
      <div class="row">
        <div class="col-lg-8">
          <div class="ratio ratio-16x9 video-detail">
            <video controls autoplay class="video-player" id="mainVideoPlayer">
              <source src="" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de vidéos.
            </video>
          </div>
          
          <div class="d-flex justify-content-center align-items-center my-3">
            <span class="rating-stars fs-4 me-2">★★★★★</span>
          </div>

          <h3 id="videoDetailTitle" class="mb-3" style="color: red;"></h3>
          <p id="videoDetailDescription" class="section-description"></p>

          <div class="d-flex align-items-center justify-content-center mb-4">
            <img id="videoDetailPresentateurImg" src="" alt="" class="testimonial-img me-3">
            <div class="text-start">
              <strong id="videoDetailPresentateurNom"></strong><br>
              <small class="text-muted" id="videoDetailPresentateurPoste"></small>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-4">
            <span id="videoDetailSupport" class="text-muted"></span>
            <a id="videoDetailSupportLink" href="#" class="download-link" style="display: none;">📥 Télécharger les supports</a>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="video-list-container">
            <h5 class="mb-3">Autres replays disponibles</h5>
            <div id="videoList">
              </div>
          </div>
        </div>
      </div>
      
      <div class="d-flex justify-content-center mt-4">
        <button onclick="hideVideoDetail()" class="btn btn-custom px-4">Retour à la liste</button>
      </div>
    </div>

    <div id="videoGridContainer" class="video-grid">
      @foreach($replays as $replay)
      <div class="video-grid-item" onclick="showVideoDetail('{{ $replay->id }}')">
        <div class="video-grid-thumbnail">
          <video autoplay loop muted>
            <source src="{{ $replay->video_path }}" type="video/mp4">
          </video>
        </div>
        <div class="video-grid-info">
          <div class="video-grid-title">{{ $replay->titre }}</div>
          <div class="video-grid-channel">{{ $replay->presentateur_nom }}</div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center gap-3">
      <button class="btn btn-custom px-4">Précédent</button>
      <button class="btn btn-custom px-4">Suivant</button>
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
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  // Données des vidéos
  const videos = {
    @foreach($replays as $replay)
    '{{ $replay->id }}': {
      id: '{{ $replay->id }}',
      videoUrl: '{{ $replay->video_path }}',
      title: '{{ $replay->titre }}',
      description: {{ $replay->description }}, // Correction: Utilisation de ` pour les chaînes multilignes
      presentateurImg: '{{ $replay->presentateur_image ? $replay->presentateur_image : '' }}',
      presentateurNom: '{{ $replay->presentateur_nom }}',
      presentateurPoste: '{{ $replay->presentateur_poste }}',
      supportUrl: '{{ $replay->support_url }}'
    },
    @endforeach
  };

  // Afficher le détail d'une vidéo
  function showVideoDetail(videoId) {
    const video = videos[videoId];
    if (!video) return;
    
    // Mettre à jour le lecteur vidéo principal
    const videoPlayer = document.getElementById('mainVideoPlayer');
    const source = videoPlayer.querySelector('source');
    source.src = video.videoUrl;
    videoPlayer.load();
    
    // Lancer la lecture de la vidéo après l'avoir chargée
    videoPlayer.play().catch(error => {
        console.error("La lecture automatique a été bloquée : ", error);
    });

    // Mettre à jour les autres informations
    document.getElementById('videoDetailTitle').textContent = video.title;
    document.getElementById('videoDetailDescription').textContent = video.description;
    
    const presentateurImg = document.getElementById('videoDetailPresentateurImg');
    if (video.presentateurImg) {
      presentateurImg.src = video.presentateurImg;
      presentateurImg.alt = video.presentateurNom;
    } else {
      presentateurImg.src = ''; // Réinitialise l'image si elle n'existe pas
      presentateurImg.alt = '';
    }
    
    document.getElementById('videoDetailPresentateurNom').textContent = video.presentateurNom;
    document.getElementById('videoDetailPresentateurPoste').textContent = video.presentateurPoste;
    
    // Gérer les supports
    const supportLink = document.getElementById('videoDetailSupportLink');
    if (video.supportUrl) {
      supportLink.href = video.supportUrl;
      supportLink.style.display = 'inline';
      document.getElementById('videoDetailSupport').textContent = 'Supports disponibles :';
    } else {
      supportLink.style.display = 'none';
      document.getElementById('videoDetailSupport').textContent = 'Aucun support disponible';
    }
    
    // Mettre à jour la liste des vidéos
    const videoList = document.getElementById('videoList');
    videoList.innerHTML = '';
    
    Object.values(videos).forEach(v => {
      if (v.id !== videoId) {
        const videoItem = document.createElement('div');
        videoItem.className = 'video-list-item';
        videoItem.onclick = () => showVideoDetail(v.id);
        videoItem.innerHTML = `
          <div class="video-list-thumbnail">
            <video autoplay loop muted>
              <source src="${v.videoUrl}" type="video/mp4">
            </video>
          </div>
          <div class="video-list-info">
            <div class="video-list-title">${v.title}</div>
            <div class="video-list-channel">${v.presentateurNom}</div>
          </div>
        `;
        videoList.appendChild(videoItem);
      }
    });
    
    // Basculer entre les vues
    document.getElementById('videoGridContainer').style.display = 'none';
    document.getElementById('videoDetailContainer').style.display = 'block';
    
    // Scroll vers le haut
    window.scrollTo({top: 0, behavior: 'smooth'});
  }
  
  // Cacher le détail de la vidéo et revenir à la grille
  function hideVideoDetail() {
    document.getElementById('videoGridContainer').style.display = 'grid';
    document.getElementById('videoDetailContainer').style.display = 'none';
    const videoPlayer = document.getElementById('mainVideoPlayer');
    videoPlayer.pause();
    videoPlayer.querySelector('source').src = '';
    videoPlayer.load();
  }

  // Charger automatiquement la première vidéo si paramètre dans l'URL
  document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const videoId = urlParams.get('video');
    if (videoId && videos[videoId]) {
      showVideoDetail(videoId);
    }

    const toggler = document.querySelector('.navbar-toggler');
    const hamburger = document.getElementById('hamburgerBtn');

    toggler.addEventListener('click', () => {
      hamburger.classList.toggle('active');
    });

    // Charger l'image de poster pour les miniatures
    const videosInGrid = document.querySelectorAll('.video-grid-thumbnail video');
    videosInGrid.forEach(video => {
        video.load();
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