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

// 2️⃣ Créer la table salles si elle n'existe pas
$conn->query("
CREATE TABLE IF NOT EXISTS salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    id_etage INT,
    capacite INT
)");

// 3️⃣ Insérer des données d'exemple si la table est vide
$result = $conn->query("SELECT COUNT(*) AS count FROM salles");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $conn->query("
    INSERT INTO salles (nom, id_etage, capacite) VALUES
    ('Salle A', 1, 30),
    ('Salle B', 1, 50),
    ('Salle C', 2, 25)
    ");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des salles</title>
    <style>
        table { border-collapse: collapse; margin: 20px auto; min-width: 300px; }
        th, td { padding: 8px 16px; border: 1px solid #333; }
        th { background: #27ae60; color: #fff; }
        tbody tr:nth-child(even) { background: #f2f2f2; }
    </style>
</head>
<body>

<?php
// 4️⃣ Requête pour récupérer le nom et la capacité des salles
$sql = "SELECT nom, capacite FROM salles";
$result = $conn->query($sql);

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

// 5️⃣ Fermer la connexion
$conn->close();
?>
</body>
</html>
<?php
