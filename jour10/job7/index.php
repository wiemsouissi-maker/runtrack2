<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=jour09", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT SUM(superficie) AS superficie_totale FROM etage";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>Superficie totale des étages</title>
        <style>
           body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #74ebd5, #ACB6E5);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

table {
    border-collapse: separate;
    border-spacing: 0;
    width: 420px;
    background-color: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    animation: fadeIn 0.6s ease-in-out;
}

th, td {
    padding: 14px 20px;
    text-align: center;
    font-size: 16px;
}

th {
    background: linear-gradient(135deg, #ff7e5f, #feb47b);
    color: white;
    font-weight: bold;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

tbody tr:nth-child(odd) {
    background-color: #fdfdfd;
}

tbody tr:nth-child(even) {
    background-color: #f7f7f7;
}

tbody tr:hover {
    background-color: #ffe3d8;
    transition: background 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
        </style>
    </head>
        </style>
    <body>";

    echo "<table>";
    echo "<thead><tr><th>Superficie totale</th></tr></thead>";
    echo "<tbody>";
    echo "<tr><td>" . htmlspecialchars($result['superficie_totale']) . "</td></tr>";
    echo "</tbody>";
    echo "</table>";

    echo "</body></html>";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>
<?php   
