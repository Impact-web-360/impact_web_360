
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Confirmation - Impact Web 360</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #0e0e12;
      color: white;
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      margin-top: 130px;
      max-width: 700px;
    }

    .card-confirmation {
      background: linear-gradient(145deg, #1f1f2e, #13131f);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      box-shadow: 0 0 30px rgba(255, 69, 0, 0.2);
      animation: fadeInUp 1s ease-in-out;
    }

    .card-confirmation h3 {
      font-size: 28px;
      font-weight: bold;
      color: #ff4500;
    }

    .card-confirmation h4 {
      font-size: 22px;
      margin-top: 15px;
      color: #ffd700;
    }

    .card-confirmation p {
      font-size: 18px;
      margin-top: 10px;
    }

    .btn-orange {
      background: linear-gradient(90deg, #ff4500, #ff3300);
      color: white;
      padding: 14px 40px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: bold;
      transition: all 0.3s ease-in-out;
    }

    .btn-orange:hover {
      background: linear-gradient(90deg, #cc3700, #b52d00);
      transform: scale(1.05);
    }

    .highlight {
      color: #00d4ff;
      font-weight: bold;
    }

    @keyframes fadeInUp {
      from {
        transform: translateY(40px);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    @media (max-width: 576px) {
      .card-confirmation h3 {
        font-size: 22px;
      }

      .card-confirmation h4 {
        font-size: 18px;
      }

      .btn-orange {
        width: 100%;
        padding: 12px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card-confirmation text-center animate__animated animate__fadeIn">
      <h3><i class="fa-solid fa-check-circle me-2"></i>Confirmation de réservation</h3>

      <p class="mt-4">Merci <span class="highlight"></span> !</p>

      <p>Vous avez réservé le siège <span class="highlight"></span> pour :</p>

      <h4><i class="fa-solid fa-microphone-lines me-2"></i></h4>

      <p><i class="fa-regular fa-calendar me-2"></i> à </p>
      <p><i class="fa-solid fa-location-dot me-2"></i></p>

      <p><strong>🎟️ Ticket N° :</strong> </p>

      <form action="paiement.php" method="POST">
        <input type="hidden" name="confirm" value="1">
        <button type="submit" class="btn btn-orange mt-4">Passer au paiement</button>
      </form>
    </div>
  </div>
</body>
</html>
