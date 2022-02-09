<?php
namespace Controllers;

class Status{
    public function statusLuzQuarto(){
        $arquivo = "/var/www/html/db/statusLuzQuarto.yali";
        $status = file_get_contents($arquivo);
        echo $status;
    }

    public function statusLuzQuarto1(){
        $arquivo = "/var/www/html/db/statusLuzQuarto.yali";
        $status = file_get_contents($arquivo);
        return $status;
    }
}