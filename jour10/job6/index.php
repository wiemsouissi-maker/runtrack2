<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'jour09';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS nb_etudiants FROM etudiants";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nombre total d'étudiants</title>
    <style>
      table {
    border-collapse: separate;
    border-spacing: 0;
    margin: 30px auto;
    min-width: 220px;
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
}

th, td {
    padding: 10px 18px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-family: Arial, sans-serif;
    font-size: 15px;
}

th {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: white;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0.5px;
}

tbody tr:nth-child(even) {
    background-color: #f8f8f8;
}

tbody tr:hover {
    background-color: #e3f2fd;
    transition: background-color 0.3s ease;
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
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    
    echo "</table>";
} else {
    echo "<p>Aucun étudiant trouvé.</p>";
}

$conn->close();
?>
</body>
</html>
<?php
