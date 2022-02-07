<?php
namespace Controllers;

class Python{
    public function sintetizador(){
        $texto = $_POST["frase"];
        $caminho = __DIR__."/../../python/sintetizador.py";
        $run = shell_exec("python /var/www/html/python/sintetizador.py");
        echo $run;
    }
}