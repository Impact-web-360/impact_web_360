<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin - Gestion des Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --main-color: #c82333;
            --sidebar-bg: #212529;
            --sidebar-hover: rgba(87, 86, 86, 1);
            --text-light: #fff;
            --card-bg: #fff;
            --bg-color: #f4f6f9;
        }

        body {
            margin: 0;
            background-color: var(--bg-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: var(--sidebar-bg);
            color: var(--text-light);
            padding-top: 2rem;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 1050;
        }

        #sidebar h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }

        #sidebar a.nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.75rem 1.5rem;
            color: var(--text-light);
            font-weight: 600;
            transition: background-color 0.3s, border-left 0.3s;
            text-decoration: none;
        }

        #sidebar a.nav-link:hover,
        #sidebar a.nav-link.active {
            background-color: var(--sidebar-hover);
            border-left: 4px solid var(--main-color);
            text-decoration: none;
        }

        /* Sidebar scroll bar */
        #sidebar::-webkit-scrollbar {
            width: 6px;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background-color: var(--main-color);
            border-radius: 10px;
        }

        /* Main content */
        #content {
            margin-left: 250px;
            padding: 2rem 3rem;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        /* Responsive Sidebar toggle button */
        #sidebarToggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background-color: var(--main-color);
            border: none;
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        #sidebarToggle:hover {
            background-color: #a71d2a;
        }

        /* Mobile & tablet */
        @media (max-width: 991.98px) {
            #sidebar {
                transform: translateX(-260px);
            }

            #sidebar.active {
                transform: translateX(0);
            }

            #content {
                margin-left: 0;
                padding: 1rem 1.5rem;
            }

            #sidebarToggle {
                display: block;
            }

            body.sidebar-open {
                overflow: hidden;
            }
        }

        .image-wrapper {
            height: 200px;
            overflow: hidden;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
    </style>
</head>

<body>

    <button id="sidebarToggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" aria-label="Sidebar Navigation" class="col-md-3 col-lg-2 d-md-block">
                <h4><i class="fa fa-cogs mt-5 me-2"></i>Admin Panel</h4>
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-bar"></i> Statistiques</a>
                <a href="{{ route('evenements.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i>Événements</a>
                <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i>Sponsors</a>
                <a href="{{ route('replay.index')}}" class="nav-link"><i class="fa-solid fa-play"></i> Replay</a>
                <a href="{{ route('categories.index')}}" class="nav-link"><i class="fas fa-layer-group"></i>Catégorie</a>
                <a href="{{ route('formations.index')}}" class="nav-link"><i class="fas fa-graduation-cap"></i>Formation</a>
                <a href="{{ route('modules.index')}}" class="nav-link"><i class="fas fa-puzzle-piece"></i>Modules</a>
                <a href="{{ route('articles.index')}}" class="nav-link active"><i class="fa fa-shopping-basket"></i>Articles</a>
                <a href="{{ route('emploies.index')}}" class="nav-link"><i class="fa fa-briefcase"></i>Emplois</a>
                <a href="ajouter_intervenant.php" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
                <a href="{{ route('billet')}}" class="nav-link"><i class="fas fa-calendar-alt "></i> Tickets</a>
                <a href="{{ route('logout')}}" class="nav-link"><i class="fa fa-arrow-left"></i>Deconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>

            <main id="content" class="col-md-9 ms-sm-auto col-lg-10 mt-2">
                <h2 id="articles">🛍️ Gestion des articles</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card mb-4">
                    <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addArticleModal">
                    <i class="fa fa-plus"></i> Ajouter un article
                    </button>

                    <div class="row">
                        @forelse ($articles as $article)
                            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                                <div class="card w-100 d-flex flex-column justify-content-between bg-light shadow">
                                    <div class="image-wrapper">
                                        @if ($article->image)
                                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top"
                                                alt="Image de l'article" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('dossiers/image/default.png') }}" class="card-img-top"
                                                alt="Image par défaut" style="height: 200px; object-fit: cover;">
                                            @endif
                                    </div>

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title mb-3">{{ $article->nom }}</h5>
                                        <p class="card-text">{{ $article->description }}</p>
                                        <p class="card-text"><strong>{{ number_format($article->prix, 0, ',', ' ') }}
                                                FCFA</strong></p>
                                        <p class="card-text"><strong>Type:</strong> {{ $article->type }}</p>
                                        <p class="card-text"><strong>Taille:</strong> {{ $article->taille }}</p>
                                        @if ($article->couleur)
                                        <p class="card-text">
                                            <strong>Couleur:</strong>
                                            <span style="display:inline-block;width:15px;height:15px;background-color:{{ $article->couleur }};border-radius:50%;border:1px solid #000;"></span>
                                        </p>
                                            @endif

                                        <div class="mt-auto">
                                            <div class="mb-2">
                                                <a href="{{ route('articles.edit', $article->id) }}"
                                                    class="btn btn-outline-primary btn-sm me-2">
                                                    <i class="fas fa-edit"></i> Modifier
                                                </a>

                                                <form method="POST" action="{{ route('articles.destroy', $article->id) }}"
                                                    onsubmit="return confirm('Confirmer la suppression ?');"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center">Aucun article disponible pour le moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Ajouter Article -->
    <div class="modal fade" id="addArticleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data"
                class="modal-content"> @csrf
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="addArticleLabel">Ajouter un article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'article</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix (FCFA)</label>
                        <input type="number" class="form-control" id="prix" name="prix" min="0" step="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="type-modal" class="form-label">Type</label>
                        <select class="form-control" id="type-modal" name="type" required>
                            <option value="">-- Sélectionner un type --</option>
                            <option value="T-shirt">T-shirt</option>
                            <option value="Hoodie">Hoodie</option>
                            <option value="Jeans">Jeans</option>
                            <option value="Short">Short</option>
                            <option value="Shirt">Shirt</option>
                            <option value="Accessoires">Accessoires</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="couleur-modal" class="form-label">Couleur</label>
                        <input type="color" class="form-control form-control-color" id="couleur-modal" name="couleur">
                    </div>

                    <div class="mb-3">
                        <label for="taille-modal" class="form-label">Taille</label>
                        <select class="form-control" id="taille-modal" name="taille">
                            <option value="">-- Sélectionner une taille --</option>
                            <option value="XXS">XXS</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                            <option value="4XL">4XL</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const body = document.body;

            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                body.classList.toggle('sidebar-open');
            });

            // Fermer la sidebar si clic en dehors (mobile)
            document.addEventListener('click', (e) => {
                if (window.innerWidth < 992 && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                    body.classList.remove('sidebar-open');
                }
            });
});

    </script>
</body>

</html>