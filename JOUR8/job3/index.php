<?php
session_start(); 

// Si l'utilisateur a cliqué sur le bouton de réinitialisation
if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = [];
}

// Si l'utilisateur a soumis un prénom
if (isset($_POST['prenom']) && !empty(trim($_POST['prenom']))) {
    // Si la variable de session n'existe pas encore, on l'initialise
    if (!isset($_SESSION['prenoms'])) {
        $_SESSION['prenoms'] = [];
    }
    // Ajoute le prénom dans le tableau de session
    $_SESSION['prenoms'][] = htmlspecialchars($_POST['prenom']);
}

// On prépare une variable pour l'affichage
$listePrenoms = isset($_SESSION['prenoms']) ? $_SESSION['prenoms'] : [];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des prénoms</title>
</head>
<body>
    <h1>Ajouter des prénoms</h1>

    <form method="post">
        <input type="text" name="prenom" placeholder="Entrez un prénom">
        <button type="submit" name="ajouter">Ajouter</button>
        <button type="submit" name="reset">Réinitialiser</button>
    </form>

    <h2>Liste des prénoms :</h2>
    <ul>
        <?php foreach ($listePrenoms as $p): ?>
            <li><?php echo $p; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
