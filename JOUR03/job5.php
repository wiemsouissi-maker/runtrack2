<?php
$str = "On n’est pas le meilleur quand on le croit mais quand on le sait";

$dic = array(
    "voyelles" => 0,
    "consonnes" => 0
);

$voyelles = "aeiouyAEIOUY";

for ($i = 0; $i < strlen($str); $i++) {
    $char = $str[$i];

    if (ctype_alpha($char)) {
        if (strpos($voyelles, $char) !== false) {
            $dic["voyelles"]++; // on incrémente les voyelles
        } else {
            $dic["consonnes"]++; // sinon c'est une consonne
        }
    }
}

// Affichage en tableau HTML
echo "<table border='1' cellpadding='5' style='border-collapse: collapse; text-align: center;'>
<thead>
<tr>
<th>Voyelles</th>
<th>Consonnes</th>
</tr>
</thead>
<tbody>
<tr>
<td>" . $dic["voyelles"] . "</td>
<td>" . $dic["consonnes"] . "</td>
</tr>
</tbody>
</table>";
?>
