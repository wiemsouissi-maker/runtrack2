<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'jour09';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

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
    $conn->query("
    INSERT INTO etudiants (prenom, nom, naissance, sexe, email) VALUES
    ('Tom', 'Durand', '2010-01-15', 'Homme', 'tom.durand@example.com'),
    ('Tania', 'Leclerc', '2005-06-12', 'Femme', 'tania.leclerc@example.com'),
    ('Ali', 'Ben', '2002-05-12', 'Homme', 'ali.ben@example.com'),
    ('Sara', 'Dupont', '2000-09-22', 'Femme', 'sara.dupont@example.com')
    ");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Étudiants de moins de 18 ans</title>
    <style>
     table {
    border-collapse: separate;
    border-spacing: 0;
    margin: 30px auto;
    min-width: 400px;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px 18px;
    border-bottom: 1px solid #ddd;
    text-align: center;
    font-family: "Segoe UI", Tahoma, sans-serif;
    font-size: 15px;
}

th {
    background: linear-gradient(135deg, #1abc9c, #16a085);
    color: white;
    font-weight: bold;
    letter-spacing: 0.5px;
}

tbody tr:nth-child(even) {
    background-color: #ecfdf5;
}

tbody tr:nth-child(odd) {
    background-color: #ffffff;
}

tbody tr:hover {
    background-color: #d1fae5;
    transition: background-color 0.3s ease;
}

    </style>
</head>
<body>

<?php
$sql = "SELECT * FROM etudiants WHERE naissance > DATE_SUB(CURDATE(), INTERVAL 18 YEAR)";
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
    echo "<p>Aucun étudiant de moins de 18 ans trouvé.</p>";
}
$conn->close();
?>
</body>
</html>
<?php
