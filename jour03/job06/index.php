<?php
$str = "Les choses que l'on Possède finissent par nous posséder.";
$inverse = "";

for ($i = strlen($str) - 1; $i >= 0; $i--) {
    $inverse .= $str[$i];
}

echo $inverse;