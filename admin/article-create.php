<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO articles (title, content) VALUES (?, ?)";

    $query = $pdo->prepare($sql);

    $query->execute([$title, $content]);

    echo "Article créé avec succès";
}
?>

<?php require '../includes/header.php'; ?>

<h2>Créer un article</h2>

<form method="POST" action="article-create.php">

    <div>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div>
        <label for="content">Contenu</label>
        <textarea name="content" id="content" rows="10" required></textarea>
    </div>

    <button type="submit">Publier</button>

</form>

<?php require '../includes/footer.php'; ?>