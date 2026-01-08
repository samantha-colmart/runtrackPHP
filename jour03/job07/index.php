<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";

$premier = $str[0];
$longueur = strlen($str);
$nouveauStr = "";

for ($i = 0; $i < $longueur; $i++) {
    if ($i == $longueur - 1) {
        $nouveauStr .= $premier;
    } else {
        $nouveauStr .= $str[$i + 1];
    }
}

echo $nouveauStr;