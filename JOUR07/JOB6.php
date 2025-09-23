<?php
function leetSpeak($str) {
    // Tableau des correspondances
    $leet = [
        'A' => '4', 'a' => '4',
        'B' => '8', 'b' => '8',
        'E' => '3', 'e' => '3',
        'G' => '6', 'g' => '6',
        'L' => '1', 'l' => '1',
        'S' => '5', 's' => '5',
        'T' => '7', 't' => '7'
    ];

    // Remplace chaque caractère selon le tableau
    return strtr($str, $leet);
}

// Exemple d'utilisation
$texte = "La plateforme est géniale !";
echo leetSpeak($texte);
?>
