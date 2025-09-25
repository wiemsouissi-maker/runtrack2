<?php
session_start();

// --- Initialisation de la grille ---
if (!isset($_SESSION['grille']) || isset($_POST['reset'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, "-"));
    $_SESSION['tour'] = "X"; // X commence
    $_SESSION['message'] = "";
}

// --- Traitement d'un clic sur une case ---
if (isset($_POST['case'])) {
    list($i, $j) = explode("_", $_POST['case']); // "0_1" → [0,1]

    // Si la case est libre et qu'il n'y a pas encore de gagnant
    if ($_SESSION['grille'][$i][$j] === "-" && $_SESSION['message'] === "") {
        $_SESSION['grille'][$i][$j] = $_SESSION['tour'];

        // Vérifier s'il y a un gagnant
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

// Réinitialiser automatiquement si message (gagnant ou nul)
if ($_SESSION['message'] !== "" && isset($_POST['case'])) {
    // Petite pause pour que l'utilisateur voie le message avant reset
    // Vous pouvez enlever la pause si pas nécessaire
    // sleep(1);
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
        table { border-collapse: collapse; margin: 20px auto; }
        td { width: 60px; height: 60px; text-align: center; border: 2px solid black; }
        button { width: 100%; height: 100%; font-size: 20px; }
        h2, h3 { text-align: center; }
    </style>
</head>
<body>
    <h2>Jeu du Morpion</h2>
    <?php if ($_SESSION['message']): ?>
        <h3><?php echo $_SESSION['message']; ?></h3>
    <?php else: ?>
        <h3>Tour de : <?php echo $_SESSION['tour']; ?></h3>
    <?php endif; ?>

    <form method="post">
        <table>
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td>
                            <?php if ($_SESSION['grille'][$i][$j] === "-"): ?>
                                <button type="submit" name="case" value="<?php echo $i . "_" . $j; ?>">-</button>
                            <?php else: ?>
                                <?php echo "<strong>" . $_SESSION['grille'][$i][$j] . "</strong>"; ?>
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

