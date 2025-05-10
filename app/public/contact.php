<?php

if (
    !empty($_POST['name'])
    && !empty($_POST['email'])
    && !empty($_POST['message'])
) {
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $message = strip_tags($_POST['message']);
} else {
    header('Location: /');
    exit(302);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | My first App PHP</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main>
        <?php require_once '/app/public/Layout/_messages.php'; ?>
        <h1>Votre message:</h1>
        <p><?= $name; ?></p>
        <p><?= $email; ?></p>
        <p><?= $message; ?></p>
    </main>
</body>

</html>