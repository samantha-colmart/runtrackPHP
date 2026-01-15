<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

    $req = $pdo -> prepare("SELECT * FROM etudiants");
    $req -> execute();
    $req -> setFetchMode (PDO::FETCH_ASSOC);

    $etudiants = $req->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
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

<h2>Liste des étudiants</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($etudiants)) {
                foreach (array_keys($etudiants[0]) as $champ) {
                    echo "<th>$champ</th>";
                }
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
