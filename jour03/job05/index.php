<?php
$str = "On n est pas le meilleur quand on le croit mais quand on le sait";

$dic = [
    "voyelles" => 0,
    "consonnes" => 0
];

$voyelles = "aeiouyAEIOUY";

for ($i = 0; isset($str[$i]); $i++) {
    $caractere = $str[$i];

    if (ctype_alpha($caractere)) {
        if (strpos($voyelles, $caractere) !== false) {
            $dic["voyelles"]++;
        } else {
            $dic["consonnes"]++;
        }
    }
}
?>

<table border="1">
    <thead>
        <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $dic["voyelles"]; ?></td>
            <td><?php echo $dic["consonnes"]; ?></td>
        </tr>
    </tbody>
</table>