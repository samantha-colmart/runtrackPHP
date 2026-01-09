<?php

$compteur = 0;

if (!empty($_GET)) {
    foreach ($_GET as $key => $valeur) {
        if (!empty($valeur)) {
            $compteur++;
        }
    }
}
echo "Nombre d'arguments : " . $compteur;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test GET</title>
</head>
<body>

<form action="" method="GET" >

    <label> Nom :<input type="text" name="nom" placeholder = "nom" > </label> <br><br>

    <label>Mot de passe :<input type="password" name="mdp" placeholder = "mdp" > </label> <br><br>

    <input type="submit" value="Envoyer">

</form>

</body>
</html>