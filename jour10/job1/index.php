<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'jour09';

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);

$conn->query("
CREATE TABLE IF NOT EXISTS etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    naissance DATE,
    sexe VARCHAR(25),
    email VARCHAR(255)
)");
 $result = $conn->query("SELECT COUNT(*) AS count FROM etudiants");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $conn->query("INSERT INTO etudiants (prenom, nom, naissance, sexe, email) VALUES
        ('Ali', 'Ben', '2002-05-12', 'Homme', 'ali.ben@example.com'),
        ('Sara', 'Dupont', '2000-09-22', 'Femme', 'sara.dupont@example.com'),
        ('Tom', 'Durand', '2010-01-15', 'Homme', 'tom.durand@example.com'),
        ('Lina', 'Martin', '2005-03-02', 'Femme', 'lina.martin@example.com')
    ");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <style>
        table { border-collapse: collapse; margin: 20px auto; min-width: 400px; }
        th, td { padding: 8px 16px; border: 1px solid #333; }
        th { background: #2980b9; color: #fff; }
        tbody tr:nth-child(even) { background: #f2f2f2; }
    </style>
</head>
<body>
<?php
$sql = "SELECT * FROM etudiants";
$result = $conn->query($sql);

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
