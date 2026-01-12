<?php

function leetspeak($str){

$tab = ["a" => "4", "b" => "13", "c" => "(", "d" => "[)", "e" => "3", "f" => "|=", "g" => "6", "h" => "|-|", 
"i" => "|", "j" => ".]", "k" => "|<", "l" => "1", "m" => "|Y|", "n" => "/V", "o" => "0", "p" => "|>",
 "q" => "0,", "r" => "|2", "s" => "5", "t" => "7", "u" => "[_]", "v" => "V", "w" => " \\v/", "x" => "}{", 
 "y" => "'/", "z" => "2", "A" => "4", "B" => "13", "C" => "(", "D" => "[)", "E" => "3", "F" => "|=",
  "G" => "6", "H" => "|-|", "I" => "|", "J" => ".]", "K" => "|<", "L" => "1", "M" => "|Y|", "N" => "/V",
  "O" => "0", "P" => "|>", "Q" => "0,", "R" => "|2", "S" => "5", "T" => "7", "U" => "[_]", "V" => "V",
   "W" => " \\v/", "X" => "}{", "Y" => "'/", "Z" => "2", "0" => "0", "1" => "1", "2" => "2", "3" => "3", 
   "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "Ä" => "A", "Ö" => "O", 
   "Ü" => "U", "ä" => "A", "ö" => "O", "ü" => "U"];

$result = "";

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];

        if (isset($tab[$char])) {
            $result .= $tab[$char];
        } else {
            $result .= $char;
        }
    }

    return $result;
}

echo "Bonjour le Monde and Hello World ! Joyeux noël 2025 = " . leetspeak ("Bonjour le Monde and Hello World ! Joyeux noël 2025");
// echo "<pre>" . leetspeak ("Bonjour le Monde and Hello World ! Joyeux noel 2025") . "</pre>" ;