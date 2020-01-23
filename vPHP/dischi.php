<?php
function decodeJSON($url) {
    $json_file = file_get_contents($url); //Prendo dati da API

    $decoded_json = json_decode($json_file,true); //Trasformo dati JSON in Array
    return $decoded_json;
}
?>
