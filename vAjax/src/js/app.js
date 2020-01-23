$(document).ready(function() {

    //Richiamo handlebars installato con npm
    const Handlebars = require("handlebars");
    //Preparo template Handlebars
    var source = $("#disc-template").html();
    //Preparo template con funzione
    var template = Handlebars.compile(source);

    getDiscs(); //Richiamo funzione che prende i dati e crea le cards


    //FUNZIONI
    function getDiscs() {
        $.ajax ({
            'url' : 'dischi.php',
            'method' : 'GET',
            'success' : function(data) {
                var discsData = JSON.parse(data); //Prendo dati ricevuti e faccio parse JSON
                 var disc = discsData.response; //Prendo contenuto API e metto in una variabile
                 console.log(disc);
                 for (var i = 0; i < disc.length; i++) { //For per scorrere tutti i dischi
                    var printTemplate = { //Oggetto per prendere variabili Handlebars
                        sImg : disc[i].poster, //Immagine canzone
                        sTitle : disc[i].title, //Titolo canzone
                        sAuthor : disc[i].author, //Autore canzone
                        sGen :  disc[i].genre.toLowerCase(), //Genere canzone
                        sYear : disc[i].year //Anno canzone
                    };

                    var printHtml = template(printTemplate); //Metto in una variabile il template creato con la funzione handlebars
                    $(".cds-container").append(printHtml); //Appendo template nel container delle canzoni
                }
            },
            'error' : function() {
                alert("Errore");
            }
        });
    }
});
