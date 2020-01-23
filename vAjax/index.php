<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Music Selection Php</title>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/app.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="public/main.js" charset="utf-8"></script>
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
            <div class="cds-container"></div>
        </main>

        <script id="disc-template" type="text/x-handlebars-template">
            <div class="card" data-gen="{{sGen}}">
                <img class="song-img" src="{{ sImg }}" alt="copertina canzone">
                <p class="song-title">{{ sTitle }}</p>
                <small class="author">{{ sAuthor }}</small>
                <small class="year">{{ sYear }}</small>
            </div>
        </script>
    </body>
</html>
