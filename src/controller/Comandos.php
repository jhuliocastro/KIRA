<?php
namespace Controllers;

use Controllers\Status;
use Alertas\Alert;
use Controllers\Python;

class Comandos{
    public function luzQuarto(){
        $python = new Python();
        $status = new Status();
        $retorno = $status->statusLuzQuarto1();
        if($retorno == "0"){
            $python->luzQuartoDesliga();
            $this->gravarArquivo("/var/www/html/db/statusLuzQuarto.yali", "1");
            Alert::success("Luz Desligada!", "Quarto", "/");
        }else if($retorno == "1"){
            $python->luzQuartoLiga();
            $this->gravarArquivo("/var/www/html/db/statusLuzQuarto.yali", "0");
            Alert::success("Luz Ligada!", "Quarto", "/");
        }
    }

    public function gravarArquivo($arquivo, $codigo){
        $fp = fopen($arquivo, "w+");
        fwrite($fp, $codigo);
        fclose($fp);
    }
}