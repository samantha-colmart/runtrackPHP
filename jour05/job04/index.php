<?php

function calcule($a, $operation, $b) {
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        case '/':
            if ($b == 0) {
                return "Erreur : division par zéro";
            }
            return $a / $b;
        case '%':
            if ($b == 0) {
                return "Erreur : modulo par zéro";
            }
            return $a % $b;
        default:
            return "Erreur : opération non valide";
    }
}

echo calcule(10, '+', 5) . "<br>";
echo calcule(10, '-', 4) . "<br>";
echo calcule(30, '*', 2) . "<br>";
echo calcule(10, '/', 2) . "<br>";
echo calcule(10, '%', 3) . "<br>";
echo calcule(10, '/', 0) . "<br>";
echo calcule(10, '%', 0) . "<br>";
echo calcule(10, '=', 3) . "<br>";