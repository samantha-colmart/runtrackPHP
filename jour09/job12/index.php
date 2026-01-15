<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8","root","");

$req = $pdo->prepare("SELECT prenom, nom, naissance FROM etudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31'");
$req->execute();
$req->setFetchMode(PDO::FETCH_ASSOC);

$etudiants = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Étudiants nés entre 1998 et 2018</title>
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

<h2>Étudiants nés entre 1998 et 2018</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($etudiants)) {
                foreach (array_keys($etudiants[0]) as $champ) {
                    echo "<th>$champ</th>";
                }
            } else {
                echo "<th>Aucun étudiant trouvé</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($etudiants as $etudiant) {
            echo "<tr>";
            foreach ($etudiant as $valeur) {
                echo "<td>$valeur</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
