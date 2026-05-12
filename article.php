<?php

require_once 'includes/db.php';

$id = (int) $_GET['id'];

$sql = "SELECT * FROM articles WHERE id = ?";

$query = $pdo->prepare($sql);

$query->execute([$id]);

$article = $query->fetch();
if (!$article) {
    header('Location: articles.php');
    exit;
}

?>

<?php require 'includes/header.php'; ?>

<h2><?php echo htmlspecialchars($article['title']); ?></h2>

<p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>

<a href="articles.php">Retour aux articles</a>

<?php require 'includes/footer.php'; ?>