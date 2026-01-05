<?php

// Définition des variables primitives
$boolVar = true;          // boolean
$intVar = 42;             // entier
$strVar = "LaPlateforme"; // chaîne de caractères
$floatVar = 3.14;         // nombre à virgule flottante

// On stocke les variables dans un tableau pour faciliter l'affichage
$variables = [
    'boolVar' => $boolVar,
    'intVar' => $intVar,
    'strVar' => $strVar,
    'floatVar' => $floatVar
];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Job03 - Variables</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Tableau des variables</h2>

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($variables as $name => $value) {
            echo "<tr>";
            echo "<td>" . gettype($value) . "</td>"; // type
            echo "<td>$name</td>";                   // nom
            // Pour les booléens, afficher true/false au lieu de 1 ou rien
            if (is_bool($value)) {
                echo "<td>" . ($value ? 'true' : 'false') . "</td>";
            } else {
                echo "<td>$value</td>";             // valeur
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
