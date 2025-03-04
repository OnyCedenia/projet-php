<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My first app PHP</title>
        <link rel="stylesheet" href="/assets/styles/main.css">
    </head>
    <body>
        <?php require_once '/app/public/Layout/_header.php'; ?>
        <main>
            <form action="/contact.php" method="GET">
            <label for="name">Votre nom</label>
            <input type="text" name="name" id="name">
            <label for="email">Votre email</label>
            <input type="email" name="email" id="email">
            <label for="message">Votre message</label>
            <textarea name="message" id="message"></textarea>
            <button type="submit">Envoyer</button>
        </form>
        </main>
</body>
</html>
 
