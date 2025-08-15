<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin - Gestion des Emplois</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            padding: 2rem 1rem;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            width: 75%;
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
                <a href="{{ route('articles.index')}}" class="nav-link"><i class="fa fa-shopping-basket"></i>Articles</a>
                <a href="{{ route('emploies.index')}}" class="nav-link active"><i class="fa fa-briefcase"></i>Emplois</a>
                <a href="{{ route('intervenants.index')}}" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
                <a href="{{ route('billet')}}" class="nav-link"><i class="fas fa-calendar-alt "></i> Tickets</a>
                <a href="{{ route('logout')}}" class="nav-link"><i class="fa fa-arrow-left"></i>Deconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>

            <main id="content" class="col-md-9 ms-sm-auto col-lg-10 mt-2">
                <h2 id="emploies">💼 Gestion des emplois</h2>

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
                    <button class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addEmploieModal">
                        <i class="fa fa-plus"></i> Ajouter un emploi
                    </button>

                    <div class="row">
                        @forelse ($emploies as $emploie)
                            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                                <div class="card w-100 d-flex flex-column justify-content-between bg-light shadow">
                                    <div class="image-wrapper">
                                        @if($emploie->logo)
                                            <img src="{{ asset('storage/' . $emploie->logo) }}" class="card-img-top"
                                                alt="Logo de l'emploi" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('dossiers/image/default.png') }}" class="card-img-top"
                                                alt="Image par défaut" style="height: 200px; object-fit: cover;">
                                        @endif
                                    </div>

                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title mb-3">{{ $emploie->nom }}</h5>
                                        <p class="card-text"><strong>Promoteur:</strong> {{ $emploie->promoteur }}</p>
                                        <p class="card-text"><strong>Localisation:</strong> {{ $emploie->localisation ?? 'Non spécifiée' }}</p>
                                        <p class="card-text"><strong>Type:</strong> {{ $emploie->type }}</p>
                                        <p class="card-text"><strong>Catégorie:</strong> {{ $emploie->categorie }}</p>
                                        
                                        <div class="mt-auto">
                                            <div class="mb-2">
                                                <a href="{{ $emploie->lien }}" target="_blank" class="btn btn-outline-info btn-sm me-2">
                                                    <i class="fas fa-link"></i> Voir l'offre
                                                </a>
                                                <a href="{{ route('emploies.edit', $emploie->id) }}"
                                                    class="btn btn-outline-primary btn-sm me-2">
                                                    <i class="fas fa-edit"></i> Modifier
                                                </a>

                                                <form method="POST" action="{{ route('emploies.destroy', $emploie->id) }}"
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
                                <p class="text-center">Aucun emploi disponible pour le moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Ajouter Emploi -->
    <div class="modal fade" id="addEmploieModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form method="POST" action="{{ route('emploies.store') }}" enctype="multipart/form-data"
                class="modal-content">
                @csrf
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="addEmploieLabel">Ajouter un emploi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de l'emploi</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="promoteur" class="form-label">Promoteur</label>
                        <input type="text" class="form-control" id="promoteur" name="promoteur" required>
                    </div>

                    <div class="mb-3">
                        <label for="localisation" class="form-label">Localisation</label>
                        <input type="text" class="form-control" id="localisation" name="localisation">
                    </div>

                    <div class="mb-3">
                        <label for="lien" class="form-label">Lien vers l'offre</label>
                        <input type="url" class="form-control" id="lien" name="lien" required>
                    </div>

                    <div class="mb-3">
                        <label for="type-modal" class="form-label">Type</label>
                        <select class="form-control" id="type-modal" name="type" required>
                            <option value="">-- Sélectionner un type --</option>
                            <option value="stage">Stage</option>
                            <option value="freelance">Freelance</option>
                            <option value="temps plein">Temps plein</option>
                            <option value="temps partiel">Temps partiel</option>
                            <option value="contrat">Contrat</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="categorie-modal" class="form-label">Catégorie</label>
                        <select class="form-control" id="categorie-modal" name="categorie" required>
                            <option value="">-- Sélectionner une catégorie --</option>
                            <option value="marketing">Marketing</option>
                            <option value="communication">Communication</option>
                            <option value="design">Design</option>
                            <option value="commerce">Commerce</option>
                            <option value="informatique">Informatique</option>
                            <option value="finance">Finance</option>
                            <option value="ressources humaines">Ressources humaines</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
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
