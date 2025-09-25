<?php
// Durée de vie du cookie : 1 jour
$expiration = time() + 24 * 60 * 60;

// Vérifier si l'utilisateur a demandé la déconnexion
if (isset($_POST['deco'])) {
    // On supprime le cookie en le réécrivant avec une date passée
    setcookie("prenom", "", time() - 3600);
    $_COOKIE['prenom'] = null; // Mise à jour immédiate pour l'affichage
}

// Si le formulaire de connexion a été soumis et que le prénom est rempli
if (isset($_POST['connexion']) && !empty(trim($_POST['prenom']))) {
    $prenom = htmlspecialchars($_POST['prenom']);
    setcookie("prenom", $prenom, $expiration);
    $_COOKIE['prenom'] = $prenom; // Mise à jour immédiate
}

// Vérifier si le cookie existe
$prenomCookie = isset($_COOKIE['prenom']) ? $_COOKIE['prenom'] : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion avec Cookie</title>
</head>
<body>

<?php if ($prenomCookie): ?>
    <!-- Si un prénom est déjà dans le cookie -->
    <h1>Bonjour <?php echo $prenomCookie; ?> !</h1>
    <form method="post">
        <button type="submit" name="deco">Déconnexion</button>
    </form>

<?php else: ?>
    <!-- Sinon, afficher le formulaire de connexion -->
    <h1>Connexion</h1>
    <form method="post">
        <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
        <button type="submit" name="connexion">Connexion</button>
    </form>

<?php endif; ?>

</body>
</html>
