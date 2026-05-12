<?php

require_once 'includes/db.php';

$sql = "SELECT * FROM projects ORDER BY created_at DESC";

$query = $pdo->query($sql);

$projects = $query->fetchAll();

?>

<?php require 'includes/header.php'; ?>

<h2>Tous les projets</h2>

<?php foreach ($projects as $project) : ?>

    <h3>
        <a href="project.php?id=<?php echo $project['id']; ?>">
        <?php echo htmlspecialchars($project['title']); ?>
        </a>
    </h3>

    <p><?php echo htmlspecialchars(substr($project['description'], 0, 100)); ?>...</p>

    <?php if (!empty($project['link'])) : ?>
        <p><?php echo $project['link']; ?></p>
    <?php endif; ?>

    <hr>

<?php endforeach; ?>

<?php require 'includes/footer.php'; ?>