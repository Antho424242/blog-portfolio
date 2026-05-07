<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $sql = "INSERT INTO projects (title, description, link) VALUES (?, ?, ?)";

    $query = $pdo->prepare($sql);

    $query->execute([$title, $description, $link]);

    header('Location: projects.php');
    exit;
}

?>

<?php require '../includes/header.php'; ?>

<h2>Créer un projet</h2>

<form method="POST" action="project-create.php">

    <div>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="10" required></textarea>
    </div>

    <div>
        <label for="link">Lien</label>
        <input type="text" name="link" id="link">
    </div>

    <button type="submit">Créer</button>

</form>

<?php require '../includes/footer.php'; ?>