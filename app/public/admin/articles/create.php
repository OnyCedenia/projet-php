<?php

session_start();

require_once '/app/Utils/utils.php';

checkAdmin();

require_once '/app/Requests/article.php';


// Vérification si le formulaire est soumis et que les champs obligatoires ne sont pas vides
if (
    !empty($_POST['title'])
    && !empty($_POST['description'])
){
    // Nettoyer les données (supprimer les balises HTML) -> faille XSS
    $title = strip_tags($_POST['title']);
    $description = strip_tags($_POST['description']);

    $titleExist = findOneTitleByArticle($title);
    if (!$titleExist) {
        // On peut créer l'utilisateur
        if (createArticle($title, $description)) {
            // Définir un message de success
            $_SESSION['messages']['success'] = "Votre article a bien été créé";

            // Redirection vers la page de connexion
            header('Location: /admin/article.php');
            exit(302);
        } else {
            $errorMessage = "Une erreur est survenue lors de la création de votre article";
        }
    } else {
        $errorMessage = "Ce titre est déjà utilisé";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire | My first app PHP</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
</head>

<body>
    <?php require_once '/app/public/Layout/_header.php'; ?>
    <main>
        <?php require_once '/app/public/Layout/_messages.php'; ?>
        <section class="container mt-4">
            <h1 class="title text-center">Création des articles</h1>
            <form action="/admin/articles/create.php" method="POST" class="card mt-4">
                <?php if (isset($errorMessage)): ?>
                    <div class="alert alert-danger">
                        <?= $errorMessage; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" name="title" id="title" required placeholder="Titre de l'article">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" required placeholder="Description de l'article...">
                </div>
              
                <button type="submit" class="btn btn-primary">Créer l'article</button>
            </form>
        </section>
    </main>
</body>

</html>