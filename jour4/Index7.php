<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <title>Maison Dynamique</title>
    <style>
        pre {
            font-family: monospace;
            font-size: 16px;
            line-height: 1.2;
        }
        label {
            display: inline-block;
            width: 80px;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            margin: 5px 0;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #0077b6;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #023e8a;
        }
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f5f5;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            width: 320px;
            text-align: left;
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
            color: #0077b6;
            margin-bottom: 20px;
        }
        .result {
            margin-top: 20px;
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            color: #0077b6;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

    
    </style>
</head>
<body>

<h2>Dessiner une maison</h2>

<form method="GET" action="">
    <label>Largeur :</label>
    <input type="number" name="largeur" required min="2"><br><br>

    <label>Hauteur :</label>
    <input type="number" name="hauteur" required min="2"><br><br>

    <input type="submit" value="Dessiner">
</form>

<?php
if (isset($_GET['largeur']) && isset($_GET['hauteur'])) {
    $largeur = intval($_GET['largeur']);
    $hauteur = intval($_GET['hauteur']);

    echo "<h3>Votre maison :</h3>";
    echo "<pre>";

    // ---- TOIT (triangle centré sur largeur) ----
    for ($i = 1; $i <= $largeur; $i++) {
        $espaces = str_repeat(" ", $largeur - $i);
        echo $espaces . str_repeat("^", 2 * $i - 1) . "\n";
    }

    // ---- MURS (rectangle) ----
    for ($j = 1; $j <= $hauteur; $j++) {
        if ($j == $hauteur) {
            echo str_repeat("-", $largeur * 2 - 1) . "\n"; 
        } else {
            echo "|" . str_repeat(" ", $largeur * 2 - 3) . "|\n";
        }
    }

    echo "</pre>";
}
?>


</body>
</html>
