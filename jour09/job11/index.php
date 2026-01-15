<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=jour08;charset=utf8","root","");

    $req = $pdo->prepare("SELECT AVG(capacite) AS capacite_moyenne FROM salles");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $capaciteMoyenne = $req->fetchAll();
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Capacité moyenne des salles</title>
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

<h2>Capacité moyenne des salles</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($capaciteMoyenne)) {
                foreach (array_keys($capaciteMoyenne[0]) as $champ) {
                    echo "<th>$champ</th>";
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($capaciteMoyenne as $ligne) {
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
