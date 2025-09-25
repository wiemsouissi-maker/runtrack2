<?php
session_start(); // Pour pouvoir utiliser $_SESSION

// Si on envoie un GET en cliquant sur le lien ci-dessous
if (isset($_GET['test'])) {
    echo "<p style='color:green;'>GET reçu avec test=" . htmlspecialchars($_GET['test']) . "</p>";
}

// Si on envoie un POST avec le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<p style='color:blue;'>POST reçu avec nom=" . htmlspecialchars($_POST['nom']) . "</p>";
}

// Gestion de la session
if (isset($_POST['action']) && $_POST['action'] === 'session') {
    $_SESSION['utilisateur'] = "Wiem";
    $_SESSION['role'] = "Apprenant";
}

if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_destroy();
    echo "<p style='color:red;'>Session détruite.</p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test des superglobales</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f3f3f3; }
        pre { background: #fff; padding: 10px; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.1); }
        form { margin-bottom: 20px; }
        button { margin-top: 10px; padding: 8px 15px; background: #0077cc; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #005fa3; }
    </style>
</head>
<body>
    <h1>Tester les superglobales PHP</h1>

    <!-- Formulaire POST -->
    <form method="POST">
        <label for="nom">Entrez votre nom :</label><br>
        <input type="text" name="nom" id="nom"
                placeholder="Votre nom ici" required>           

        <br>
        <button type="submit">Envoyer en POST</button>
    </form>

    