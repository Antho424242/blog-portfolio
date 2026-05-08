<?php

require_once 'includes/db.php';

$sql = "SELECT * FROM articles ORDER BY created_at DESC";

$query = $pdo->query($sql);

$articles = $query->fetchAll();

?>

<?php require 'includes/header.php'; ?>

<h2>Tous les articles</h2>

<?php foreach ($articles as $article) : ?>

    <h3>
        <a href="article.php?id=<?php echo $article['id']; ?>">
            <?php echo $article['title']; ?>
        </a>
    </h3>

    <p>
        <?php echo substr($article['content'], 0, 100); ?>...
    </p>

    <hr>

<?php endforeach; ?>

<?php require 'includes/footer.php'; ?>