<?php
for ($n = 2; $n <= 1000; $n++) {
    $estPremier = true;

    // Vérifier si $n a un diviseur autre que 1 et lui-même
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            $estPremier = false;
            break;
        }
    }

    if ($estPremier) {
        echo $n . "<br />";
    }
}
?>
