<?php

function bonjour($jour) {
    if ($jour){
        return "Bonjour";
    }
    else{
        return "Bonsoir";
    }
}

echo bonjour(true);