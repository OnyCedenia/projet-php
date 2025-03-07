<?php

session_start();

require_once '/app/Utils/utils.php';

checkAdmin();

// Récupérer le user grace à l'id dans $_POST
require_once '/app/Requests/users.php';

// On gère les cas d'erreurs si l'id n'est pas un nombre ou si l'utilisateur n'existe pas
$user = preg_match('/^[0-9]+$/', $_POST['id'] ?? '') ? findOneUserById($_POST['id']) : null;

// Si l'utilisateur n'existe pas on redirige
if (!$user) {
    $_SESSION['messages']['danger'] = "User introuvable";

    header('Location: /admin/users');
    exit(302);
}

if (deleteUser($user['id'])) {
    $_SESSION['messages']['success'] = "User supprimé avec succès";
} else {
    $_SESSION['messages']['danger'] = "Erreur lors de la suppression de l'utilisateur";
}

header('Location: /admin/users');
exit(302);
