$(document).ready(function() {

    //Richiamo handlebars installato con npm
    const Handlebars = require("handlebars");
    //Preparo template Handlebars
    var source = $("#disc-template").html();
    //Preparo template con funzione
    var template = Handlebars.compile(source);

    getDiscs(); //Richiamo funzione che prende i dati e crea le cards

    $('#gen-sel').change(function() { //Al cambio del genere
        var selected = $(this).val(); //Prendo il valore scelto dll'utente nella select
        console.log(selected);
        $(".cds-container").empty(); //Svuoto precedenti risultati
        getDiscsForGenres(selected); //Richiamo funzione che prende i dati e crea le cards in base ai generi
    });


    //FUNZIONI
    function getDiscs() { //Funzione che crea tutte le cards
        $.ajax ({
            'url' : 'dischi.php',
            'method' : 'GET',
            'success' : function(data) {
             var discsData = JSON.parse(data); //Prendo dati ricevuti e faccio parse JSON
             printDisc(discsData); //Richiamo funzione che stampa dischi
             printSelect(discsData); //Richiamo funzione che stampa select
            },
            'error' : function() {
                alert("Errore");
            }
        });
    }

    function getDiscsForGenres(sel) {
        $.ajax ({
            'url' : 'dischi.php',
            'data' : {
                'genres' : sel
            },
            'method' : 'GET',
            'success' : function(data) {
                var discsData = JSON.parse(data); //Prendo dati ricevuti e faccio parse JSON
                printDisc(discsData); //Richiamo funzione che stampa dischi
            },
            'error' : function() {
                alert("Errore");
            }
        });
    }

    function printDisc(discs) { //funzione che stampa dischi
        for (var i = 0; i < discs.length; i++) { //For per scorrere tutti i dischi
                var printTemplate = { //Oggetto per prendere variabili Handlebars
                    sImg : discs[i].poster, //Immagine canzone
                    sTitle : discs[i].title, //Titolo canzone
                    sAuthor : discs[i].author, //Autore canzone
                    sGen :  discs[i].genre.toLowerCase(), //Genere canzone
                    sYear : discs[i].year //Anno canzone
                }
                var printHtml = template(printTemplate); //Metto in una variabile il template creato con la funzione handlebars
                $(".cds-container").append(printHtml); //Appendo template nel container delle canzoni
            }
    }

    function printSelect(discs) { //Funzione che stampa select
        var genrs = []; //Creo array
        for (var i = 0; i < discs.length; i++) { //For per scorrere tutti i dischi
            var getGen = discs[i].genre.toLowerCase(); //Genere canzone
            if (!genrs.includes(getGen)) { //Se non è già incluso
                genrs.push(getGen); //Inserisco nell'array
            }
        }

        for (var i = 0; i < genrs.length; i++) {
            $("#gen-sel").append('<option value="'+ genrs[i] +'">'+ genrs[i] +'</option>'); //Stampo in html
        }
    }
});
