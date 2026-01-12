<?php

function gras($str) {
    return preg_replace_callback('/\b[A-Z][a-zA-Z]*\b/', function($matches){
        return "<b>" . $matches[0] . "</b>";
    }, $str);
}

function cesar($str, $decalage = 2) {
    $result = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (ctype_alpha($char)) {
            $base = ctype_upper($char) ? ord('A') : ord('a');
            $result .= chr((ord($char) - $base + $decalage) % 26 + $base);
        } else {
            $result .= $char;
        }
    }
    return $result;
}

function plateforme($str) {
    return preg_replace('/\b\w*me\b/', '$0_', $str);
}

// Gestion du formulaire
$str = '';
$choix = '';
$decalage = 2;
$result = '';
$explication = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $str = $_POST['str'] ?? '';
    $choix = $_POST['transformation'] ?? '';
    $decalage = $_POST['decalage'] ?? 2;

    switch ($choix) {
        case 'gras':
            $result = gras($str);
            $explication = "La transformation <b>Gras</b> met tous les mots commençant par une majuscule en gras.";
            break;
        case 'césar':
            $result = cesar($str, (int)$decalage);
            $explication = "La transformation <b>César</b> décale chaque lettre de la chaîne de $decalage positions dans l'alphabet.";
            break;
        case 'plateforme':
            $result = plateforme($str);
            $explication = "La transformation <b>Plateforme</b> ajoute un underscore (_) à la fin de chaque mot se terminant par 'me'.";
            break;
        default:
            $result = $str;
            $explication = "Aucune transformation appliquée.";
            break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de transformation</title>
</head>
<body>
<h2>Transformez votre texte</h2>

<form method="post" action="">
    <label for="str">Chaîne :</label>
    <input type="text" name="str" id="str" value="<?php echo htmlspecialchars($str); ?>" required>
    <br><br>

    <label for="transformation">Transformation :</label>
    <select name="transformation" id="transformation">
        <option value="gras" <?php if($choix=='gras') echo 'selected'; ?>>Gras</option>
        <option value="césar" <?php if($choix=='césar') echo 'selected'; ?>>César</option>
        <option value="plateforme" <?php if($choix=='plateforme') echo 'selected'; ?>>Plateforme</option>
    </select>
    <br><br>

    <label for="decalage">Décalage César :</label>
    <input type="number" name="decalage" id="decalage" value="<?php echo htmlspecialchars($decalage); ?>">
    <br><br>

    <input type="submit" value="Transformer">
</form>

<?php if($result !== ''): ?>
    <h3>Résultat :</h3>
    <p><?php echo $result; ?></p>
    <h3>Explication :</h3>
    <p><?php echo $explication; ?></p>
<?php endif; ?>

</body>
</html>
