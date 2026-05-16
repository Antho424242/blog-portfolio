<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog Portfolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/blog-portfolio/assets/css/style.css?v=4">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar sticky-top">
    <div class="container">

        <a class="navbar-brand" href="/blog-portfolio/index.php">
            Blog Portfolio
        </a>

        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/blog-portfolio/index.php">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/blog-portfolio/articles.php">Articles</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/blog-portfolio/projects.php">Projets</a>
                </li>
                <?php if (isset($_SESSION['user'])) : ?>

                <li class="nav-item">
                   <a 
                      class="nav-link"
                      href="/blog-portfolio/admin/article-create.php"
                  >
                      Créer un article
                   </a>
                </li>

                <li class="nav-item">
                   <a 
                    class="nav-link"
                    href="/blog-portfolio/admin/project-create.php"
                    >
                      Créer un projet
                   </a>
                </li>

                <?php endif; ?>

                <?php if (isset($_SESSION['user'])) : ?>

                <li class="nav-item">
             <a 
                class="nav-link text-light opacity-75"
                href="/blog-portfolio/logout.php"
                title="Déconnexion"
             >
                <i class="bi bi-box-arrow-right"></i>
            </a>
                </li>

                <?php endif; ?>
                <a class="nav-link" href="/blog-portfolio/login.php">
                   <i class="bi bi-person-circle"></i>
                </a>

            </ul>

        </div>

    </div>
</nav>

<main class="container my-5">