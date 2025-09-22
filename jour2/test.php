<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Formulaire GET avec tableau</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
    form { background: white; padding: 20px; border-radius: 8px; width: 320px; }
    input[type="text"], input[type="submit"] { width: 90%; padding: 8px; margin: 5px 0; border-radius: 5px; border: 1px solid #ccc; }
    input[type="submit"] { background: #0077b6; color: white; border: none; cursor: pointer; }
    input[type="submit"]:hover { background: #023e8a; }
    table { border-collapse: collapse; width: 50%; margin-top: 20px; }
    th, td { border: 1px solid #333; padding: 8px; text-align: left; }
    th { background-color: #0077b6; color: white; }
    tr:nth-child(even) { background-color: #f1f1f1; }
</style>
</head>
<body>

<h2>Formulaire GET</h2>
<form method="GET" action="">
    <input type="text" name="nom" placeholder="Nom" value="<?php echo isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : ''; ?>"><br>
    <input type="text" name="prenom" placeholder="Prénom" value="<?php echo isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : ''; ?>"><br>
    <input type="text" name="ville" placeholder="Ville" value="<?php echo isset($_GET['ville']) ? htmlspecialchars($_GET['ville']) : ''; ?>"><br>
    <input type="submit" value="Envoyer">
</form>

<?php
if (!empty($_GET)) {
    echo "<h3>Tableau des arguments GET :</h3>";
    echo "<table>";
    echo "<tr><th>Argument</th><th>Valeur associée</th></tr>";
    foreach ($_GET as $arg => $val) {
        echo "<tr><td>$arg</td><td>" . htmlspecialchars($val) . "</td></tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
