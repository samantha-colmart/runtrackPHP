<?php
if (isset($_POST['reset'])) {
    setcookie("nbvisites", 0, time() + 3600);
    $_COOKIE['nbvisites'] = 0;
}

if (!isset($_COOKIE['nbvisites'])) {
    $nbvisites = 1;
} else {
    $nbvisites = $_COOKIE['nbvisites'] + 1;
}

setcookie("nbvisites", $nbvisites, time() + 3600);   //dure 1 heure (3600sec) 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites (Cookie)</title>
</head>
<body>

<h1>Compteur de visites (Cookie)</h1>

<p>Nombre de visites : <strong><?php echo $nbvisites; ?></strong></p>

<form method="post">
    <button type="submit" name="reset">Reset</button>
</form>

</body>
</html>
