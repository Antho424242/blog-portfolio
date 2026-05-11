<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

?>

<?php require '../includes/header.php'; ?>

<h1 class="mb-5">Tableau de bord</h1>

<div class="row">

    <div class="col-md-6 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h2 class="card-title">
                    Gestion des articles
                </h2>

                <p class="card-text">
                    Créer, modifier et supprimer les articles du site.
                </p>

                <a 
                    href="articles.php"
                    class="btn btn-primary"
                >
                    Accéder aux articles
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h2 class="card-title">
                    Gestion des projets
                </h2>

                <p class="card-text">
                    Gérer les projets affichés dans le portfolio.
                </p>

                <a 
                    href="projects.php"
                    class="btn btn-primary"
                >
                    Accéder aux projets
                </a>

            </div>

        </div>

    </div>

</div>

<?php require '../includes/footer.php'; ?>