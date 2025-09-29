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

// 2️⃣ Créer la table etudiants si elle n'existe pas (facultatif)
$conn->query("
CREATE TABLE IF NOT EXISTS etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    naissance DATE,
    sexe VARCHAR(25),
    email VARCHAR(255)
)");

// 3️⃣ Insérer des données de test si la table est vide (facultatif)
$result = $conn->query("SELECT COUNT(*) AS count FROM etudiants");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    $conn->query("
    INSERT INTO etudiants (prenom, nom, naissance, sexe, email) VALUES
    ('Tom', 'Durand', '2010-01-15', 'Homme', 'tom.durand@example.com'),
    ('Tania', 'Leclerc', '2003-06-12', 'Femme', 'tania.leclerc@example.com'),
    ('Ali', 'Ben', '2002-05-12', 'Homme', 'ali.ben@example.com'),
    ('Sara', 'Dupont', '2000-09-22', 'Femme', 'sara.dupont@example.com')
    ");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Étudiants avec prénom commençant par T</title>
    <style>
        table {
    border-collapse: collapse;
    margin: 30px auto;
    min-width: 400px;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

th, td {
    padding: 12px 18px;
    border: 1px solid #ddd;
    text-align: center;
    font-family: Arial, sans-serif;
}

th {
    background: #8e44ad;
    color: #fff;
    font-weight: bold;
    letter-spacing: 0.5px;
}

tbody tr:nth-child(even) {
    background: #f8f0ff;
}

tbody tr:hover {
    background: #e6d9f3;
    transition: background-color 0.3s ease;
}

    </style>
</head>
<body>

<?php
// 4️⃣ Requête SQL : étudiants dont le prénom commence par "T"
$sql = "SELECT * FROM etudiants WHERE prenom LIKE 'T%'";
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
    echo "<p>Aucun étudiant trouvé avec un prénom commençant par 'T'.</p>";
}

// 5️⃣ Fermer la connexion
$conn->close();
?>
</body>
</html>
<?php
