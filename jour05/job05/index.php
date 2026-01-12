<?php

// avec strlen

function occurrences($str, $char) {
    $count = 0;

    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === $char) {
            $count++;
        }
    }

    return $count;
}

echo "Dans Bonjour la lettre O apparait : " . occurrences("Bonjour", "o") . " fois <br>";

// avec isset

function occurrences2($str, $char) {
    $count = 0;

    for ($i = 0; isset($str[$i]); $i++) {
        if ($str[$i] === $char) {
            $count++;
        }
    }

    return $count;
}

echo "Dans Bonjour la lettre O apparait : " . occurrences2("Bonjour", "o") . "fois";