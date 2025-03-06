<?php

session_start();

require_once '/app/Requests/users.php';

// Vérifier si le formulaire a été soumis et que les données ne sont pas vides
if (
    !empty($_POST['email'])
    && !empty($_POST['password'])
) {
    // Récupère les informations envoyées par le formulaire
    // Nettoyer les données
    $email = strip_tags($_POST['email']);
    $password = $_POST['password'];

    // Récupérer l'utilisateur en BDD
    $user = findOneUserByEmail($email);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // On stock l'utilisateur en session
        $_SESSION['user'] = [
            'id' => $user['id'],
            'firstName' => $user['first_name'],
            'lastName' => $user['last_name'],
            'email' => $user['email'],
            'roles' => json_decode($user['roles'] ?? '[]')
        ];

        // Redirection vers la page d'accueil
        header('Location: /');
        exit(302);
    } else {
        $errorMessage = "Identifiants incorrects";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter | My first app PHP</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main>
        <?php require_once '/app/public/Layout/_messages.php'; ?>
        <section class="container mt-4">
            <h1 class="title text-center">Se connecter</h1>
            <form
                action="/login.php" method="POST" class="card mt-4 mx-auto w-50">
                <?php if (isset($errorMessage)): ?>
                    <div class="alert alert-danger">
                        <?= $errorMessage; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required placeholder="john@example.com">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required placeholder="S3CR3T">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
            <a href="/register.php" class="mt-4">Se créer un compte</a>
        </section>
    </main>
</body>

</html>