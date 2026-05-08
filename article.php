<?php

require_once 'includes/db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM articles WHERE id = ?";

$query = $pdo->prepare($sql);

$query->execute([$id]);

$article = $query->fetch();

?>

<?php require 'includes/header.php'; ?>

<h2><?php echo $article['title']; ?></h2>

<p><?php echo $article['content']; ?></p>

<a href="articles.php">Retour aux articles</a>

<?php require 'includes/footer.php'; ?>