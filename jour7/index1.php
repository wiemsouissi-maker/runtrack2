<?php
// Déclaration de la fonction
function bonjour($jour) {
    if ($jour) {
        echo "Bonjour";
    } else {
        echo "Bonsoir";
    }
}

// Exemple d'appel de la fonction
bonjour(true);  // Affichera : Bonjour
echo "<br>";
bonjour(false); // Affichera : Bonsoir
?>
 