<?php
@include 'dischi.php';
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
                foreach ($discs_array as $verifica => $value) {
                    foreach ($value as $key => $disc) {
                        foreach ($disc as $disc_infos) {

                ?>
                <pre>
                    <?php var_dump($disc_infos) ?>
                </pre>
                <div class="card">
                    <img class="song-img" src="<?php $disc_infos["poster"] ?>" alt="copertina canzone">
                    <p class="song-title"><?php $disc_infos["title"] ?></p>
                    <small class="author"><?php $disc_infos["author"] ?></small>
                    <small class="year"><?php $disc_infos["year"] ?></small>
                </div>
                <?php
                        }

                    }
                }
             ?>
            </div>
        </main>
    </body>
</html>
