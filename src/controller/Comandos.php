<?php
namespace Controllers;

use Controllers\Status;
use Alertas\Alert;
use PiPHP\GPIO\GPIO;
use PiPHP\GPIO\Pin\PinInterface;

class Comandos{
    public function luzQuarto(){
        $status = new Status();
        $retorno = $status->statusLuzQuarto1();
        if($retorno == "0"){
            $gpio = new GPIO();
            $pin = $gpio->getOutputPin(3);
            $pin->setValue("1");
            $this->gravarArquivo("/var/www/html/db/statusLuzQuarto.yali", "1");
            Alert::success("Luz Desligada!", "Quarto", "/");
        }else if($retorno == "1"){
            $gpio = new GPIO();
            $pin = $gpio->getOutputPin(3);
            $pin->setValue("0");
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