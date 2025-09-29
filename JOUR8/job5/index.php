<?php
session_start();

if (!isset($_SESSION['grille']) || isset($_POST['reset'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, "-"));
    $_SESSION['tour'] = "X";
    $_SESSION['message'] = "";
}

if (isset($_POST['case'])) {
    list($i, $j) = explode("_", $_POST['case']);  
 if ($_SESSION['grille'][$i][$j] === "-" && $_SESSION['message'] === "") {
        $_SESSION['grille'][$i][$j] = $_SESSION['tour'];
        if (verifierGagnant($_SESSION['grille'], $_SESSION['tour'])) {
            $_SESSION['message'] = $_SESSION['tour'] . " a gagné !";
        } elseif (grillePleine($_SESSION['grille'])) {
            $_SESSION['message'] = "Match nul !";
        } else {
            // Changer de joueur
            $_SESSION['tour'] = ($_SESSION['tour'] === "X") ? "O" : "X";
        }
    }
}

// --- Fonctions ---
function verifierGagnant($grille, $symbole)
{
    // Vérifier les lignes et colonnes
    for ($i = 0; $i < 3; $i++) {
        if ($grille[$i][0] === $symbole && $grille[$i][1] === $symbole && $grille[$i][2] === $symbole) return true;
        if ($grille[0][$i] === $symbole && $grille[1][$i] === $symbole && $grille[2][$i] === $symbole) return true;
    }
    // Vérifier diagonales
    if ($grille[0][0] === $symbole && $grille[1][1] === $symbole && $grille[2][2] === $symbole) return true;
    if ($grille[0][2] === $symbole && $grille[1][1] === $symbole && $grille[2][0] === $symbole) return true;

    return false;
}

function grillePleine($grille)
{
    foreach ($grille as $ligne) {
        foreach ($ligne as $case) {
            if ($case === "-") return false;
        }
    }
    return true;
}

if ($_SESSION['message'] !== "" && isset($_POST['case'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, "-"));
    $_SESSION['tour'] = "X";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu du Morpion</title>
    <style>
        table { border-collapse: collapse; margin: 40px auto; }

        td { width: 80px; height: 90px; text-align: center; border: 5px solid black; }

        button { width: 100%; height: 100%; font-size: 40px; }

        h2, h3 { text-align: center; }
        body { font-family: Arial, sans-serif; 
            BACKGROUND-IMAGE: URL('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover; background-attachment: fixed; background-position: center;
            background-repeat: no-repeat; margin: 0; padding: 0 
            
            ; }
        h2 { color: #5a0e4fff;}         
        h3 { color: #e171b8ff; }
        form { margin-top: 20px; }
        button[type="submit"] { background-color: #700759ff; color: white;
        border: none; padding: 10px 20px; cursor: pointer; font-size: 16px; border-radius: 5px; }
        button[type="submit"]:hover { background-color: #45a049; }

        table { background-color:#ffffff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }  
        td { background-color: #e0e0e0; }
        td button { background-color: #ffffff; }

    </style>

</head>
<body>
    <h2>Jeu du Morpion</h2>
    <?php if ($_SESSION['message']): ?>
        <h3><?php 
          echo $_SESSION['message']; ?></h3>
    <?php else: ?>

        <h3>Tour de : <?php echo $_SESSION['tour']; ?></h3>
    <?php endif; ?>

    <form method="post">
        
        <table>
     <?php for ($i = 0; $i < 3; $i++): ?>
         <tr>
   <?php for ($j = 0; $j < 3; $j++): ?>
           <td>
    
    <?php 


                            
   if ($_SESSION['grille'][$i][$j] === "-"): ?>
        <button type="submit" name="case" value="<?php echo $i . "_" . $j; ?>">-</button>
         <?php else: ?>
         <?php echo "<strong>" .
          $_SESSION['grille'][$i][$j] . "</strong>"; ?>
          <?php endif; ?>
             </td>
          <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <div style="text-align:center;">
            <button type="submit" name="reset">Réinitialiser la partie</button>
        </div>
    </form>
</body>
</html>

