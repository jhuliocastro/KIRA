<?php
$this->layout("_view", $this->data);?>

<div class="container-fluid">
    <div id="opcoes-mostrar">
        <div class="opcao" id="luzQuarto">
            <img src="/assets/img/luz.png">
            <span>LUZ QUARTO</span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="MyClockDisplay" class="clock" onload="showTime()"></div> 
        </div>
        <div class="col data">
            <?= $info["dia_semana"] ?>, <?= $info["data"] ?>
        </div>
    </div>
    <div class="row div-info">        
        <div class="col div-temperatura">
            <span><?= $info["temperatura_atual"] ?>°</span>
        </div>
        <div class="col">
            <img class="img float-end" id="imagem-tempo" src="/assets/img/<?= $info["imagem"] ?>.png">
        </div>
    </div>
    <div id="opcoes">
        <div class="opcao1">
            <img src="/assets/img/opcoes.png">
        </div>
    </div>

<!--
    <div class="div-tempo">
        <div class="dias-tempo">
            <img src="/assets/img/<?= $d01["imagem"] ?>.png">
        </div>
        <div class="dias-tempo">
            <img src="/assets/img/<?= $d02["imagem"] ?>.png">
        </div>
        <div class="dias-tempo">
            <img src="/assets/img/<?= $d03["imagem"] ?>.png">
        </div>
        <div class="dias-tempo">
            <img src="/assets/img/<?= $d04["imagem"] ?>.png">
        </div>
        <div class="dias-tempo">
            <img src="/assets/img/<?= $d05["imagem"] ?>.png">
        </div>
        <div class="dias-tempo">
            <img src="/assets/img/<?= $d06["imagem"] ?>.png">
        </div>
        <div class="dias-tempo">
            <img src="/assets/img/<?= $d07["imagem"] ?>.png">
        </div>
    </div>
-->
</div>

<script>
    function showTime() {
 
 // Using Date object to get
 // today's date and time
 var date = new Date();

 // getHOurs() function is used
 // to get hours ones
 var h = date.getHours(); // 0 - 23

 // getMinutes() function is
 // used to get minutes ones
 var m = date.getMinutes(); // 0 - 59

 // getSecond() function is
 // used to get seconds ones
 var s = date.getSeconds(); // 0 - 59

 // To show am or pm
 var session = "AM";

 // Condition to check that if hours
 // reaches to 12 then it again start
 // with 12
 if (h == 0) {
     h = 12;
 }

 // If hour exceeds 12 than it will
 // be subtract from 12 and make
 // session as pm
 if (h > 12) {
     h = h - 12;
     session = "PM";
 }

 h = (h < 10) ? "0" + h : h;
 m = (m < 10) ? "0" + m : m;
 s = (s < 10) ? "0" + s : s;

 var time = h + ":" + m + ":"
         + s + " " + session;

 // Using DOM element to display
 // elements on screen
 document.getElementById("MyClockDisplay")
             .innerText = time;

 document.getElementById("MyClockDisplay")
             .textContent = time;

 // Call the function every second use
 // setInterval() method and set time-interval
 // as 1000ms which is equal to 1s
 setTimeout(showTime, 1000);
}

showTime();

$("#opcoes").click(function(){
    $("#opcoes-mostrar").toggle("slow", function(){

    });
});

$(document).ready(function(){
    $("#opcoes-mostrar").hide();
});

$("#luzQuarto").click(function(){
    $.ajax({
        type: "POST",
        url: "http://localhost/var/www/html/python/sintetizador.py",
        datatype: "html",
        data: { 
            frase: "luz quarto"
        }
    }).done(function( o ) {
        console.log(o);
    });
});

</script>