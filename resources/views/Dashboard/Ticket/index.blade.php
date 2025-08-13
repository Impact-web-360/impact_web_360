<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de votre billet - Balade</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .confirmation-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 800px;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f9d71c;
            border-radius: 50%;
            animation: fall 5s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(-10px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(500px) rotate(360deg);
                opacity: 0;
            }
        }

        h1 {
            color: #2575fc;
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            border-radius: 2px;
        }

        .subtitle {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .ticket-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 30px;
            margin: 30px auto;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
            position: relative;
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px dashed #e0e0e0;
        }

        .ticket-logo {
            font-size: 2rem;
            color: #2575fc;
        }

        .ticket-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .ticket-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            text-align: left;
            margin-bottom: 30px;
        }

        .detail-item h3 {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 5px;
        }

        .detail-item p {
            font-size: 1.1rem;
            font-weight: 500;
            color: #333;
        }

        .qr-code {
            width: 120px;
            height: 120px;
            margin: 20px auto;
            background: #f0f0f0;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2rem;
            color: #333;
        }

        .sticker-container {
            position: relative;
            margin: 40px 0;
            height: 150px;
        }

        .animated-sticker {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 120px;
            height: 120px;
            background: #ff6b6b;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 3rem;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
        }

        @keyframes float {
            0% {
                transform: translate(-50%, -50%) translateY(0) rotate(0deg);
            }
            50% {
                transform: translate(-50%, -50%) translateY(-15px) rotate(5deg);
            }
            100% {
                transform: translate(-50%, -50%) translateY(0) rotate(0deg);
            }
        }

        .download-btn {
            background: linear-gradient(90deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 18px 45px;
            font-size: 1.2rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
            margin-top: 20px;
        }

        .download-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 117, 252, 0.6);
        }

        .download-btn:active {
            transform: translateY(1px);
        }

        .additional-info {
            margin-top: 30px;
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .footer {
            margin-top: 30px;
            color: #777;
            font-size: 0.9rem;
        }

        /* Animation des confettis */
        @keyframes confetti {
            0% { transform: translateY(0) rotate(0); opacity: 1; }
            100% { transform: translateY(100vh) rotate(720deg); opacity: 0; }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .confirmation-container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .ticket-details {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <!-- Confettis animés -->
        <div class="confetti" style="left: 10%; animation-delay: 0s;"></div>
        <div class="confetti" style="left: 20%; animation-delay: 0.5s;"></div>
        <div class="confetti" style="left: 30%; animation-delay: 1s;"></div>
        <div class="confetti" style="left: 40%; animation-delay: 1.5s;"></div>
        <div class="confetti" style="left: 50%; animation-delay: 2s;"></div>
        <div class="confetti" style="left: 60%; animation-delay: 2.5s;"></div>
        <div class="confetti" style="left: 70%; animation-delay: 3s;"></div>
        <div class="confetti" style="left: 80%; animation-delay: 3.5s;"></div>
        <div class="confetti" style="left: 90%; animation-delay: 4s;"></div>
        
        <h1>Félicitations !</h1>
        <p class="subtitle">Votre billet a été réservé avec succès</p>
        
        <div class="ticket-card">
            <div class="ticket-header">
                <div class="ticket-logo">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="ticket-title">Impact Web 360</div>
            </div>
            
            <div class="ticket-details">
                <div class="detail-item">
                    <h3>Date</h3>
                    <p>23 Novembre 2025</p>
                </div>
                <div class="detail-item">
                    <h3>Heure</h3>
                    <p>08h00</p>
                </div>
                <div class="detail-item">
                    <h3>Lieu</h3>
                    <p>Palais des congrès</p>
                </div>
                <div class="detail-item">
                    <h3>Siège</h3>
                    <p>VIP</p>
                </div>
            </div>
            
            <div class="qr-code">
                <i class="fas fa-qrcode"></i>
            </div>
        </div>
        
        <div class="sticker-container">
            <div class="animated-sticker">
                <i class="fas fa-check"></i>
            </div>
        </div>
        
        <button class="download-btn" id="downloadBtn">
            <i class="fas fa-download"></i> Télécharger votre billet
        </button>
        
        <p class="additional-info">
            Votre billet a également été envoyé à votre adresse email. 
            Présentez ce billet électronique à l'entrer de lévènement.
        </p>
        
        <p class="footer">
            &copy; 2025 Impact Web 360 | Tous droits réservés
        </p>
    </div>

    <script>
        // Animation des confettis
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.confirmation-container');
            const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#ffbe0b', '#fb5607'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                
                // Position aléatoire
                const left = Math.random() * 100;
                confetti.style.left = ${left}%;
                
                // Animation aléatoire
                const duration = 2 + Math.random() * 3;
                const delay = Math.random() * 5;
                confetti.style.animation = fall ${duration}s linear ${delay}s infinite;
                
                // Couleur aléatoire
                const color = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.backgroundColor = color;
                
                // Taille aléatoire
                const size = 5 + Math.random() * 10;
                confetti.style.width = ${size}px;
                confetti.style.height = ${size}px;
                
                container.appendChild(confetti);
            }
            
            // Effet lors du clic sur le bouton
            const downloadBtn = document.getElementById('downloadBtn');
            downloadBtn.addEventListener('click', function() {
                // Animation de téléchargement
                downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Téléchargement en cours...';
                downloadBtn.disabled = true;
                
                // Simuler le téléchargement
                setTimeout(function() {
                    downloadBtn.innerHTML = '<i class="fas fa-check"></i> Téléchargement terminé!';
                    setTimeout(function() {
                        downloadBtn.innerHTML = '<i class="fas fa-download"></i> Télécharger à nouveau';
                        downloadBtn.disabled = false;
                    }, 2000);
                }, 1500);
            });
        });
    </script>
</body>
</html>