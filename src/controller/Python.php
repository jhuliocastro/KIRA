<?php
namespace Controllers;

class Python{
    public function sintetizador(){
        $run = shell_exec("python3 /var/www/html/python/sintetizador.py");
        echo $run;
    }

    public function luzQuartoDesliga(){
        $run = shell_exec("python3 /var/www/html/python/desligaLuzQuarto.py");
        echo $run;
    }
}