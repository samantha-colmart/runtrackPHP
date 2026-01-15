<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

    $req = $pdo->prepare("SELECT * FROM etudiants WHERE TIMESTAMPDIFF(YEAR, naissance, CURDATE()) < 18");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $mineurs = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Étudiants de moins de 18 ans</title>
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

<h2>Étudiants de moins de 18 ans</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($mineurs)) {
                foreach (array_keys($mineurs[0]) as $champ) {
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
        foreach ($mineurs as $etudiant) {
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
