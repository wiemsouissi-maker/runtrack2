<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'jour09';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$sql = "SELECT * FROM salles ORDER BY capacite DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des salles triées par capacité</title>
    <style>
       table {
    border-collapse: collapse;
    margin: 40px auto;
    width: 60%;
    max-width: 700px;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    animation: fadeIn 0.6s ease-in-out;
}
th {
    background-color: #6a11cb;  
    background-image: linear-gradient(315deg, #6a11cb 0%, #2575fc 74%);
    color: white;
    font-size: 18px;

    padding: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
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
    echo "<p>Aucune salle trouvée.</p>";
}

// Fermer la connexion
$conn->close();
?>
</body>
</html>
