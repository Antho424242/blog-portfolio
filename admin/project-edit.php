<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM projects WHERE id = ?";

$query = $pdo->prepare($sql);

$query->execute([$id]);

$project = $query->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $sql = "UPDATE projects SET title = ?, description = ?, link = ? WHERE id = ?";

    $query = $pdo->prepare($sql);

    $query->execute([$title, $description, $link, $id]);

    header('Location: projects.php');
    exit;
}

?>

<?php require '../includes/header.php'; ?>

<h2>Modifier un projet</h2>

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow-sm">

            <div class="card-body">

                <h2 class="mb-4">Modifier un projet</h2>

                <form method="POST" action="project-edit.php?id=<?php echo $project['id']; ?>">

                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>

                        <input 
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            value="<?php echo $project['title']; ?>"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>

                        <textarea
                            name="description"
                            id="description"
                            rows="8"
                            class="form-control"
                            required
                        ><?php echo $project['description']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Lien</label>

                        <input 
                            type="text"
                            name="link"
                            id="link"
                            class="form-control"
                            value="<?php echo $project['link']; ?>"
                        >
                    </div>

                    <button class="btn btn-primary">
                        Modifier le projet
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require '../includes/footer.php'; ?>