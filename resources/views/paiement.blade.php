<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Impact Web 360 - Paiement</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    
    body {
  background-color: #121212;
  color: #fff;
  font-family: 'Montserrat', sans-serif;
  overflow-x: hidden;
}

.sidebar {
  background-color: #1c1c1c;
  height: 100vh;
  padding: 1.5rem 1rem;
  position: fixed;
  left: 0;
  top: 0;
  width: 250px;
  z-index: 1000;
  transition: transform 0.3s ease-in-out;
  display: flex;
  flex-direction: column;
  overflow-y: scroll; /* Cache la barre de défilement */
   scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none; /* IE/Edge */
}

.sidebar::-webkit-scrollbar {
  display: none; /* Chrome/Safari/Opera */
}
    .sidebar.hidden {
      transform: translateX(-100%);
    }
    .sidebar .nav-link {
      color: #ccc;
      font-size: 0.95rem;
      margin-bottom: 0.5rem;
    }
    .sidebar .nav-link:hover {
      color: #fff;
    }
    .sidebar .nav-link.active {
      background-color: #2d2d2d;
      border-radius: 10px;
      color: #fff;
    }
    .promo-box {
      background-color: red;
      color: white;
      border-radius: 10px;
      padding: 1rem;
      text-align: center;
      margin-top: auto; /* Pousse vers le bas */
      margin-bottom: 1rem;
    }
    .promo-box button {
      background-color: white;
      color: #ff3c00;
      border: none;
      font-weight: bold;
      border-radius: 5px;
      padding: 6px 12px;
    }
    .content {
      border-radius: 12px;
      padding: 2rem;
    }

    .entoure {
      border: 1px solid #2d2d2d;
      border-radius: 12px;
      padding: 1rem;
      background-color: #1c1c1c;
    }

    .payment-card {
      background-color: #1c1c1c;
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 1rem;
      font-size: 12px;
    }
    .payment-card img {
      width: 60px;
      height: 60px;
      border-radius: 10px;
      object-fit: cover;
    }

    .payment-info {
      flex: 1;
      min-width: 200px;
    }

    .payment-details {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      align-items: center;
      justify-content: flex-end;
      flex: 1;
    }

    .detail-item {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      min-width: 80px;
    }

    .detail-label {
      margin: 0;
      color: #aaa;
    }

    .detail-value {
      margin: 0;
      font-weight: bold;
    }



    .status-text {
      font-weight: bold;
    }
    .status-pending { color: #ffc107; }
    .status-success { color: #4caf50; }
    .status-failed { color: #f44336; }

    .sec-filter {
      margin-bottom: 1rem;
      background-color: #121212;
    }
    .filter-btn {
      background-color: transparent;
      border: none;
      color: #fff;
      margin-right: 1rem;
      padding: 6px 12px;
    }
    .filter-btn.active {
      background-color: red;
      border-radius: 8px;
    }


    .filter-btn.active:hover {
      background: linear-gradient(90deg, #ff3300, #DD2476); transform: scale(1.05); color: #000000;
    }
    
    .burger-menu {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      margin-right: 1rem;
    }
    
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
      display: none;
    }
    
    .main-content {
      margin-left: 250px;
      transition: margin-left 0.3s ease-in-out;
    }
    .main-content.full-width {
      margin-left: 0;
    }
    
    /* Style pour la croix de fermeture */
    .close-sidebar {
      display: none;
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
    }

     .countdown-style {
    display: flex;
    justify-content: center;
    gap: 5px;
    text-align: center;
    background-color: white;
    color: red;
    padding: 10px;
    border-radius: 10px;
    
  }
  
  .countdown-item {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .countdown-number {
    font-size: 1rem;
    font-weight: bold;
    line-height: 1;
  }
  
  .countdown-label {
    font-size: 0.5rem;
  }
    
    @media (max-width: 992px) {
      .sidebar {
        transform: translateX(-100%);
      }
      .sidebar.visible {
        transform: translateX(0);
      }
      .main-content {
        margin-left: 0;
      }
      .burger-menu {
        display: block;
      }
      .close-sidebar {
        display: block;
      }
  .payment-card {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .payment-details {
    width: 100%;
    justify-content: space-between;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #2d2d2d;
  }
  
  .detail-item {
    align-items: flex-start;
  }

      .sec-filter {
        flex-direction: column;
        align-items: flex-start;
      }
      .sec-filter .btn {
        margin-top: 1rem;
        margin-left: 0 !important;
      }
      
      h4 {
        font-size: 0.75rem;
        margin-bottom: 0.5rem;
      }

      .entoure .oui {
        margin-right: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Overlay pour fermer le menu -->
  <div class="overlay" id="overlay"></div>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar" id="sidebar">
        <button class="close-sidebar" id="closeSidebar">
          <i class="bi bi-x-lg"></i>
        </button>
        <img src="./Impact-Web-360-Logo.png" alt="Logo" class="img-fluid" style="width: 700px;">
        <nav class="nav flex-column">
          <a class="nav-link" href="#"><i class="bi bi-grid"></i> Tableau de bord</a>
          <a class="nav-link" href="#"><i class="bi bi-calendar-event"></i> Calendrier</a>
          <a class="nav-link" href="#"><i class="bi bi-chat-dots"></i> Votre Message</a>
          <a class="nav-link active" href="#"><i class="bi bi-credit-card"></i> Paiement</a>
          <a class="nav-link" href="#"><i class="bi bi-journal-bookmark"></i> Mes cours</a>
          <a class="nav-link" href="#"><i class="bi bi-search"></i> Découvrir</a>
          <a class="nav-link" href="#"><i class="bi bi-gear"></i> Paramètre</a>
          <!-- Ajout de liens supplémentaires pour tester le scroll -->
          <a class="nav-link" href="#"><i class="bi bi-people"></i> Communauté</a>
          <a class="nav-link" href="#"><i class="bi bi-question-circle"></i> Aide</a>
          <a class="nav-link" href="#"><i class="bi bi-box-arrow-right"></i> Déconnexion</a>
        </nav>
        <div class="promo-box">
          <p class="mb-4"><strong>LET'S GO</strong></p>
          <div id="countdown-container" style="display: block;">
            <div id="countdown" class="countdown-style"></div>
          </div>
          <div id="button-container" style="display: none;">
            <button>Profitez</button>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <div class="col-md-10 p-4 main-content" id="mainContent">
        <div class="content">
          <div class="d-flex justify-content-between align-items-center mb-4 entoure">
            <div class="d-flex align-items-center">
              <button class="burger-menu" id="burgerMenu">
                <i class="bi bi-list"></i>
              </button>
              <h4 class="mb-0">Paiement</h4>
            </div>
            <div>
              <i class="bi bi-search me-3 oui"></i>
              <i class="bi bi-bell me-3"></i>
              <img src="https://i.pravatar.cc/40" class="rounded-circle" alt="User" width="40" height="40">
            </div>
          </div>

          <!-- Filters -->
          <div class="d-flex mb-4 flex-wrap sec-filter">
            <button class="filter-btn active">Tous les</button>
            <button class="filter-btn">En attente de paiement</button>
            <button class="filter-btn">Réussir</button>
            <button class="filter-btn">Échoué</button>
            <button class="btn btn-outline-light ms-auto"><i class="bi bi-filter"></i> Trier par Date</button>
          </div>

          <!-- Payment Cards -->
          <div class="payment-card">
            <img src="./images/homme.png" alt="Thumbnail">
            <div class="payment-info">
              <h6 class="mb-1">Envato Mastery: construire un modèle de revenu passif à partir de la vente</h6>
              <p class="mb-0">16 Modules • 41 vidéos</p>
            </div>
            <div class="payment-details">
              <div class="detail-item">
                <p class="detail-label">Prix:</p>
                <p class="detail-value text-success">€ 99,99</p>
              </div>
              <div class="detail-item">
                <p class="detail-label">Temps restant:</p>
                <p class="detail-value text-success">2 jours</p>
              </div>
              <div class="detail-item">
                <p class="status-text status-pending">En attente</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
  // Date cible : 30 novembre à 00:00:00
  const targetDate = new Date();
  targetDate.setMonth(10); // Novembre (les mois commencent à 0)
  targetDate.setDate(30);
  targetDate.setHours(0, 0, 0, 0);

  function updateCountdown() {
    const now = new Date();
    const diff = targetDate - now;

    if (diff <= 0) {
      // Le temps est écoulé, afficher le bouton
      document.getElementById('countdown-container').style.display = 'none';
      document.getElementById('button-container').style.display = 'block';
      return;
    }

    // Calculer jours, heures, minutes, secondes
    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    // Afficher le décompte avec la nouvelle structure
    document.getElementById('countdown').innerHTML = `
      <div class="countdown-item">
        <span class="countdown-number">${days}</span>
        <span class="countdown-label">jours</span>
      </div>
      <div class="countdown-item">
        <span class="countdown-number">${hours}</span>
        <span class="countdown-label">heures</span>
      </div>
      <div class="countdown-item">
        <span class="countdown-number">${minutes}</span>
        <span class="countdown-label">minutes</span>
      </div>
      <div class="countdown-item">
        <span class="countdown-number">${seconds}</span>
        <span class="countdown-label">secondes</span>
      </div>
    `;

    // Mettre à jour toutes les secondes
    setTimeout(updateCountdown, 1000);
  }

  // Démarrer le décompte
  updateCountdown();
</script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const burgerMenu = document.getElementById('burgerMenu');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const mainContent = document.getElementById('mainContent');
      const closeSidebar = document.getElementById('closeSidebar');
      
      // Toggle sidebar
      burgerMenu.addEventListener('click', function() {
        sidebar.classList.add('visible');
        overlay.style.display = 'block';
      });
      
      // Close sidebar avec la croix
      closeSidebar.addEventListener('click', function() {
        sidebar.classList.remove('visible');
        overlay.style.display = 'none';
      });
      
      // Close sidebar quand on clique sur l'overlay
      overlay.addEventListener('click', function() {
        sidebar.classList.remove('visible');
        overlay.style.display = 'none';
      });
      
      // Close sidebar quand on clique sur un lien (mobile)
      const navLinks = document.querySelectorAll('.sidebar .nav-link');
      navLinks.forEach(link => {
        link.addEventListener('click', function() {
          if (window.innerWidth < 992) {
            sidebar.classList.remove('visible');
            overlay.style.display = 'none';
          }
        });
      });
    });
  </script>
</body>
</html>