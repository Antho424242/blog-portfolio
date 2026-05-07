<?php

session_start();

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    $query = $pdo->prepare($sql);

    $query->execute([$email, $password]);

    $user = $query->fetch();

    if ($user) {
        $_SESSION['user'] = $user;

        header('Location: admin/dashboard.php');
        exit;
    } else {
        echo "Informations incorrectes";
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Connexion administrateur</h2>

<form method="POST" action="login.php">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
    </div>

    <button type="submit">Se connecter</button>
</form>

<?php require 'includes/footer.php'; ?>