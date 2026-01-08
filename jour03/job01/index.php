<?php
$tableau = [200, 204, 173, 98, 171, 404, 459];

foreach ($tableau as $x) {
    if ($x % 2 == 0) {
        echo $x . " est paire<br />";
    } else {
        echo $x . " est impaire<br />";
    }
}