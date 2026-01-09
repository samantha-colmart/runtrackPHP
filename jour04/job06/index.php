<?php
$message = "";

if (!empty($_GET) && array_key_exists('nombre', $_GET)) {
    $nombre = $_GET['nombre'];

    if ($nombre === "" || !is_numeric($nombre)) {
        $message = "Veuillez entrer un nombre valide.";
    } else {
        if ($nombre % 2 == 0) {
            $message = "Nombre pair";
        } else {
            $message = "Nombre impair";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nombre pair ou impair</title>
</head>
<body>

<h2>Vérification pair/impair</h2>

<form action="" method="GET">
    <label>
        Entrez un nombre :
        <input type="text" name="nombre">
    </label>
    <input type="submit" value="Vérifier">
</form>

<?php
if (!empty($message)) {
    echo "<p>$message</p>";
}
?>

</body>
</html>
