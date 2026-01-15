<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

    $req = $pdo->prepare("SELECT COUNT(*) AS nb_etudiants FROM etudiants");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $nbEtudiants = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nombre total d'étudiants</title>
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

<h2>Nombre total d'étudiants</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($nbEtudiants)) {
                foreach (array_keys($nbEtudiants[0]) as $champ) {
                    echo "<th>$champ</th>";
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($nbEtudiants as $ligne) {
            echo "<tr>";
            foreach ($ligne as $valeur) {
                echo "<td>$valeur</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
