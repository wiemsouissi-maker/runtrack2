<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Compteur POST</title>
</head>
<body>

<h2>Formulaire POST</h2>

<form method="POST" action="">
    <label>Nom :</label>
    <input type="text" name="nom"><br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom"><br><br>

    <label>Ville :</label>
    <input type="text" name="ville"><br><br>

    <input type="submit" value="Envoyer">
</form>

<?php
// Vérifie si le formulaire a été soumis
if (!empty($_POST)) {
    // Compter le nombre d'arguments POST
    $nbArguments = count($_POST);

    // Afficher le résultat
    echo "<p>Le nombre d'arguments POST envoyés est : " . $nbArguments . "</p>";
}
?>

</body>
</html>
