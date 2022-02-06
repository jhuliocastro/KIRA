<?php
namespace Controllers;

class Dashboard extends Controller {
    public function home(){        
        $resultado = $this->clima()["results"];
        $info = [
                "imagem" => $resultado["img_id"],
                "descricao" => $resultado["description"],
                "temperatura_atual" => $resultado["temp"],
                "temperatura_maxima" => $resultado["forecast"][0]["max"],
                "temperatura_minima" => $resultado["forecast"][0]["min"],
                "dia_semana" => $resultado["forecast"][0]["weekday"],
                "data" => $resultado["forecast"][0]["date"]
        ];
        //var_dump($info); 
        parent::render("dashboard", [
            "info" => $info
        ]);     
    }

    private function clima(){
        $chave = '06507f2d';
        $ip = $_SERVER["REMOTE_ADDR"];
        $parametros = [
            'city_name' => 'Carpina'
        ];
        $endpoint = 'weather';

        $url = 'http://api.hgbrasil.com/'.$endpoint.'/?format=json&';
  
        if(is_array($parametros)){
            // Insere a chave nos parametros
            if(!empty($chave)) $parametros = array_merge($parametros, array('key' => $chave));
            
            // Transforma os parametros em URL
            foreach($parametros as $key => $value){
            if(empty($value)) continue;
            $url .= $key.'='.urlencode($value).'&';
            }
            
            // Obtem os dados da API
            $resposta = file_get_contents(substr($url, 0, -1));
            
            return json_decode($resposta, true);
        } else {
            return false;
        }
    }
}