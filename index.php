<?php

require_once 'includes/db.php';

$sqlArticles = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 3";
$queryArticles = $pdo->query($sqlArticles);
$articles = $queryArticles->fetchAll();

$sqlProjects = "SELECT * FROM projects ORDER BY created_at DESC LIMIT 3";
$queryProjects = $pdo->query($sqlProjects);
$projects = $queryProjects->fetchAll();

?>

<?php require 'includes/header.php'; ?>

<section class="hero text-center py-5">

    <h1 class="display-4 fw-bold mb-3">
        Bienvenue sur mon Blog Portfolio
    </h1>

    <p class="lead mb-4">
        Découvrez mes articles, mes projets et mon univers de développeur web.
    </p>

    <div class="d-flex justify-content-center gap-3">
        <a href="articles.php" class="btn btn-primary">
            Voir les articles
        </a>

        <a href="projects.php" class="btn btn-outline-primary">
            Voir les projets
        </a>
    </div>

</section>

<section class="about-section my-5">

    <div class="row align-items-center">

        <div class="col-md-4 text-center mb-4 mb-md-0">

            <img 
                src="assets/img/avatar.png"
                class="img-fluid rounded-circle shadow"
                alt="Photo profil"
            >

        </div>

        <div class="col-md-8">

            <h2 class="mb-3">
                À propos
            </h2>

            <p class="lead">
                Passionné par le développement web, je crée des projets modernes en PHP, Bootstrap et MySQL.
            </p>

            <p>
                Ce portfolio me permet de partager mes projets, mes articles et ma progression en développement web.
            </p>

            <div class="d-flex flex-wrap gap-2 mt-4">

                <span class="badge bg-primary p-2">PHP</span>
                <span class="badge bg-primary p-2">MySQL</span>
                <span class="badge bg-primary p-2">Bootstrap</span>
                <span class="badge bg-primary p-2">GitHub</span>
                <span class="badge bg-primary p-2">HTML/CSS</span>

            </div>

        </div>

    </div>

</section>

<section class="skills-section my-5">

    <h2 class="text-center mb-5">
        Mes compétences
    </h2>

    <div class="card shadow-sm p-4">

        <p>HTML</p>
        <div class="progress mb-4">
            <div class="progress-bar" style="width:80%">
                80%
            </div>
        </div>

        <p>CSS</p>
        <div class="progress mb-4">
            <div class="progress-bar bg-success" style="width:75%">
                75%
            </div>
        </div>

        <p>PHP</p>
        <div class="progress mb-4">
            <div class="progress-bar bg-warning" style="width:65%">
                65%
            </div>
        </div>

        <p>Bootstrap</p>
        <div class="progress mb-4">
            <div class="progress-bar bg-info" style="width:85%">
                85%
            </div>
        </div>

        <p>Git / GitHub</p>
        <div class="progress">
            <div class="progress-bar bg-dark" style="width:60%">
                60%
            </div>
        </div>

    </div>

</section>

<section class="my-5">

    <h2 class="mb-4">Derniers articles</h2>

    <div class="row">

        <?php foreach ($articles as $article) : ?>

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow-sm">

                    <?php if ($article['image']) : ?>

                        <img 
                            src="uploads/<?php echo htmlspecialchars($article['image']); ?>"
                            class="card-img-top object-fit-cover"
                            style="height: 220px;"
                            alt="Image article"
                        >

                    <?php endif; ?>

                    <div class="card-body">

                        <h3 class="card-title h5">
                            <?php echo htmlspecialchars($article['title']); ?>
                        </h3>

                        <p class="card-text">
                            <?php echo htmlspecialchars(substr($article['content'], 0, 100)); ?>...
                        </p>

                        <a 
                            href="article.php?id=<?php echo $article['id']; ?>"
                            class="btn btn-primary btn-sm"
                        >
                            Lire l’article
                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</section>

<section class="my-5">

    <h2 class="mb-4">Derniers projets</h2>

    <div class="row">

        <?php foreach ($projects as $project) : ?>

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow-sm">

                    <?php if ($project['image']) : ?>

                        <img 
                            src="uploads/<?php echo htmlspecialchars($project['image']); ?>"
                            class="card-img-top"
                            alt="Image projet"
                        >

                    <?php endif; ?>

                    <div class="card-body">

                        <h3 class="card-title h5">
                            <?php echo htmlspecialchars($project['title']); ?>
                        </h3>

                        <p class="card-text">
                            <?php echo htmlspecialchars(substr($project['description'], 0, 100)); ?>...
                        </p>

                        <a 
                            href="project.php?id=<?php echo $project['id']; ?>"
                            class="btn btn-outline-primary btn-sm"
                        >
                            Voir le projet
                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</section>

<?php require 'includes/footer.php'; ?>