<?php

function luzQuarto(){
    $arquivo = "/var/www/html/db/statusLuzQuarto.yali";
    $texto = "0";

    $fp = fopen($arquivo, "w+");
    fwrite($fp, $texto);
    fclose($fp);
}

luzQuarto();