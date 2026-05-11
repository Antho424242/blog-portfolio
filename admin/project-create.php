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

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow-sm">

            <div class="card-body">

                <h2 class="mb-4">Créer un projet</h2>

                <form method="POST" action="project-create.php">

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

                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="8"
                            class="form-control"
                            required
                        ></textarea>

                    </div>

                    <div class="mb-3">

                        <label for="link" class="form-label">
                            Lien
                        </label>

                        <input 
                            type="text"
                            name="link"
                            id="link"
                            class="form-control"
                        >

                    </div>

                    <button class="btn btn-primary">
                        Créer le projet
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require '../includes/footer.php'; ?>