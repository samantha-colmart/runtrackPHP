<?php
$maison = "";

if (!empty($_GET)) {
    $largeur = intval($_GET['largeur']);
    $hauteur = intval($_GET['hauteur']);

    if ($largeur >= 3 && $hauteur >= 3) {

        for ($i = 1; $i <= $hauteur; $i++) {
            $espaces = str_repeat(" ", $hauteur - $i);
            if ($i == 1) {
                $maison .= $espaces . "/\\" . $espaces . "\n";
            } else {
                $maison .= $espaces . "/" . str_repeat(" ", $i * 2 - 3) . "\\" . $espaces . "\n";
            }
        }

        for ($i = 1; $i <= $hauteur; $i++) {
            if ($i == 1 || $i == $hauteur) {
                $maison .= "+" . str_repeat("-", $largeur - 2) . "+\n";
            } else {
                $maison .= "|" . str_repeat(" ", $largeur - 2) . "|\n";
            }
        }

    } else {
        $maison = "Veuillez entrer des valeurs >= 3 pour largeur et hauteur.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Maison avec barres</title>
</head>
<body>

<h2>Dessin d'une maison</h2>

<form method="GET" action="">
    <label>
        Largeur (>=3) :
        <input type="number" name="largeur" min="3" value="<?php echo !empty($largeur) ? $largeur : ''; ?>">
    </label><br><br>

    <label>
        Hauteur (>=3) :
        <input type="number" name="hauteur" min="3" value="<?php echo !empty($hauteur) ? $hauteur : ''; ?>">
    </label><br><br>

    <input type="submit" value="Dessiner la maison">
</form>

<?php
if (!empty($maison)) {
    echo "<pre>$maison</pre>";
}
?>

</body>
</html>
