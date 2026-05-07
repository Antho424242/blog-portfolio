<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

?>

<?php require '../includes/header.php'; ?>

<h2>Dashboard administrateur</h2>

<p>Bienvenue dans l'administration du site.</p>

<?php require '../includes/footer.php'; ?>