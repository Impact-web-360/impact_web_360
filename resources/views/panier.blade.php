<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panier - Impact Web 360</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        :root {
            --color-primary: #000066;
            --color-secondary: #ff4500;
            --color-dark: #000;
            --color-text-light: #ccccff;
            --color-card-bg: #1c1f26;
            --color-white: #fff;
        }

        body {
            background-color: var(--color-dark);
            color: var(--color-white);
            font-family: 'Segoe UI', sans-serif;
        }

        /* Styles de la navbar conservés */
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

        
        /* --- NOUVEAUX STYLES POUR LE PANIER --- */
        .cart-item {
            background-color: var(--color-card-bg);
            border: 1px solid #333;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            padding: 15px;
        }
        
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            flex-shrink: 0; /* Empêche l'image de rétrécir */
        }
        
        .cart-item-details {
            flex-grow: 1;
            margin: 0 15px;
        }
        
        .cart-item-details h5 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        
        .cart-item-details p {
            margin-bottom: 5px;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }
        
        .quantity-control .btn {
            background-color: #33394a;
            border: none;
            color: var(--color-white);
            padding: 5px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .quantity-control .btn:hover {
            background-color: #555f7f;
        }
        
        .quantity-control .btn-danger {
            background-color: #dc3545;
            margin-left: 10px;
        }
        
        .quantity-control .btn-danger:hover {
            background-color: #c82333;
        }
        
        .quantity-control .quantity-display {
            width: 40px;
            text-align: center;
            color: var(--color-white);
            font-weight: bold;
        }

        .cart-summary {
            background-color: var(--color-card-bg);
            border-radius: 10px;
            padding: 30px;
        }

        .cart-summary ul {
            list-style: none;
            padding-left: 0;
        }

        .cart-summary li {
            padding-bottom: 10px;
            border-bottom: 1px dashed #333;
            margin-bottom: 10px;
        }

        .cart-summary li:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .cart-summary hr {
            border-color: #555f7f;
            margin: 1rem 0;
        }
        
        .btn-inscrire.w-100 {
            width: 100%;
        }

        /* --- Newsletter & Footer --- */
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
        
        /* --- Media Queries (Conservées et ajustées) --- */
        @media (max-width: 991.98px) {
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

            .navbar-toggler-icon {
                background-image: none !important;
            }
        
            .cart-item {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }
        
            .cart-item img {
                margin-bottom: 1rem;
            }
        
            .cart-item-details {
                margin: 0;
                margin-bottom: 1rem;
            }
            
            .quantity-control {
                justify-content: center;
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
                        <div class="cart-item">
                            <img src="{{ $item['image'] }}" alt="{{ $item['nom'] }}" class="rounded">
                            <div class="cart-item-details">
                                <h5>{{ $item['nom'] }}</h5>
                                <p class="mb-1 text-muted">{{ $item['taille'] }} - {{ $item['couleur'] }}</p>
                                <p class="fw-bold">{{ number_format($item['prix'], 0, '', ' ') }} FCFA</p>
                            </div>
                            <div class="quantity-control">
                                <form action="{{ route('panier.update') }}" method="POST" class="d-flex align-items-center me-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button type="submit" name="action" value="decrease" class="btn btn-sm"><i class="fas fa-minus"></i></button>
                                    <span class="quantity-display mx-2">{{ $item['quantite'] }}</span>
                                    <button type="submit" name="action" value="increase" class="btn btn-sm"><i class="fas fa-plus"></i></button>
                                </form>
                                <form action="{{ route('panier.remove') }}" method="POST">
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
                        <li class="d-flex justify-content-between">
                            <span>Sous-total :</span>
                            <span>{{ number_format($sous_total, 0, '', ' ') }} FCFA</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Frais de port :</span>
                            <span>{{ number_format($frais_de_port, 0, '', ' ') }} FCFA</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Taxes :</span>
                            <span>{{ number_format($taxes, 0, '', ' ') }} FCFA</span>
                        </li>
                        <li class="d-flex justify-content-between">
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