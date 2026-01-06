<?php

for ($i = 2 ; $i < 1001 ; $i++){
    for ($k = 2 ; $k < $i ; $k++){
        if ($i % $k == 0){
            $i++;
            $k = 2;
        }
    }
    if ($i < 1000){
        echo $i."<br>";
    }
}