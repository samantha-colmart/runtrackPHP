<?php
$compteur = 0;
$tableau_args = [];

if (!empty($_POST)) {
    foreach ($_POST as $key => $valeur) {
        if (!empty($valeur)) {
            $compteur++;
        }
        $tableau_args[$key] = $valeur;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test POST</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        td.vide {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>

<form action="" method="POST">
    <label>Nom : <input type="text" name="nom" placeholder="nom"></label><br><br>
    <label>Mot de passe : <input type="password" name="mdp" placeholder="mdp"></label><br><br>
    <input type="submit" value="Envoyer">
</form>

<h2>Arguments reçus</h2>
<table>
    <tr><th>Argument</th><th>Valeur</th></tr>

    <?php
    if (!empty($tableau_args)) {
        foreach ($tableau_args as $key => $valeur) {
            $affichage = !empty($valeur) ? $valeur : "<span class='vide'>vide</span>";
            echo "<tr><td>$key</td><td>$affichage</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'><em>Aucun argument reçu</em></td></tr>";
    }
    ?>
</table>

<p>Nombre d'arguments : <?php echo $compteur; ?></p>

</body>
</html>
