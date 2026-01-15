<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

    $req = $pdo->prepare("SELECT * FROM etudiants WHERE prenom LIKE 'T%'");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);

    $etudiantsT = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Étudiants dont le prénom commence par T</title>
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

<h2>Étudiants dont le prénom commence par "T"</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($etudiantsT)) {
                foreach (array_keys($etudiantsT[0]) as $champ) {
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
        foreach ($etudiantsT as $etudiant) {
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
