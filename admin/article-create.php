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

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow-sm">

            <div class="card-body">

                <h2 class="mb-4">Créer un article</h2>

                <form method="POST" action="article-create.php">

                    <div class="mb-3">

                        <label for="title" class="form-label">
                            Titre
                        </label>

                        <input 
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
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
                        ></textarea>

                    </div>

                    <button class="btn btn-primary">
                        Publier
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require '../includes/footer.php'; ?>