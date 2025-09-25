<?php
// Durée de vie du cookie (ici : 1 an)
$expiration = time() + 365 * 24 * 60 * 60;

// Vérifier si le bouton reset a été cliqué
if (isset($_POST['reset'])) {
    setcookie("nbvisites", 0, $expiration); // réinitialise le cookie
    $_COOKIE["nbvisites"] = 0; // met aussi la variable à jour pour l'affichage immédiat
}

// Vérifier si le cookie existe
if (isset($_COOKIE["nbvisites"])) {
    $nbvisites = $_COOKIE["nbvisites"] + 1; // incrémente
} else {
    $nbvisites = 1; // première visite
}

// Met à jour le cookie
setcookie("nbvisites", $nbvisites, $expiration);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur avec Cookie</title>
</head>
<body>
    <h1>Compteur avec Cookie</h1>
    <p>Nombre de visites : <strong><?php echo $nbvisites; ?></strong></p>

    <form method="post">
        <button type="submit" name="reset">Réinitialiser</button>
    </form>
</body>
</html>
