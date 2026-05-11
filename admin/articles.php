<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';

$sql = "SELECT * FROM articles ORDER BY created_at DESC";

$query = $pdo->query($sql);

$articles = $query->fetchAll();

?>

<?php require '../includes/header.php'; ?>

<h2>Gestion des articles</h2>

<div class="row">

<?php foreach ($articles as $article) : ?>

    <div class="col-md-6 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h3 class="card-title">
                    <?php echo $article['title']; ?>
                </h3>

                <p class="card-text">
                    <?php echo substr($article['content'], 0, 120); ?>...
                </p>

                <div class="d-flex gap-2">

                    <a 
                        href="article-edit.php?id=<?php echo $article['id']; ?>"
                        class="btn btn-primary btn-sm"
                    >
                        Modifier
                    </a>

                    <a 
                        href="article-delete.php?id=<?php echo $article['id']; ?>"
                        class="btn btn-danger btn-sm"
                    >
                        Supprimer
                    </a>

                </div>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

<?php require '../includes/footer.php'; ?>