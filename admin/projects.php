<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';

$sql = "SELECT * FROM projects ORDER BY created_at DESC";

$query = $pdo->query($sql);

$projects = $query->fetchAll();

?>

<?php require '../includes/header.php'; ?>

<h2>Gestion des projets</h2>

<a href="project-create.php">Créer un projet</a>

<?php foreach ($projects as $project) : ?>

    <h3><?php echo $project['title']; ?></h3>

    <p><?php echo $project['description']; ?></p>

    <p><?php echo $project['link']; ?></p>

    <a href="project-edit.php?id=<?php echo $project['id']; ?>">Modifier</a>

    <a href="project-delete.php?id=<?php echo $project['id']; ?>">Supprimer</a>

    <hr>

<?php endforeach; ?>

<?php require '../includes/footer.php'; ?>