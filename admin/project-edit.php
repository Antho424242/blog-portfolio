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

<form method="POST" action="project-edit.php?id=<?php echo $project['id']; ?>">

    <div>
        <label for="title">Titre</label>
        <input 
            type="text" 
            name="title" 
            id="title" 
            value="<?php echo $project['title']; ?>" 
            required
        >
    </div>

    <div>
        <label for="description">Description</label>
        <textarea 
            name="description" 
            id="description" 
            rows="10" 
            required
        ><?php echo $project['description']; ?></textarea>
    </div>

    <div>
        <label for="link">Lien</label>
        <input 
            type="text" 
            name="link" 
            id="link" 
            value="<?php echo $project['link']; ?>"
        >
    </div>

    <button type="submit">Modifier</button>

</form>

<?php require '../includes/footer.php'; ?>