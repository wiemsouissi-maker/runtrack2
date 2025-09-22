<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nombre Pair ou Impair</title>
</head>
<body>

<h2>Test Pair / Impair</h2>

<!-- Formulaire en GET -->
<form method="GET" action="">
    <label>Entrez un nombre :</label>
    <input type="text" name="nombre" required>
    <input type="submit" value="Vérifier">
</form>

<?php
// Vérifie si un nombre a été passé en GET
if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];

    // Vérifie que c'est bien un nombre
    if (is_numeric($nombre)) {
        if ($nombre % 2 == 0) {
            echo "<h3 style='color:green;'>Nombre pair</h3>";
        } else {
            echo "<h3 style='color:blue;'>Nombre impair</h3>";
        }
    } else {
        echo "<h3 style='color:red;'>Veuillez entrer un nombre valide</h3>";
    }
}
?>

</body>
</html>
