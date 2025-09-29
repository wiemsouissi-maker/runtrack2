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

// 2️⃣ Requête SQL : récupérer toutes les salles triées par capacité décroissante
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
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 15px rgba(0,0,0,0.15);
}

th, td {
    padding: 12px 20px;
    border-bottom: 1px solid #ddd;
    text-align: center;
    font-size: 16px;
}

th {
    background-color: #3498db;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

tbody tr:hover {
    background-color: #eaf2ff;
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
    echo "<p>Aucune salle trouvée.</p>";
}

// Fermer la connexion
$conn->close();
?>
</body>
</html>
 
