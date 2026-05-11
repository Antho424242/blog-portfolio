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

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow-sm">

            <div class="card-body">

                <h2 class="mb-4">Modifier un article</h2>

                <form method="POST" action="article-edit.php?id=<?php echo $article['id']; ?>">

                    <div class="mb-3">

                        <label for="title" class="form-label">
                            Titre
                        </label>

                        <input 
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            value="<?php echo $article['title']; ?>"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label for="content" class="form-label">
                            Contenu
                        </label>

                        <textarea
                            name="content"
                            id="content"
                            rows="10"
                            class="form-control"
                            required
                        ><?php echo $article['content']; ?></textarea>

                    </div>

                    <button class="btn btn-primary">
                        Modifier l’article
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require '../includes/footer.php'; ?>