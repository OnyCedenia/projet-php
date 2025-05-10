<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first app PHP</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main>
        <?php require_once '/app/public/Layout/_messages.php'; ?>
        <form action="/contact.php" method="POST">
            <label for="name">Votre nom</label>
            <input type="text" name="name" id="name" required>
            <label for="email">Votre email</label>
            <input type="email" name="email" id="email" required>
            <label for="message">Votre message</label>
            <textarea name="message" id="message" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </main>
</body>

</html>