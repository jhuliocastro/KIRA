<?php
namespace Controllers;

use League\Plates\Engine;

class Controller{

    private $caminhoViews = __DIR__."/../views";

    public function render($view, array $dados = []){
        $template = new Engine($this->caminhoViews);
        echo $template->render($view, $dados);
    }

}