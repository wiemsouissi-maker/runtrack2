<?php
fonction occurences($str,$char) {
    $count = 0;
    // Parcourir chaque caractère de la chaîne
    for ($i = 0; $i < strlen($str);$i++) {
        if ($str[$i] === $char) {
            $count++;
        }
    }

    return $count;
}   
 execmple d'utilisation :
echo occurences("Bonjour","o"); //  Affiche 2
?>
