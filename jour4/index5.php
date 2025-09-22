<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h2>Formulaire de Connexion</h2>

<form method="POST" action="">
    <label>Nom d'utilisateur :</label>
    <input type="text" name="username" required><br><br>

    <label>Mot de passe :</label>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Se connecter">
</form>

<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie les identifiants
    if ($username === "John" && $password === "Rambo") {
        echo "<h3 style='color:green;'>C’est pas ma guerre</h3>";
    } else {
        echo "<h3 style='color:red;'>Votre pire cauchemar</h3>";
    }
}
?>

</body>
</html>
