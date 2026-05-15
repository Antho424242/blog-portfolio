<?php

require_once 'includes/db.php';

$sql = "SELECT * FROM articles ORDER BY created_at DESC";

$query = $pdo->query($sql);

$articles = $query->fetchAll();

?>

<?php require 'includes/header.php'; ?>

<h2 class="mb-4">Tous les articles</h2>

<div class="row">

<?php foreach ($articles as $article) : ?>

    <div class="col-md-4 mb-4">

        <div class="card h-100 shadow-sm">

            <?php if ($article['image']) : ?>

                <img 
                    src="uploads/<?php echo htmlspecialchars($article['image']); ?>"
                    class="card-img-top object-fit-cover"
                    style="height: 220px;"
                    alt="Image article"
                >

            <?php endif; ?>

            <div class="card-body d-flex flex-column">

                <h3 class="card-title h5">
                    <?php echo htmlspecialchars($article['title']); ?>
                </h3>

                <p class="card-text">
                    <?php echo htmlspecialchars(substr($article['content'], 0, 120)); ?>...
                </p>

                <a 
                    href="article.php?id=<?php echo $article['id']; ?>"
                    class="btn btn-primary mt-auto"
                >
                    Lire l’article
                </a>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

<?php require 'includes/footer.php'; ?>