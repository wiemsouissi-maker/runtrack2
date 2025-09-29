<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'jour09';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
$sql = "SELECT salles.nom AS nom_salle, etage.nom AS nom_etage
        FROM salles
        JOIN etage ON salles.id_etage = etage.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Salles et étages</title>
    <style>
        table { border-collapse: collapse; margin: 20px auto; min-width: 400px; }
        th, td { padding: 8px 16px; border: 1px solid #333; text-align: center; }
        th { background: #c0392b; color: #fff; }
        tbody tr:nth-child(even) { background: #f2f2f2; }
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
    echo "<p>Aucune salle trouvée.</p>";
}

// Fermer la connexion
$conn->close();
?>
</body>
</html>
 
