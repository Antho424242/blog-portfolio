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

<?php foreach ($articles as $article) : ?>

   <h3><?php echo $article['title']; ?></h3>

   <p><?php echo $article['content']; ?></p>

   <a href="article-edit.php?id=<?php echo $article['id']; ?>">Modifier</a>

   <a href="article-delete.php?id=<?php echo $article['id']; ?>">Supprimer</a>

   <hr>

<?php endforeach; ?>

<?php require '../includes/footer.php'; ?>