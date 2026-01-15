<?php
$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8","root","");

$req = $pdo->prepare("SELECT salles.nom AS nom_salle, etage.nom AS nom_etage FROM salles JOIN etage ON salles.id_etage = etage.id");
$req->execute();
$req->setFetchMode(PDO::FETCH_ASSOC);

$sallesEtages = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Salles et étages</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; }
        th { background-color: #ddd; }
    </style>
</head>
<body>

<h2>Nom des salles et de leur étage</h2>

<table>
    <thead>
        <tr>
            <?php
            if (!empty($sallesEtages)) {
                foreach (array_keys($sallesEtages[0]) as $champ) {
                    echo "<th>$champ</th>";
                }
            } else {
                echo "<th>Aucune donnée trouvée</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($sallesEtages as $ligne) {
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
