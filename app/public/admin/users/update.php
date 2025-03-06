<?php 

session_start();

require_once '/app/Utils/utils.php';

checkAdmin();

require_once '/app/Requests/users.php';

$user = !empty($_GET['id']) && preg_match('/^[0-9]+/', $_GET['id'] ?? '') ? findOneUsersById($_GET['id']) : null;

if (!$user){
    $_SESSION['messages']['danger'] = "User introuvable";
    header(header:'Location: /admin/users');
    exit(302);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un user | My first app PHP</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main>
        <?php require_once '/app/public/Layout/_messages.php'; ?>
        <section class="container mt-4">
            <h1 class="text-center">Modification d'un user</h1>
        </section>
    </main>
</body>

</html>