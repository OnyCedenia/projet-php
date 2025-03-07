<?php

session_start();

// Utilisation de la session
// Vérifier si l'utilisateur n'est pas Admin on redirige
// Si clé user vide ou non définie -> Pas connecté
require_once '/app/Utils/utils.php';

checkAdmin();

require_once '/app/Requests/users.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration des users | My first app PHP</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main>
        <?php require_once '/app/public/Layout/_messages.php'; ?>
        <section class="container mt-4">
            <h1 class="text-center">Administration des users</h1>
            <table class="card mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Complet</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (findAllUsers() as $user): ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= "$user[first_name] $user[last_name]"; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['roles']; ?></td>
                            <td>
                                <div class="table-btn">
                                    <a href="/admin/users/update.php?id=<?= $user['id']; ?>" class="btn btn-secondary">Modifier</a>
                                    <form action="/admin/users/delete.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce user ?')">
                                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>