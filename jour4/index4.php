<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire POST</title>
</head>
<body>

<form method="POST" action="">
    <label>Nom : </label>
    <input type="text" name="nom"><br><br>

    <label>Prénom : </label>
    <input type="text" name="prenom"><br><br>

    <label>Email : </label>
    <input type="text" name="email"><br><br>

    <input type="submit" value="Envoyer">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Résultat :</h2>";

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Argument</th><th>Valeur</th></tr>";

    // Parcours du tableau $_POST
    foreach ($_POST as $argument => $valeur) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($argument) . "</td>";
        echo "<td>" . htmlspecialchars($valeur) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
