<?php
session_start();

if (!isset($_SESSION['grille']) || isset($_POST['reset'])) {
    $_SESSION['grille'] = array_fill(0, 9, "-");
    $_SESSION['joueur'] = "X";
    $_SESSION['gagnant'] = null;
}

function verifierGagnant($grille) {
    $combinaisons = [
        [0,1,2], [3,4,5], [6,7,8],
        [0,3,6], [1,4,7], [2,5,8],
        [0,4,8], [2,4,6]
    ];

    foreach ($combinaisons as $c) {
        if ($grille[$c[0]] != "-" &&
            $grille[$c[0]] == $grille[$c[1]] &&
            $grille[$c[1]] == $grille[$c[2]]) {
            return $grille[$c[0]];
        }
    }
    return null;
}

if (isset($_POST['case']) && $_SESSION['grille'][$_POST['case']] == "-" && !$_SESSION['gagnant']) {
    $_SESSION['grille'][$_POST['case']] = $_SESSION['joueur'];


    $gagnant = verifierGagnant($_SESSION['grille']);
    if ($gagnant) {
        $_SESSION['gagnant'] = $gagnant;
    } else if (!in_array("-", $_SESSION['grille'])) {
        $_SESSION['gagnant'] = "Match nul";
    } else {
        $_SESSION['joueur'] = ($_SESSION['joueur'] == "X") ? "O" : "X";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Morpion</title>
    <style>
        table { border-collapse: collapse; margin-bottom: 10px; }
        td { border: 1px solid #000; width: 60px; height: 60px; text-align: center; }
        button { width: 100%; height: 100%; font-size: 24px; }
    </style>
</head>
<body>

<h1>Jeu du Morpion</h1>

<?php if ($_SESSION['gagnant']): ?>
    <h2>
        <?php 
            if ($_SESSION['gagnant'] == "Match nul") echo "Match nul !";
            else echo $_SESSION['gagnant'] . " a gagné !"; 
        ?>
    </h2>
<?php else: ?>
    <h2>Joueur actuel : <?php echo $_SESSION['joueur']; ?></h2>
<?php endif; ?>


<form method="post">
    <table>
        <?php for ($i=0; $i<3; $i++): ?>
            <tr>
                <?php for ($j=0; $j<3; $j++): 
                    $index = $i*3 + $j;
                ?>
                    <td>
                        <?php if ($_SESSION['grille'][$index] == "-"): ?>
                            <button type="submit" name="case" value="<?php echo $index; ?>">-</button>
                        <?php else: ?>
                            <?php echo $_SESSION['grille'][$index]; ?>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</form>


<form method="post">
    <button type="submit" name="reset">Réinitialiser la partie</button>
</form>

</body>
</html>
