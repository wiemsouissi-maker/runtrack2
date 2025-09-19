<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <style>
        /*  Dégradé animé sur le fond */
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;

    /*  Image de fond */
    background: url('https://images.unsplash.com/photo-1546587348-d12660c30c50?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8bmF0dXJlbHxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center fixed;
    /* 🎞️ Animation de zoom */
    animation: zoomBackground 10s ease-in-out infinite alternate;
}

@keyframes zoomBackground {
    0% { background-size: 100% 100%; }
    100% { background-size: 110% 110%; }
}


        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 📋 Style du formulaire */
        form {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            width: 320px;
            text-align: left;
        }

        h2 {
            text-align: center;
            color: #0077b6;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #0077b6;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #023e8a;
        }

        .result {
            margin-top: 20px;
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            color: #0077b6;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <form method="get">
        <h2>Formulaire</h2>
        <label>Nom :</label>
        <input type="text" name="nom">

        <label>Prénom :</label>
        <input type="text" name="prenom">

        <label>Ville :</label>
        <input type="text" name="ville">

        <input type="submit" value="Envoyer">
    </form>

    <?php
    if (!empty($_GET)) {
        $nbArguments = count($_GET);
        echo "<div class='result'>Le nombre d'arguments GET envoyés est : " . $nbArguments . "</div>";
        
    }
    ?>
</body>
</html>
