<?php

require_once 'includes/db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM projects WHERE id = ?";

$query = $pdo->prepare($sql);

$query->execute([$id]);

$project = $query->fetch();

?>

<?php require 'includes/header.php'; ?>

<h2><?php echo $project['title']; ?></h2>

<p><?php echo $project['description']; ?></p>

<?php if (!empty($project['link'])) : ?>

    <p>
        <a href="<?php echo $project['link']; ?>" target="_blank">
            Voir le projet
        </a>
    </p>

<?php endif; ?>

<a href="projects.php">Retour aux projets</a>

<?php require 'includes/footer.php'; ?>