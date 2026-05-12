<?php

require_once 'includes/db.php';

$sql = "SELECT * FROM articles ORDER BY created_at DESC";

$query = $pdo->query($sql);

$articles = $query->fetchAll();

?>

<?php require 'includes/header.php'; ?>

<h2>Tous les articles</h2>

<div class="row">

<?php foreach ($articles as $article) : ?>

    <div class="col-md-6 mb-4">

        <div class="card h-100 shadow-sm">

            <div class="card-body">

                <h3 class="card-title">
                    <a 
                        href="article.php?id=<?php echo $article['id']; ?>"
                        class="text-decoration-none"
                    >
                    <?php echo htmlspecialchars($article['title']); ?>
                    </a>
                </h3>

                <p class="card-text">
                <?php echo htmlspecialchars(substr($article['content'], 0, 100)); ?>...
                </p>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

<?php require 'includes/footer.php'; ?>