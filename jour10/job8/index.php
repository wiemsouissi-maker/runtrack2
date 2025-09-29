<?php
// 1️⃣ Connexion à la base de données
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'jour09';

$conn = new mysqli($host, $user, $pass, $db);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// 2️⃣ Requête SQL : somme des capacités des salles
$sql = "SELECT SUM(capacite) AS capacite_totale FROM salles";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Capacité totale des salles</title>
    <style>
       table {
    border-collapse: separate;
    border-spacing: 0;
    margin: 30px auto;
    width: 50%;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    overflow: hidden;
}

th, td {
    padding: 12px 18px;
    text-align: center;
    font-size: 16px;
}

th {
    background: linear-gradient(135deg, #27ae60, #2ecc71);
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

tbody tr:nth-child(even) {
    background-color: #eefaf2;
}

tbody tr:hover {
    background-color: #d5f5e3;
    transition: background 0.3s ease;
}

    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    
    // En-tête
    echo "<thead><tr>";
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
    }
    echo "</tr></thead>";
    
    // Corps du tableau
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    
    echo "</table>";
} else {
    echo "<p>Aucune donnée trouvée.</p>";
}

// Fermer la connexion
$conn->close();
?>
</body>
</html>
