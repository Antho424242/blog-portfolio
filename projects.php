<?php

require_once 'includes/db.php';

$sql = "SELECT * FROM projects ORDER BY created_at DESC";

$query = $pdo->query($sql);

$projects = $query->fetchAll();

?>

<?php require 'includes/header.php'; ?>

<h2 class="mb-4">Tous les projets</h2>

<div class="row">

<?php foreach ($projects as $project) : ?>

    <div class="col-md-4 mb-4">

        <div class="card h-100 shadow-sm">

            <?php if ($project['image']) : ?>

                <img 
                    src="uploads/<?php echo htmlspecialchars($project['image']); ?>"
                    class="card-img-top object-fit-cover"
                    style="height: 220px;"
                    alt="Image projet"
                >

            <?php endif; ?>

            <div class="card-body d-flex flex-column">

                <h3 class="card-title h5">
                    <?php echo htmlspecialchars($project['title']); ?>
                </h3>

                <p class="card-text">
                    <?php echo htmlspecialchars(substr($project['description'], 0, 120)); ?>...
                </p>

                <?php if (!empty($project['link'])) : ?>

                    <p>
                        <a 
                            href="<?php echo htmlspecialchars($project['link']); ?>"
                            target="_blank"
                        >
                            Voir le site
                        </a>
                    </p>

                <?php endif; ?>

                <a 
                    href="project.php?id=<?php echo $project['id']; ?>"
                    class="btn btn-outline-primary mt-auto"
                >
                    Voir le projet
                </a>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

<?php require 'includes/footer.php'; ?>