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

<article class="article-detail">

    <?php if ($article['image']) : ?>

        <img 
            src="uploads/<?php echo htmlspecialchars($article['image']); ?>"
            class="article-hero-image"
            alt="Image article"
        >

    <?php endif; ?>

    <div class="article-content">

        <a href="articles.php" class="btn btn-outline-primary mb-4">
            ← Retour aux articles
        </a>

        <h1 class="article-title">
            <?php echo htmlspecialchars($article['title']); ?>
        </h1>

        <div class="article-text">
            <?php echo nl2br(htmlspecialchars($article['content'])); ?>
        </div>

    </div>

</article>

<?php require 'includes/footer.php'; ?>