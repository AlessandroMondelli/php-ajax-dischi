<?php
@include 'dischi.php'; //Includo file con funzione per decodificare file JSON
$url_api = "https://flynn.boolean.careers/exercises/api/array/music"; //Url API
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Music Selection Php</title>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/app.css">
    </head>

    <body>
        <header>
            <div id="logo" class="container">
                <img src="logo.png" alt="logo" />
            </div>
        </header>
        <section>
            <select id="gen-sel" >
                <option value="sel">Seleziona un genere</option>
                <option value="pop">Pop</option>
                <option value="rock">Rock</option>
                <option value="jazz">Jazz</option>
                <option value="metal">Metal</option>
            </select>
        </section>
        <main>
            <div class="cds-container">
            <?php
                $discs_array = decodeJSON($url_api); //Richiamo funzione che fa decode JSON
                foreach ($discs_array as $verifica => $value) { //Scorro array dati
                    foreach ($value as $key => $disc) { //cerco info dischi
                ?>
                <div class="card">
                    <img class="song-img" src="<?php echo $disc["poster"] ?>" alt="copertina canzone">
                    <p class="song-title"><?php echo $disc["title"] ?></p>
                    <small class="author"><?php echo $disc["author"] ?></small>
                    <small class="year"><?php echo $disc["year"] ?></small>
                </div>
                <?php
                    }
                }
             ?>
            </div>
        </main>
    </body>
</html>
