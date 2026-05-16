<?php

require_once 'includes/db.php';

$id = (int) $_GET['id'];

$sql = "SELECT * FROM projects WHERE id = ?";

$query = $pdo->prepare($sql);

$query->execute([$id]);

$project = $query->fetch();
if (!$project) {
    header('Location: projects.php');
    exit;
}

?>

<?php require 'includes/header.php'; ?>

<article class="project-detail">

    <?php if ($project['image']) : ?>

        <img 
            src="uploads/<?php echo htmlspecialchars($project['image']); ?>"
            class="project-hero-image"
            alt="Image projet"
        >

    <?php endif; ?>

    <div class="project-content">

        <a href="projects.php" class="btn btn-outline-primary mb-4">
            ← Retour aux projets
        </a>

        <h1 class="project-title">
            <?php echo htmlspecialchars($project['title']); ?>
        </h1>

        <div class="project-text">
            <?php echo nl2br(htmlspecialchars($project['description'])); ?>
        </div>

        <?php if (!empty($project['link'])) : ?>

            <a 
                href="<?php echo htmlspecialchars($project['link']); ?>"
                target="_blank"
                class="btn btn-primary mt-4"
            >
                Voir le projet
            </a>

        <?php endif; ?>

    </div>

</article>

<?php require 'includes/footer.php'; ?>