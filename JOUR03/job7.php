<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";

$premier = $str[0];

$nouvelle_str = "";
for ($i = 1; $i < strlen($str); $i++) {
    $nouvelle_str .= $str[$i];
}

$nouvelle_str .= $premier;

echo $nouvelle_str;
?>
