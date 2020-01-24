<?php
    $url= "https://flynn.boolean.careers/exercises/api/array/music"; //Url API
    $json_file = file_get_contents($url); //Prendo dati da API

    $discs_array = json_decode($json_file,true); //Richiamo funzione che fa decode JSON
    if (!empty($_GET) && !empty($_GET['genres'])) { //Se viene cercato un genere..
        $gen_sel = $_GET['genres']; //Prendo genere selezionato
        $discs_genre = []; //Creo array vuoto dove andranno i dischi richiesti

        foreach ($discs_array as $verifica => $value) { //Scorro array dati
            foreach ($value as $key => $disc) { //cerco info dischi
                if (strtolower($disc['genre']) == $gen_sel) { //Se i generi corrispondono..
                    $discs_genre [] = $disc; //Aggiungo disco ad array
                }
            }
        }
        echo json_encode($discs_genre); //Invio dischi
    } else { //Altrimenti..
        $allDiscs = [];
        foreach ($discs_array as $verifica => $value) { //Scorro array dati
            foreach ($value as $key => $disc) { //cerco info dischi
                $allDiscs [] = $disc; //Riempio con tutti i dischi
            }
        }
        echo json_encode($allDiscs); //Invio dischi
    }
?>
