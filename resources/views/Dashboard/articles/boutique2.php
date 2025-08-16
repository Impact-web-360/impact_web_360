<?php
require_once 'config.php';

$message = '';

// Nombre de produits par page
$limit = 6;

// Page actuelle (depuis URL ?page=)
$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Ajouter un produit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom     = trim($_POST['nom']);
    $prix    = floatval($_POST['prix']);
    $type    = trim($_POST['type']);
    $couleur = trim($_POST['couleur']);
    $taille  = trim($_POST['taille']);

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);

        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $imageName = uniqid('prod_') . '.' . $extension;

        $targetDir = __DIR__ . '/images/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($imageTmp, $targetFile)) {
            $stmt = $pdo->prepare("INSERT INTO produits (nom, image, prix, type, couleur, taille) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $imageName, $prix, $type, $couleur, $taille]);
            $message = "<div class='alert alert-success text-center'>Produit ajouté avec succès !</div>";
        } else {
            $message = "<div class='alert alert-danger text-center'>Erreur lors de l'upload de l'image.</div>";
        }
    } else {
        $message = "<div class='alert alert-danger text-center'>Veuillez sélectionner une image valide.</div>";
    }
}

// Supprimer un produit
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $stmtImg = $pdo->prepare("SELECT image FROM produits WHERE id = ?");
    $stmtImg->execute([$id]);
    $image = $stmtImg->fetchColumn();
    if ($image && file_exists(__DIR__ . '/images/' . $image)) {
        unlink(__DIR__ . '/images/' . $image);
    }

    $pdo->prepare("DELETE FROM produits WHERE id = ?")->execute([$id]);
    header("Location: boutique.php?page=" . $page);
    exit;
}

// Nombre total de produits
$totalProduits = $pdo->query("SELECT COUNT(*) FROM produits")->fetchColumn();
$totalPages = ceil($totalProduits / $limit);

// Récupérer produits avec limite et offset (pagination)
$stmt = $pdo->prepare("SELECT * FROM produits ORDER BY id DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Admin - Gestion Boutique</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      min-height: 100vh;
    }
    .sidebar {
      height: 100vh;
      background-color: #212529;
      color: #fff;
      padding-top: 2rem;
      position: fixed;
      width: 220px;
      top: 0;
      left: 0;
      overflow-y: auto;
    }
    .sidebar a {
      display: block;
      color: #fff;
      padding: 12px 20px;
      text-decoration: none;
      font-weight: 500;
      transition: background-color 0.3s;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #343a40;
      border-left: 4px solid #dc3545;
    }
    .content {
      margin-left: 220px;
      padding: 2rem;
    }
    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<nav id="sidebar" aria-label="Sidebar Navigation">
        <h4><i class="fa fa-cogs me-2"></i>Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="nav-link "><i class="fas fa-chart-bar"></i> Statistiques</a>
        <a href="{{ route('evenements.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i>Événements</a>
        <a href="{{ route('sponsors.index') }}" class="nav-link"><i class="fa fa-handshake"></i>Sponsors</a>
        <a href="{{ route('replay.index')}}" class="nav-link"><i class="fa-solid fa-play"></i> Replay
        <a href="{{ route('categories.index')}}" class="nav-link"><i class="fas fa-layer-group"></i>Catégorie</a>
        <a href="{{ route('formations.index')}}" class="nav-link"><i class="fas fa-graduation-cap"></i>Formation</a>
        <a href="{{ route('modules.index')}}" class="nav-link"><i class="fas fa-puzzle-piece"></i>Modules</a>
        <a href="{{ route('articles.index')}}" class="nav-link active"><i class="fa fa-shopping-basket"></i>Articles</a>
        <a href="{{ route('emploies.index')}}" class="nav-link"><i class="fa fa-briefcase"></i>Emplois</a>
        <a href="{{ route('intervenants.index')}}" class="nav-link"><i class="fa fa-user"></i>Intervenants</a>
        <a href="{{ route('billet')}}" class="nav-link"><i class="fas fa-calendar-alt "></i> Tickets</a>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
            <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>Deconnexion</a>
        </form>
        
      </nav>


<!-- Main content -->
<main class="content">
  <h2 class="mb-4">🏍️ Gestion de la boutique</h2>

  <?= $message ?>

  <div class="card p-4 mb-5">
    <h5 class="mb-3">Ajouter un produit</h5>
    <form method="post" enctype="multipart/form-data" class="row g-3">
      <div class="col-md-4">
        <input type="text" name="nom" class="form-control" placeholder="Nom du produit" required>
      </div>
      <div class="col-md-2">
        <input type="number" name="prix" class="form-control" placeholder="Prix (FCFA)" min="0" step="100" required>
      </div>
      <div class="col-md-2">
        <select name="type" class="form-select" required>
          <option value="">Type</option>
          <option value="T-shirt">T-shirt</option>
          <option value="Hoodie">Hoodie</option>
          <option value="Jeans">Jeans</option>
          <option value="Short">Short</option>
          <option value="Shirt">Shirt</option>
          <option value="Accessoires">Accessoires</option>
          <option value="Autre">Autres</option>
        </select>
      </div>
      <div class="col-md-2">
        <input type="color" name="couleur" class="form-control form-control-color" title="Choisir une couleur" required>
      </div>
      <div class="col-md-2">
        <select name="taille" class="form-select" required>
          <option value="">Taille</option>
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
      <div class="col-md-4">
        <input type="file" name="image" accept="image/*" class="form-control" required>
      </div>
      <div class="col-12 text-end">
        <button type="submit" class="btn btn-danger">Ajouter</button>
      </div>
    </form>
  </div>

  <h5 class="mb-4">Produits en boutique</h5>
  <?php if (count($produits) > 0): ?>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
      <?php foreach ($produits as $p): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="images/<?= htmlspecialchars($p['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($p['nom']) ?>" style="object-fit: cover; height: 200px;">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($p['nom']) ?></h5>
              <p class="card-text fw-bold"><?= number_format($p['prix'], 0, '', ' ') ?> FCFA</p>
              <p><strong>Type:</strong> <?= htmlspecialchars($p['type']) ?></p>
              <p><strong>Taille:</strong> <?= htmlspecialchars($p['taille']) ?></p>
              <p><strong>Couleur:</strong> <span style="display:inline-block;width:15px;height:15px;background-color:<?= htmlspecialchars($p['couleur']) ?>;border-radius:50%;border:1px solid #000;"></span></p>
            </div>
            <div class="card-footer text-center bg-white">
              <a href="?delete=<?= $p['id'] ?>&page=<?= $page ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">
                <i class="fa fa-trash"></i> Supprimer
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <nav aria-label="Pagination">
      <ul class="pagination justify-content-center">
        <!-- Lien page précédente -->
        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
          <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1">Précédent</a>
        </li>

        <?php
        // Affiche les numéros de pages
        for ($i = 1; $i <= $totalPages; $i++):
        ?>
          <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor; ?>

        <!-- Lien page suivante -->
        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
          <a class="page-link" href="?page=<?= $page + 1 ?>">Suivant</a>
        </li>
      </ul>
    </nav>

  <?php else: ?>
    <p class="text-center">Aucun produit disponible pour le moment.</p>
  <?php endif; ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
