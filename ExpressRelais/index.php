<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

    <title>Consignes</title>


    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />
    <script src='https://unpkg.com/@turf/turf/turf.min.js'></script>
   
    <script src="js/mapsLanguge.js"></script>


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/consignes.js"></script>
    <script src="js/map.js"></script>
</head>
<body>
    
    <div class="container-form">
        <div class="row mt-5">
            <div class="col-md-5">
                <div id="info-livraison">
                    <div id="card1" class="card">
                        <div class="card-header">
                            infos de livraison
                        </div>
                        <div class="card-body needs-validation">
                                <div class="form-group">
                                    <input type="hidden" id="numeroCasier">
                                </div>
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control" id="code" placeholder="Code">
                                    <div class="invalid-feedback">
                                    </div>
                                  </div>
                                  
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="nom">Nom</label>
                                    <input type="email" class="form-control" id="nom" placeholder="Nom">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" placeholder="Prénom">
                                  </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ville" >Ville de détination</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span onclick="modaleShow()" class="input-group-text pointer" id="inputGroupPrepend"><i class="bi bi-geo-alt-fill icon-map-smull"></i></span>
                                            </div>
                                            <select id="ville" class="form-control">
                                                <option value="" disabled selected>Ville</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="inputCity" >Téléphone</label>
                                      <input type="text" class="form-control" width="100%" id="tel_number">
                                      <input type="hidden" id="telephone">
                                    </div>
                                </div>
                                    

                            <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
                            <script>
                              const phoneInputField = document.querySelector("#tel_number");
                              const phoneInput = window.intlTelInput(phoneInputField, {initialCountry:"MA",utilsScript:"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",});
                              phoneInputField.onchange=function(){document.getElementById("telephone").value=phoneInput.getNumber()}
                            </script>

                                <div class="form-row after-popover-show">
                                    <div class="form-group col-md-6">
                                        <label for="nbrColis">Nombre de colis</label>
                                        <input type="number" min="0" class="form-control" id="nbrColis">
                                      </div>
                                    <div class="form-group col-md-6">
                                      <label for="poids">Poids (Kg)</label>
                                      <input type="number" min="0" class="form-control" id="poids">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tailleColis">Taille de colis</label>
                                    <select id="tailleColis" class="form-control">
                                      <option value="" disabled selected>Choisir la taille de colis</option>
                                      <option value="S">S</option>
                                      <option value="M">M</option>
                                      <option value="L">L</option>
                                      <option value="XL">XL</option>
                                      <option value="XXL">XXL</option>
                                    </select>
                                  </div>

                        </div>
                      </div>
                </div>
            </div>

            <div class="col-md-7">
                <div id="card2" class="card">
                    <div id="titre-list-consignes" class="card-header">
                        List de consignes
                    </div>
                        <ul id="consignes-list">
                            
                        </ul>
                    </div>
                  </div>
            </div>

            <div id="map-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div id="modal-map-container" class="modal-content"  data-toggle="tooltip" title="clicker sur une Marker">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        <div id="map"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-4 ml-auto mr-auto">
                <button onclick="submit()" class="btn btn-danger rounded-btn btn-block mb-5">Valider la demande</button>
            </div>
        </div>
    </div>

    <script>
    //get 
    var dataVilles = new FormData();
     dataVilles.append("villes" , "villes");
     $.ajax({
         url:"consignes.php",
         type:"post",
         data:dataVilles,
         cache: false,
         success:function(data){
            var villes=JSON.parse(data)
            chargerListVilles(villes,"ville");
            
         },
         processData: false,
         contentType: false
     })

    var dataConsignes = new FormData();
        dataConsignes.append("consignes" , "consignes");
        $.ajax({
            url:"consignes.php",
            type:"post",
            data:dataConsignes,
            cache: false,
            success:function(data){
                main(JSON.parse(data))
            },
            processData: false,
            contentType: false
        })      
     
        $(window).ready(function(){
            var height=$("#card1").outerHeight();
            $("#card2").height(height)
        });
        $('#ville').change(function(e){
            $(inputGroupPrepend).popover({
                trigger: 'manual',
                container: 'body', 
                html: true,                                                   
                content: '<i class="bi bi-geo-alt-fill"></i><span style="color:blue">click ici pour accéder au map</span>',   
                placement:"bottom",     
            });     
            $(inputGroupPrepend).popover('show');
            $(".after-popover-show").addClass("marg-top")
            choisirVille();
        });

        mapboxgl.accessToken = 'pk.eyJ1Ijoib3Vzc2FtYWFpdGhiaWJpMTk5NyIsImEiOiJja3EyNWh6aWEwOGd5MnZrYTM5ZHB1MTUwIn0.uN6AcQ7cnmIzmZ1kTs7GqA';
        var map = new mapboxgl.Map({
        container: 'map',
        style: 'styleMap/style.json',
        // style: 'mapbox://styles/oussamaaithbibi1997/ckq25pxf721ti17mg0agtyldh',
        center: [ -7, 33],
            zoom:  6
        });

        mapboxgl.setRTLTextPlugin('https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js');
        map.addControl(new MapboxLanguage({
            defaultLanguage: 'mul'
        }));

        var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        placeholder: 'Chercher votre secteur', // Placeholder text for the search bar
        bbox: [-17, 21.40, -1.01076605166308, 35.9957864], // Boundary for Berkeley
        });
        map.addControl(geocoder,'top-left')


        var geocoder1 = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            bbox: [-17, 21.40, -1.01076605166308, 35.9957864],

        });
        map.addControl(geocoder1)
        // document.getElementById('geocoder').appendChild(geocoder1.onAdd(map));
        geocoder1.container.hidden=true

        var geocoder2 = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl,
            bbox: [-17, 21.40, -1.01076605166308, 35.9957864],

        });
        map.addControl(geocoder2)
        // document.getElementById('geocoder').appendChild(geocoder2.onAdd(map));
        geocoder2.container.hidden=true

        var marker1 = document.createElement('div');
            marker1.className = 'marker3';
    var markerConsigneEnService = new mapboxgl.Marker(marker1)

    var marker2 = document.createElement('div');
            marker2.className = 'marker4';
    var markerConsigneHorsService = new mapboxgl.Marker(marker2)

    var listLocalisation=[];


        function main(localisation){

        for(var i=0 ; i < localisation.length ; i++){
            listLocalisation.push({"num_serie_consigne":localisation[i].num_serie_consigne,"ville_affectation": localisation[i].ville_affectation,"adresse": localisation[i].adresse,"gps_longitude": localisation[i].gps_longitude,"gps_latitude": localisation[i].gps_latitude,"etat": localisation[i].etat,"distance":null})
        }

        villes();
        listConsigne(listLocalisation,"");

        geocoder.on("result",function(result){
            var position=result.result.text
        // calcule la distance entre chaque consigne et l'adresse
        distanceBetween(listLocalisation,result.result.center);
        // trier les consigne (la distance)
        listLocalisation.sort(function(a, b) { return parseFloat(a.distance) - parseFloat(b.distance);});
        emptyListConsigne();
        listConsigne(listLocalisation,position);
    })
        // Les markers dans Maps
        marker(listLocalisation);
}

    </script>
</body>
</html>