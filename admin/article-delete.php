<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

require_once '../includes/db.php';

$id = (int) $_GET['id'];

$sql = "DELETE FROM articles WHERE id = ?";

$query = $pdo->prepare($sql);

$query->execute([$id]);

header('Location: articles.php');
exit;