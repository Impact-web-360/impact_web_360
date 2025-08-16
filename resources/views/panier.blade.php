<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panier - Impact Web 360</title>
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

        .cart-item {
            background-color: #1c1f26;
            border: 1px solid #333;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .cart-summary {
            background-color: #1c1f26;
            border-radius: 10px;
            padding: 20px;
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

        .quantity-control button {
            background-color: #33394a;
            border: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .quantity-control button:hover {
            background-color: #555f7f;
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

            .navbar-toggler-icon {
                background-image: none !important;
            }

            .cart-item img {
                width: 80px;
                height: 80px;
                object-fit: cover;
            }
        }
    
        /* Styles pour les petits écrans (tablettes et mobiles) */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }
        
            .cart-item img {
                margin: 0 auto 1rem;
            }
        
            .cart-item .flex-grow-1 {
                margin-bottom: 1rem;
            }
            
            .quantity-control {
                flex-direction: column;
                align-items: center;
            }
            
            .quantity-control form.d-flex {
                margin-bottom: 10px;
            }
            
            .cart-summary h4 {
                font-size: 1.2rem;
            }
        
            .cart-summary li span {
                font-size: 0.9rem;
            }
        
            .cart-summary li.fw-bold {
                font-size: 1.1rem !important;
            }
        }
    
        @media (max-width: 576px) {
            h1 {
                font-size: 2rem;
            }
        
            .container {
                padding: 10px;
            }
        
            .cart-summary {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
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
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Acceuil</a></li>
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

    <div class="container py-5" style="margin-top: 100px;">
        <h1 class="mb-4">Votre panier</h1>

        <div class="row">
            <div class="col-lg-8">
                @if (isset($panier) && count($panier) > 0)
                    @foreach ($panier as $item)
                        <div class="d-flex align-items-center cart-item p-3">
                            <img src="{{ $item['image'] }}" alt="{{ $item['nom'] }}" class="rounded me-4" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <h5>{{ $item['nom'] }}</h5>
                                <p class="mb-1 text-muted">{{ $item['taille'] }} - {{ $item['couleur'] }}</p>
                                <p class="fw-bold">{{ number_format($item['prix'], 0, '', ' ') }} FCFA</p>
                            </div>
                            <div class="d-flex align-items-center quantity-control">
                                <form action="{{ route('panier.update') }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button type="submit" name="action" value="decrease" class="btn btn-sm"><i class="fas fa-minus"></i></button>
                                    <span class="mx-2">{{ $item['quantite'] }}</span>
                                    <button type="submit" name="action" value="increase" class="btn btn-sm"><i class="fas fa-plus"></i></button>
                                </form>
                                <form action="{{ route('panier.remove') }}" method="POST" class="ms-3">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center p-5">
                        <p class="lead">Votre panier est vide. 😢</p>
                        <a href="{{ route('boutique') }}" class="btn btn-inscrire mt-3">Retourner à la boutique</a>
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h4 class="mb-4">Récapitulatif</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between mb-2">
                            <span>Sous-total :</span>
                            <span>{{ number_format($sous_total, 0, '', ' ') }} FCFA</span>
                        </li>
                        <li class="d-flex justify-content-between mb-2">
                            <span>Frais de port :</span>
                            <span>{{ number_format($frais_de_port, 0, '', ' ') }} FCFA</span>
                        </li>
                        <li class="d-flex justify-content-between mb-2">
                            <span>Taxes :</span>
                            <span>{{ number_format($taxes, 0, '', ' ') }} FCFA</span>
                        </li>
                        <hr class="my-3">
                        <li class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total :</span>
                            <span>{{ number_format($total, 0, '', ' ') }} FCFA</span>
                        </li>
                    </ul>
                    <a href="{{ $whatsapp_url }}" target="_blank" class="btn btn-inscrire w-100 mt-4">
                        Passer la commande via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center mb-3 mb-md-0">
                    <h3>Restez à jour sur nos dernières offres</h3>
                </div>
                <div class="col-md-6">
                    <form method="POST" action="boutique.php" class="d-flex flex-column justify-content-center align-items-center">
                        <input type="email" name="email_newsletter" placeholder="Entrer votre adresse email"
                            class="form-control text-center" required />
                        <button type="submit" class="btn mt-2">S'abonner à la Newsletter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-white pt-5">
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
                        <li><a href="{{ route('login') }}">E-learning</a></li>
                        <li><a href="#">Entreprises & Recruteurs</a></li>
                        <li><a href="https://chat.whatsapp.com/FZx7QMMdFsq3fF0D40Px8f" target="_blank">Forum</a></li>
                    </ul>
                </div>
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
        document.getElementById('hamburgerBtn').addEventListener('click', function() {
            this.classList.toggle('active');
        });
    </script>
</body>

</html>