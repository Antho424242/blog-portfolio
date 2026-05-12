<?php

session_start();

require_once 'includes/db.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";

    $query = $pdo->prepare($sql);
    
    $query->execute([$email]);
    
    $user = $query->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;

        header('Location: admin/dashboard.php');
        exit;
    } else {
        $error = "Informations incorrectes";
    }
}

?>

<?php require 'includes/header.php'; ?>

<h2>Connexion administrateur</h2>

<?php if ($error) : ?>

<div class="alert alert-danger">

    <?php echo $error; ?>

</div>

<?php endif; ?>

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card shadow-sm">

            <div class="card-body">

                <h2 class="mb-4">Connexion administrateur</h2>

                <form method="POST" action="login.php">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>

                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="form-control"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">
                            Mot de passe
                        </label>

                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="form-control"
                            required
                        >
                    </div>

                    <button class="btn btn-primary w-100">
                        Se connecter
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php require 'includes/footer.php'; ?>