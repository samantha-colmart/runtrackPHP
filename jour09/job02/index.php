<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

    $req = $pdo->prepare("SELECT nom, capacite FROM salles");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $salles = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des salles</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2>Liste des salles</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($salles)) {
                foreach (array_keys($salles[0]) as $champ) {
                    echo "<th>$champ</th>";
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($salles as $salle) {
            echo "<tr>";
            foreach ($salle as $valeur) {
                echo "<td>$valeur</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
