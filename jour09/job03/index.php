<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

    $req = $pdo->prepare("SELECT prenom, nom, naissance FROM etudiants WHERE sexe = 'Femme'");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $etudiantes = $req->fetchAll();
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Étudiantes</title>
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

<h2>Étudiantes</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($etudiantes)) {
                foreach (array_keys($etudiantes[0]) as $champ) {
                    echo "<th>$champ</th>";
                }
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($etudiantes as $etudiante) {
            echo "<tr>";
            foreach ($etudiante as $valeur) {
                echo "<td>$valeur</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
