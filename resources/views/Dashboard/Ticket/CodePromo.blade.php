<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestion des Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
    <style>
        :root {
            --main-color: #f8f9fa;
            --primary: #0e0e12;
            --secondary: #000066;
            --accent: #ff3300;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Responsive Sidebar toggle button */
        #sidebarToggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1200;
            background-color: var(--main-color);
            border: none;
            color: #000066;
            padding: 0.5rem 0.75rem;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        #sidebarToggle:hover {
            background-color: rgba(0, 0, 102, 0.1);
        }
        
        .sidebar {
            overflow-y: auto;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: white;
            padding-top: 5rem;
            min-height: calc(100vh - 72px);
            box-shadow: 3px 0 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            padding: 0;
            z-index: 1050;
        }
        
        .sidebar .nav-link {
            color: var(--dark);
            padding: 0.8rem 1.5rem;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: rgba(0, 0, 102, 0.05);
            border-left: 4px solid var(--accent);
            color: var(--secondary);
        }
        
        .sidebar .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 10px;
        }

         /* Sidebar scroll bar */
        #sidebar::-webkit-scrollbar {
            width: 6px;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background-color: var(--main-color);
            border-radius: 10px;
        }
        
        .main-content {
            padding: 2rem;
            margin-left: 250px;
        }
        
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.25rem 1.5rem;
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
        }
        
        .stat-card {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stat-card i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--secondary);
        }
        
        .stat-card .number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary);
        }
        
        .stat-card .label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #bd2130);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
        }

        .nav h4 {
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
        }
        
        .table th {
            background-color: rgba(0, 0, 102, 0.05);
            color: var(--secondary);
            font-weight: 600;
        }
        
        .ticket-badge {
            padding: 0.5rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.85rem;
        }
        
        .qr-container {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 8px;
            padding: 5px;
        }
        
        .action-btn {
            padding: 0.3rem 0.6rem;
            margin: 0 2px;
        }
        
        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .category-tag {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            background-color: rgba(0, 0, 102, 0.1);
            color: var(--secondary);
            font-size: 0.8rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        
        .promo-badge {
            background: linear-gradient(135deg, #ff9a00, #ff3300);
            color: white;
        }
        
        .ticket-card {
            border-left: 4px solid var(--accent);
            transition: all 0.3s;
        }
        
        .ticket-card:hover {
            border-left: 8px solid var(--secondary);
        }

        @media (max-width: 991.98px) {
            #sidebar {
                transform: translateX(-260px);
            }

            #sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
                margin-top: 50px;
            }

            #sidebarToggle {
                display: block;
            }

            body.sidebar-open {
                overflow: hidden;
            }
        }
    </style>
</head>
<body>
    <button id="sidebarToggle" aria-label="Toggle menu"><i class="fas fa-bars"></i></button>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Sidebar Navigation" class="sidebar custom-sidebar">
                <div class="sticky-top pt-3">
                    <ul class="nav flex-column">
                        <h4><i class="fa fa-cogs mt-5 me-2"></i>Admin Panel</h4>
                        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-chart-bar"></i> Statistiques</a>
                        <a href="{{ route('evenements.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i>Événements</a>
                        <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i>Sponsors</a>
                        <a href="{{ route('replay.index')}}" class="nav-link"><i class="fa-solid fa-play"></i> Replay
                        <a href="{{ route('categories.index')}}" class="nav-link"><i class="fas fa-layer-group"></i>Catégorie</a>
                        <a href="{{ route('formations.index')}}" class="nav-link"><i class="fas fa-graduation-cap"></i>Formation</a>
                        <a href="{{ route('modules.index')}}" class="nav-link"><i class="fas fa-puzzle-piece"></i>Modules</a>
                        <a href="{{ route('articles.index')}}" class="nav-link"><i class="fa fa-shopping-basket"></i>Articles</a>
                        <a href="{{ route('emploies.index')}}" class="nav-link"><i class="fa fa-briefcase"></i>Emplois</a>
                        <a href="{{ route('intervenants.index')}}" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
                        <a href="{{ route('billet')}}" class="nav-link active"><i class="fas fa-calendar-alt "></i> Tickets</a>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                            <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>Deconnexion</a>
                        </form>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-12 ms-sm-auto col-lg-9 main-content">
                <!-- Stats Row -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <i class="fas fa-ticket-alt"></i>
                            <div class="number">142</div>
                            <div class="label">Tickets vendus</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <i class="fas fa-calendar"></i>
                            <div class="number">8</div>
                            <div class="label">Événements actifs</div>
                        </div>
                    </div>
        
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <i class="fas fa-percentage"></i>
                            <div class="number">12</div>
                            <div class="label">Codes promo</div>
                        </div>
                    </div>
                </div>

                <!-- Page Title and Button -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="fas fa-ticket-alt me-2"></i> Gestion des Tickets</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTicketModal">
                        <i class="fas fa-plus me-2"></i>Ajouter un Ticket
                    </button>
                </div>

                <!-- Tickets Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Liste des Tickets</span>
                        <div class="d-flex">
                            <input type="text" class="form-control me-2" placeholder="Rechercher...">
                            <button class="btn btn-outline-secondary"><i class="fas fa-filter"></i> Filtres</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Événement</th>
                                        <th>Catégories</th>
                                        <th>Prix</th>
                                        <th>Code Promo</th>
                                        <th>QR Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#TKT001</td>
                                        <td>Impact Web 360 - Conférence</td>
                                        <td>
                                            <span class="category-tag">VIP</span>
                                            <span class="category-tag">Early Bird</span>
                                        </td>
                                        <td>100.000 FCFA</td>
                                        <td><span class="badge promo-badge">IW360VIP</span></td>
                                        <td>
                                            <div class="qr-container" id="qr1"></div>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary action-btn" data-bs-toggle="modal" data-bs-target="#editTicketModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger action-btn" data-bs-toggle="modal" data-bs-target="#deleteTicketModal">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success action-btn">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TKT002</td>
                                        <td>Atelier Marketing Digital</td>
                                        <td>
                                            <span class="category-tag">Standard</span>
                                        </td>
                                        <td>50.000 FCFA</td>
                                        <td><span class="badge bg-secondary">Aucun</span></td>
                                        <td>
                                            <div class="qr-container" id="qr2"></div>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger action-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success action-btn">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TKT003</td>
                                        <td>Formation SEO Avancé</td>
                                        <td>
                                            <span class="category-tag">Étudiant</span>
                                            <span class="category-tag">Groupe</span>
                                        </td>
                                        <td>75.000 FCFA</td>
                                        <td><span class="badge promo-badge">SEOPROMO</span></td>
                                        <td>
                                            <div class="qr-container" id="qr3"></div>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger action-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success action-btn">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Suivant</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Ticket Cards View (Alternative) -->
                <div class="row mt-4 d-none">
                    <div class="col-md-4">
                        <div class="card ticket-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-primary">#TKT001</span>
                                    <span class="badge bg-success">Actif</span>
                                </div>
                                <h5 class="card-title">Impact Web 360 - Conférence</h5>
                                <p class="card-text">
                                    <span class="d-block"><i class="fas fa-tags me-2"></i> Catégories:</span>
                                    <span class="category-tag">VIP</span>
                                    <span class="category-tag">Early Bird</span>
                                </p>
                                <p class="card-text">
                                    <i class="fas fa-money-bill-wave me-2"></i> 
                                    <strong>100.000 FCFA</strong>
                                </p>
                                <p class="card-text">
                                    <i class="fas fa-percentage me-2"></i> 
                                    Code promo: <span class="badge promo-badge">IW360VIP</span>
                                </p>
                                <div class="text-center my-3">
                                    <div class="qr-container mx-auto" id="qrCard1"></div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit me-1"></i> Modifier
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash-alt me-1"></i> Supprimer
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-download me-1"></i> Télécharger
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Ticket Modal -->
    <div class="modal fade" id="addTicketModal" tabindex="-1" aria-labelledby="addTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTicketModalLabel"><i class="fas fa-plus-circle me-2"></i>Ajouter un Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="eventSelect" class="form-label">Événement</label>
                                    
                                        <select class="form-select" id="eventSelect">
                                        <option selected>Sélectionner un événement</option>
                                        <option value=""></option>
                                        <option>Atelier Marketing Digital</option>
                                        <option>Formation SEO Avancé</option>
                                        <option>Webinaire E-commerce</option>
                                        </select>
                                    
                                </div>
                                
                                <div class="mb-3">
                                    <label for="ticketName" class="form-label">Nom du Ticket</label>
                                    <input type="text" class="form-control" id="ticketName" placeholder="Ex: Pass VIP">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="ticketPrice" class="form-label">Prix (FCFA)</label>
                                    <input type="number" class="form-control" id="ticketPrice" placeholder="Ex: 100000">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Catégories</label>
                                    <div class="border p-3 rounded" style="max-height: 200px; overflow-y: auto;">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="category1">
                                            <label class="form-check-label" for="category1">
                                                VIP
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="category2" checked>
                                            <label class="form-check-label" for="category2">
                                                Standard
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="category3">
                                            <label class="form-check-label" for="category3">
                                                Étudiant
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="promoCode" class="form-label">Code Promo</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="promoCode" placeholder="Code promo">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fas fa-percentage"></i> Appliquer
                                        </button>
                                    </div>
                                    <div class="form-text">Laissez vide si aucun code promo</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ticketQuantity" class="form-label">Quantité</label>
                                    <input type="number" class="form-control" id="ticketQuantity" value="1" min="1">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ticketDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="ticketDescription" rows="3" placeholder="Description du ticket..."></textarea>
                        </div>
                        
                        <div class="text-center mt-4">
                            <h5>Aperçu du QR Code</h5>
                            <div class="qr-container mx-auto" id="qrPreview" style="width: 150px; height: 150px;"></div>
                            <p class="text-muted mt-2">Ce QR code sera généré automatiquement après création</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Ticket Modal -->
    <div class="modal fade" id="editTicketModal" tabindex="-1" aria-labelledby="editTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTicketModalLabel"><i class="fas fa-edit me-2"></i>Modifier le Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editEventSelect" class="form-label">Événement</label>
                                    <select class="form-select" id="editEventSelect">
                                        <option>Impact Web 360 - Conférence</option>
                                        <option>Atelier Marketing Digital</option>
                                        <option>Formation SEO Avancé</option>
                                        <option>Webinaire E-commerce</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="editTicketName" class="form-label">Nom du Ticket</label>
                                    <input type="text" class="form-control" id="editTicketName" value="Pass VIP">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="editTicketPrice" class="form-label">Prix (FCFA)</label>
                                    <input type="number" class="form-control" id="editTicketPrice" value="100000">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Catégories</label>
                                    <div class="border p-3 rounded" style="max-height: 200px; overflow-y: auto;">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="editCategory1" checked>
                                            <label class="form-check-label" for="editCategory1">
                                                VIP
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="editCategory2">
                                            <label class="form-check-label" for="editCategory2">
                                                Standard
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="editCategory3">
                                            <label class="form-check-label" for="editCategory3">
                                                Étudiant
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="editCategory4" checked>
                                            <label class="form-check-label" for="editCategory4">
                                                Early Bird
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="editCategory5">
                                            <label class="form-check-label" for="editCategory5">
                                                Groupe
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="editCategory6">
                                            <label class="form-check-label" for="editCategory6">
                                                Sponsor
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editPromoCode" class="form-label">Code Promo</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="editPromoCode" value="IW360VIP">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fas fa-percentage"></i> Appliquer
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editTicketQuantity" class="form-label">Quantité Disponible</label>
                                    <input type="number" class="form-control" id="editTicketQuantity" value="50">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="editTicketDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editTicketDescription" rows="3">Accès VIP à toutes les conférences, rencontres exclusives avec les intervenants et cocktail de networking.</textarea>
                        </div>
                        
                        <div class="text-center mt-4">
                            <h5>QR Code Actuel</h5>
                            <div class="qr-container mx-auto" id="editQrPreview" style="width: 150px; height: 150px;"></div>
                            <p class="text-muted mt-2">Le QR code sera mis à jour automatiquement après modification</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Mettre à jour</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteTicketModal" tabindex="-1" aria-labelledby="deleteTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteTicketModalLabel"><i class="fas fa-exclamation-triangle me-2"></i>Confirmation de suppression</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer ce ticket?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Attention: Cette action est irréversible. Toutes les données associées à ce ticket seront définitivement supprimées.
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h6>Ticket #TKT001</h6>
                            <p class="mb-1"><strong>Événement:</strong> Impact Web 360 - Conférence</p>
                            <p class="mb-1"><strong>Catégories:</strong> VIP, Early Bird</p>
                            <p class="mb-0"><strong>Prix:</strong> 100.000 FCFA</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger">Supprimer définitivement</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Génération des QR codes
        document.addEventListener('DOMContentLoaded', function() {
            // QR codes pour le tableau
            new QRCode(document.getElementById("qr1"), {
                text: "TKT001|Impact Web 360|VIP|100000",
                width: 80,
                height: 80
            });
            
            new QRCode(document.getElementById("qr2"), {
                text: "TKT002|Atelier Marketing|Standard|50000",
                width: 80,
                height: 80
            });
            
            new QRCode(document.getElementById("qr3"), {
                text: "TKT003|Formation SEO|Étudiant|75000",
                width: 80,
                height: 80
            });
            
            // QR code pour l'aperçu dans le modal d'ajout
            new QRCode(document.getElementById("qrPreview"), {
                text: "NOUVEAU_TICKET|À_CRÉER",
                width: 120,
                height: 120
            });
            
            // QR code pour l'aperçu dans le modal d'édition
            new QRCode(document.getElementById("editQrPreview"), {
                text: "TKT001|Impact Web 360|VIP|100000",
                width: 120,
                height: 120
            });
            
            // QR code pour la vue en cartes
            new QRCode(document.getElementById("qrCard1"), {
                text: "TKT001|Impact Web 360|VIP|100000",
                width: 100,
                height: 100
            });
            
            // Basculer entre la vue tableau et la vue cartes
            /* document.getElementById('viewToggle').addEventListener('change', function() {
                document.querySelector('.table-responsive').classList.toggle('d-none');
                document.querySelector('.row.mt-4').classList.toggle('d-none');
            }); */
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const body = document.body;

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function (e) {
                    e.stopPropagation();
                    sidebar.classList.toggle('active');
                    body.classList.toggle('sidebar-open');
                });
            }

            document.addEventListener('click', function (e) {
                if (window.innerWidth < 992 && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                    body.classList.remove('sidebar-open');
                }
            });
        });
    </script>
</body>
</html>