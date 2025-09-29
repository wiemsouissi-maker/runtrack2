<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'jour09';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
$sql = "SELECT AVG(capacite) AS capacite_moyenne FROM salles";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Capacité moyenne des salles</title>
    <style>
        table { border-collapse: collapse; margin: 20px auto; min-width: 250px; }
        th, td { padding: 8px 16px; border: 1px solid #333; text-align: center; }
        th { background: #f39c12; color: #fff; }
        tbody tr:nth-child(even) { background: #f2f2f2; }
    </style>
</head>
<body>
<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead><tr>";
    while ($fieldinfo = $result->fetch_field()) {
        echo "<th>" . htmlspecialchars($fieldinfo->name) . "</th>";
    }
    echo "</tr></thead>";

    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . htmlspecialchars(round($value,2)) . "</td>"; // arrondi à 2 décimales
        }
        echo "</tr>";
    }
    echo "</tbody>";

    echo "</table>";
} else {
    echo "<p>Aucune donnée trouvée.</p>";
}
$conn->close();
?>
</body>
</html>
