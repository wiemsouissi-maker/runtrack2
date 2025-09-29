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
       body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #74ebd5, #9face6);
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            table {
                border-collapse: collapse;
                width: 350px;
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0px 6px 15px rgba(0,0,0,0.2);
                animation: fadeIn 0.8s ease-in-out;
            }
            th {
                background-color: #4a69bd;
                color: white;
                font-size: 20px;
                padding: 15px;
                text-transform: uppercase;
                letter-spacing: 1px;
            }
            td {
                padding: 15px;
                text-align: center;
                font-size: 18px;
                color: #333;
                font-weight: bold;
            }
            tr:nth-child(even) {
                background-color: #f8f8f8;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
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
            echo "<td>" . htmlspecialchars(round($value, 2)) . "</td>"; // arrondi à 2 décimales
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

