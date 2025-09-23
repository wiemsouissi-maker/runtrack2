<?php
function calcule($a, $operation, $b) {
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            // Vérifier pour éviter la division par zéro
            if ($b == 0) {
                return "Erreur : division par zéro !";
            }
            return $a / $b;
        case '%':
            // Vérifier pour éviter le modulo par zéro
            if ($b == 0) {
                return "Erreur : modulo par zéro !";
            }
            return $a % $b;
        default:
            return "Erreur : opération inconnue !";
    }
}

// Exemple d'utilisation :
echo calcule(10, '+', 5); // Affiche 15
echo "<br>";
echo calcule(10, '-', 3); // Affiche 7
echo "<br>";
echo calcule(10, '*', 2); // Affiche 20
echo "<br>";
echo calcule(10, '/', 2); // Affiche 5
echo "<br>";
echo calcule(10, '%', 3); // Affiche 1
?>

