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

<?php if ($project['image']) : ?>

<img 
    src="uploads/<?php echo htmlspecialchars($project['image']); ?>"
    class="img-fluid mb-4"
    alt="Image projet"
>

<?php endif; ?>
<h2><?php echo htmlspecialchars($project['title']); ?></h2>

<p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>

<?php if (!empty($project['link'])) : ?>

    <p>
        <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank">
            Voir le projet
        </a>
    </p>

<?php endif; ?>

<a href="projects.php">Retour aux projets</a>

<?php require 'includes/footer.php'; ?>