<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM articles WHERE id = ?";

$query = $pdo->prepare($sql);

$query->execute([$id]);

$article = $query->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE articles SET title = ?, content = ? WHERE id = ?";

    $query = $pdo->prepare($sql);

    $query->execute([$title, $content, $id]);

    header('Location: articles.php');
    exit;
}
?>

<?php require '../includes/header.php'; ?>

<h2>Modifier un article</h2>

<form method="POST" action="article-edit.php?id=<?php echo $article['id']; ?>">

    <div>
        <label for="title">Titre</label>

        <input 
            type="text" 
            name="title" 
            id="title"
            value="<?php echo $article['title']; ?>"
            required
        >
    </div>

    <div>
        <label for="content">Contenu</label>

        <textarea 
            name="content" 
            id="content" 
            rows="10"
            required
        ><?php echo $article['content']; ?></textarea>
    </div>

    <button type="submit">Modifier</button>

</form>

<?php require '../includes/footer.php'; ?>