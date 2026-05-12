<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';

$sql = "SELECT * FROM projects ORDER BY created_at DESC";

$query = $pdo->query($sql);

$projects = $query->fetchAll();

?>

<?php require '../includes/header.php'; ?>

<h2>Gestion des projets</h2>

<a href="project-create.php">Créer un projet</a>

<div class="row">

<?php foreach ($projects as $project) : ?>

    <div class="col-md-6 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h3 class="card-title">
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
                            class="btn btn-outline-secondary btn-sm"
                        >
                            Voir le lien
                        </a>
                    </p>

                <?php endif; ?>

                <div class="d-flex gap-2">

                    <a 
                        href="project-edit.php?id=<?php echo $project['id']; ?>"
                        class="btn btn-primary btn-sm"
                    >
                        Modifier
                    </a>

                    <a 
                         href="project-delete.php?id=<?php echo $project['id']; ?>"
                         class="btn btn-danger btn-sm"
                         onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?')"
                    >
                    Supprimer
                    </a>

                </div>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

<?php require '../includes/footer.php'; ?>