<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation - Impact Web 360</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #0e0e12;
            color: white;
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
        .ticket {
            position: relative;
            background: #ff3300;
            color: white;
            border-radius: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
            text-align: center;
            gap: 1rem;
        }
        .ticket .d-flex>div {
            flex: 1 1 30%;
            min-width: 100px;
        }
        .ticket-header-img {
            max-height: 160px;
            width: auto;
            margin-top: -65px;
            margin-bottom: -65px;
            margin-right: -40px;
        }
        .ticket-header {
            background-color: #000066;
            display: flex;
            justify-content: space-between;
            gap: 6px;
            align-items: center;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1rem;
        }
        .div-form {
            background-color: white;
            border-radius: 1rem;
            padding: 2rem;
            color: black;
            margin-top: 1rem;
        }
        .step-nav {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 1rem;
            font-weight: 500;
            font-size: 16px;
            flex-wrap: wrap;
            overflow-x: auto;
        }
        .step-container {
            white-space: nowrap;
            font-weight: 500;
            font-size: 16px;
            display: inline-block;
        }
        .btn-orange {
            background-color: #ff2d0a;
            color: white;
            border-radius: 20px;
        }
        
        .btn-orange:hover {
            background: linear-gradient(90deg, #e63c00, #cc2900);
            color: white;
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

        /* Nouveaux styles pour la section de confirmation */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            padding: 1rem;
        }
        .info-item {
            background-color: #f8f9fa;
            border-radius: 1rem;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .info-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .info-icon {
            font-size: 2rem;
            color: #ff3300;
        }
        .info-content h6 {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: #343a40;
        }
        .info-content p {
            margin: 0;
            font-size: 1.1rem;
            color: #6c757d;
        }
        .btn-retour {
            background-color: transparent;
            border: 2px solid #ff3d00;
            color: #ff3d00;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .btn-retour:hover {
            background-color: #ff3d00;
            color: white;
        }
        .btn-payer {
            background: linear-gradient(90deg, #ff4d00, #ff3300);
            color: white;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: bold;
            font-size: 16px;
            border: none;
            margin-left: 10px;
        }
        .btn-payer:hover {
            background: linear-gradient(90deg, #e63c00, #cc2900);
        }
        /* Fin des nouveaux styles */

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
            .hamburger.active span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }
            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }
            .hamburger.active span:nth-child(3) {
                transform: rotate(-45deg) translate(8px, -9px);
            }
            .navbar-toggler-icon {
                background-image: none !important;
            }
        }
        @media (max-width: 576px) {
            .step-nav {
                font-size: 14px;
                line-height: 1.8;
            }
            .step-nav span {
                display: inline-block;
                margin: 2px 5px;
            }
            .step-container {
                font-size: 14px;
            }
            .step-nav::-webkit-scrollbar {
                display: none;
            }
            .ticket-header h5 {
                font-size: 15px;
            }
            .ticket-header-img {
                width: 130px;
                margin-left: -30px;
            }
            .ticket-body-left h5 {
                font-size: 14px;
            }
            .qr-code img {
                width: 70%;
            }
        }
    </style>
</head>

<body>
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
                <li class="nav-item"><a class="nav-link " href="{{ route('home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('evenement') }}">Événements</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('elearning') }}">E-learning</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('intervenant') }}">Intervenants</a></li>
                <li class="nav-item"><a class="nav-link active" href="">Billetterie</a></li>
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

    <div class="container" style="margin-top: 150px;">
        <div class="ticket text-center animate_animated animate_fadeIn">
            <div class="ticket-header p-3">
                <img src="{{ asset('dossiers/image/Impact-Web-360-Logo1.png') }}" alt="Logo" class="ticket-header-img">
                <h5>{{ $evenement->nom }}</h5>
                <div><strong>TK0001</strong></div>
            </div>
            <div class="d-flex justify-content-center align-items-center p-3">
                <div class="ticket-body-left">
                    <h5>Date et heure</h5>
                    <h6>{{ \Carbon\Carbon::parse($evenement->date_debut)->format('d F Y') }}</h6>
                    <p>{{ \Carbon\Carbon::parse($evenement->heure)->format('H:i') }}</p>
                </div>
                <div class="align-self-center qr-code">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?data=ImpactWeb360-2025&size=100x100&bgcolor=255-51-0&color=255-255-255" alt="QR Code">
                </div>
                <div>
                    <h5>Lieu</h5>
                    <h5>{{ $evenement->lieu }}</h5>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="step-nav mt-5 text-dark text-center">
                    <div class="step-container d-flex justify-content-center align-items-center flex-wrap gap-2">
                        <span>
                            <a href="{{ route('step1', ['evenementId' => $evenement->id]) }}" class="text-decoration-none">
                                <span class="d-none d-md-inline text-dark ">Informations</span>
                                <span class="d-inline d-md-none step-icon"><i class="fa-regular fa-user"></i></span>
                            </a>
                        </span>
                        <span class="mx-2 text-muted">></span>
                        <span>
                            <a href="{{ route('step2', ['evenementId' => $evenement->id]) }}" class="text-decoration-none">
                                <span class="d-none d-md-inline text-dark">Réservation de siège</span>
                                <span class="d-inline d-md-none step-icon"><i class="fa-solid fa-couch text-dark"></i></span>
                            </a>
                        </span>
                        <span class="mx-2 text-muted">></span>
                        <span>
                            <a href="{{ route('step3', ['evenementId' => $evenement->id]) }}" class="text-decoration-none">
                                <span class="d-none d-md-inline  fw-bold text-primary">Confirmation</span>
                                <span class="d-inline d-md-none step-icon "><i class="fa-regular fa-circle-check"></i></i></span>
                            </a>
                        </span>
                        <span class="mx-2 text-muted">></span>
                        <span>
                            <span>
                                <span class="d-none d-md-inline text-dark">Paiement</span>
                                <span class="d-inline d-md-none step-icon"><i class="bi bi-credit-card"></i></span>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="div-form justify-content-center mt-4">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h4 class="text-center mb-4 text-dark fw-bold">Détails de votre réservation</h4>
                        </div>
                    </div>
                    <div class="info-grid">
                        <div class="info-item animate_animated animate_fadeInUp">
                            <div class="info-icon"><i class="fas fa-user"></i></div>
                            <div class="info-content">
                                <h6>Nom et Prénom</h6>
                                <p class="text-muted fw-bold">{{ $step1['nom'] }} {{ $step1['prenom'] }}</p>
                            </div>
                        </div>
                        <div class="info-item animate_animated animatefadeInUp animate_delay-1s">
                            <div class="info-icon"><i class="fas fa-envelope"></i></div>
                            <div class="info-content">
                                <h6>Email</h6>
                                <p class="text-muted fw-bold">{{ $step1['email'] }}</p>
                            </div>
                        </div>
                        <div class="info-item animate_animated animatefadeInUp animate_delay-2s">
                            <div class="info-icon"><i class="fas fa-phone"></i></div>
                            <div class="info-content">
                                <h6>Téléphone</h6>
                                <p class="text-muted fw-bold">{{ $step1['telephone'] }}</p>
                            </div>
                        </div>
                        <div class="info-item animate_animated animatefadeInUp animate_delay-3s">
                            <div class="info-icon"><i class="fas fa-ticket-alt"></i></div>
                            <div class="info-content">
                                <h6>Catégorie de billet</h6>
                                <p class="text-muted fw-bold">{{ $step2['categorie'] }}</p>
                            </div>
                        </div>
                        <div class="info-item animate_animated animatefadeInUp animate_delay-4s">
                            <div class="info-icon"><i class="fas fa-coins"></i></div>
                            <div class="info-content">
                                <h6>Montant</h6>
                                <p class="text-muted fw-bold">{{ intval($step2['prix']) }} FCFA</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button id="payBtn" type="submit" class="btn btn-payer">Confirmer & Payer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer text-white pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-4 text-center text-md-start">
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
                        <li><a href="">Billetterie</a></li>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggler = document.querySelector('.navbar-toggler');
            const hamburger = document.getElementById('hamburgerBtn');
            toggler.addEventListener('click', () => {
                hamburger.classList.toggle('active');
            });
        });
        const backToTopBtn = document.getElementById("backToTop");
        window.onscroll = function () {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        };
        backToTopBtn.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script>
        document.getElementById('payBtn').addEventListener('click', function() {
            openKkiapayWidget({
                amount: {{ $step2['prix'] }},
                position: "center",
                theme: "blue",
                sandbox: true,
                key: "c9d2ca003c6a11f0ad78bd6aa09fa344",
                name: "{{ $step1['nom'] }} {{ $step1['prenom'] }}",
                phone: "{{ $step1['telephone'] }}",
                email: "{{ $step1['email'] }}",
            })
        })

        addSuccessListener(response => {
        console.log(response)
        window.location.href = "/paiement/{{ $evenement->id }}"; 
        })

        addFailureListener(error => {
            console.error(error)
            alert("Le paiement a échoué")
        })
    </script>


</body>
</html>