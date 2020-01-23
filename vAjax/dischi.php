<?php
    $url= "https://flynn.boolean.careers/exercises/api/array/music"; //Url API
    $json_file = file_get_contents($url); //Prendo dati da API

    echo $json_file; //Invio dati a chiamata ajax
?>
