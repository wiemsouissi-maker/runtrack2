<?php
// Fonction 1 : mots commençant par majuscule → gras
function gras($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (preg_match("/^[A-Z]/", $mot)) {
            $mot = "<b>$mot</b>";
        }
    }
    return implode(" ", $mots);
}

// Fonction 2 : chiffrement César
function cesar($str, $decalage = 2) {
    $result = "";
    $decalage = $decalage % 26; // reste dans l'alphabet
    for ($i = 0; $i < strlen($str); $i++) {
        $c = $str[$i];
        if (ctype_alpha($c)) {
            $base = ctype_upper($c) ? ord('A') : ord('a');
            $result .= chr(($ord = ord($c) - $base + $decalage) % 26 + $base);
        } else {
            $result .= $c;
        }
    }
    return $result;
}

// Fonction 3 : ajoute "_" aux mots finissant par "me"
function plateforme($str) {
    $mots = explode(" ", $str);
    foreach ($mots as &$mot) {
        if (preg_match("/me$/i", $mot)) {
            $mot .= "_";
        }
    }
    return implode(" ", $mots);
}

// Traitement du formulaire
$resultat = "";
$str = "";
$fonction = "";
$decalage = 2; // valeur par défaut

if (isset($_POST['str'], $_POST['fonction'])) {
    $str = $_POST['str'];
    $fonction = $_POST['fonction'];
    
    if ($fonction === 'cesar') {
        $decalage = isset($_POST['decalage']) ? (int)$_POST['decalage'] : 2;
        $resultat = cesar($str, $decalage);
    } elseif ($fonction === 'gras') {
        $resultat = gras($str);
    } elseif ($fonction === 'plateforme') {
        $resultat = plateforme($str);
    } else {
        $resultat = "Fonction inconnue.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Transformations de texte</title>
    <style>
        body { 
             background-image: url(https://www.clipartmax.com/png/middle/182-1821202_tube-fleurs-jaunes-fleur-jaune-fond-transparent.png);

             font-family: Arial; text-align: center; margin-top: 50px; }

        form { background: #d1d16bff; padding: 20px; display: inline-block; border-radius: 10px; box-shadow: 0 0 10px rgba(119, 33, 73, 0.2); }

        input, select, button { margin: 5px; padding: 8px; font-size: 1em; }
        button { cursor: pointer; background-color: #02110522; color: white; border: none; border-radius: 5px; }
        button:hover { background-color: #005fa3; }
        #resultat { margin: top 100px; font-size: 2.2em; color: #4a0c3cff; word-break: break-word; }
    </style>
</head>
<body>
    <h1>Transformations de texte</h1>
    <form method="POST">
        <input type="text" name="str" placeholder="Entrez votre texte" value="<?php echo htmlspecialchars($str); ?>" required>
        <select name="fonction">
            <option value="gras" <?php if($fonction==="gras") echo "selected"; ?>>Gras</option>
            <option value="cesar" <?php if($fonction==="cesar") echo "selected"; ?>>César</option>
            <option value="plateforme" <?php if($fonction==="plateforme") echo "selected"; ?>>Plateforme</option>
        </select>
        <input type="number" name="decalage" value="<?php echo $decalage; ?>" placeholder="Décalage pour César">
        <br>
        <button type="submit">Appliquer</button>
    </form>

    <?php if ($resultat !== ""): ?>
        <div id="resultat"><?php echo $resultat; ?></div>
    <?php endif; ?>
</body>
</html>
 