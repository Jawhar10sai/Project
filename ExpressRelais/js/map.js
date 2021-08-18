function submit(){

    var v1  = Valider("numeroCasier",/^[0-9]+$/,"Choisissez une consigne");
    var v2  = Valider("code",/^[\w\W]+$/,"Sisai le code");
    var v3  = Valider("nom",/^[\w\W]+$/,"Sisai votre nom");
    var v4  = Valider("prenom",/^[\w\W]+$/,"Sisai votre prénom");
    var v5  = Valider("ville",/^[\w\W]+$/,"choisai la ville d'expédition de votre colis");
    var v6  = Valider2("telephone","tel_number",/^[\w\W]+$/,"Sisai voter numero de téléphone");
    var v7  = Valider("poids",/^[0-9]+$/,"sisai le poids de votre colis");
    var v8  = Valider("nbrColis",/^[0-9]+$/,"Sisai le nombre de colis");
    var v9  = Valider("tailleColis",/^[\w\W]+$/,"Choisissez la taille de consigne") ;

    if( v1 && v2 && v3 && v4 && v5 && v6 && v7 && v8 && v9 ){

        var numeroCasier = document.getElementById("numeroCasier").value;
        var code = document.getElementById("code").value;
        var nom = document.getElementById("nom").value;
        var prenom = document.getElementById("prenom").value;
        var ville = document.getElementById("ville").value;
        var telephone = document.getElementById("telephone").value;
        var nbrColis = document.getElementById("nbrColis").value;
        var poids = document.getElementById("poids").value;
        var tailleColis = document.getElementById("tailleColis").value;

        var data = new FormData();
            data.append("numeroCasier" , numeroCasier);
            data.append("code" , code );
            data.append("nom" , nom );
            data.append("prenom" , prenom );
            data.append("ville" , ville );
            data.append("telephone" , telephone );
            data.append("nbrColis" , nbrColis );
            data.append("poids" , poids );
            data.append("tailleColis" , tailleColis );

            $.ajax({
                url:"consignes.php",
                type:"post",
                data:data,
                cache: false,
                success:function(data){
                    Swal.fire({
                        icon: 'success',
                        title: data,
                        text: 'Voter colis ....',
                        footer: ''
                    })
                },
                processData: false,
                contentType: false
            })
    }
}

// get villes from DB by ajax
function villes(){ 
    var villes=""
    var data = new FormData();
     data.append("villes" , "villes");
     $.ajax({
         url:"consignes.php",
         type:"post",
         data:data,
         cache: false,
         success:function(data){
            villes=data;
         },
         processData: false,
         contentType: false
     })
     return villes;
 }

function Valider(id,regx,feedback){
    if(regx.test(document.getElementById(id).value)){
        document.getElementById(id).style.borderColor='';
        $("#"+id+"-feedback").remove();
        return true;
    }
    else{
        document.getElementById(id).style.borderColor='red';
        $("#"+id+"-feedback").remove();
        $("#"+id).parent().append("<div id='"+id+"-feedback' style='color:red; font-size:10px;'>"+feedback+"</div>");
        return false;
    }
}

function Valider2(id,id2,regx,feedback){
    if(regx.test(document.getElementById(id).value)){
        document.getElementById(id2).style.borderColor='';
        $("#"+id+"-feedback").remove();
        return true;
    }
    else{
        document.getElementById(id2).style.borderColor='red';
        $("#"+id+"-feedback").remove();
        $("#"+id).parent().append("<div id='"+id+"-feedback' style='color:red; font-size:10px;'>"+feedback+"</div>");
        return false;
    }
}

function inputCheck(id){
    var index = listLocalisation.findIndex(x => x.num_serie_consigne==id)
    array_move(listLocalisation,index,0);
    emptyListConsigne()
    // listConsigne(listLocalisation,"")
    afficheConsigne(listLocalisation,0,"")
    document.getElementById(id).checked=true
    sessionStorage.scrollPos = $("#consignes-list").scrollTop(0);
    setRadioValue(id)
    $(".mapboxgl-popup").remove();
    $("#map-modal").modal("hide");
}
function array_move(arr, old_index, new_index) {
    if (new_index >= arr.length) {
        var k = new_index - arr.length + 1;
        while (k--) {
            arr.push(undefined);
        }
    }
    arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
    return arr; // for testing
};

function setRadioValue(id){
    document.getElementById("numeroCasier").value=id;
    
    var index = listLocalisation.findIndex(x=> x.num_serie_consigne==id);
    emptyListConsigne()
    afficheConsigne(listLocalisation,parseInt(index),"")
    var check = document.getElementById("numeroCasier").value;
    document.getElementById(check).checked=true;

}

function choisirVille(){
    
    var ville = document.getElementById("ville").value;
    var listVilles = consignesVille(ville)
    emptyListConsigne()
    if(listVilles===null){
        aucunConsigne()
    }
    else{
        listConsigne(listVilles,"")
    }  
    document.getElementById("titre-list-consignes").innerHTML="Les consignes de "+ville;
}

function villeZone(){
    var ville =document.getElementById("ville").value;
    geocoder1.setInput(ville);
    geocoder1.on("results",function(results){
        map.fitBounds([
            [results.features[0].bbox[0],results.features[0].bbox[1]], 
            [results.features[0].bbox[2],results.features[0].bbox[3]] 
            ]);
            geocoder.setBbox([results.features[0].bbox[0],results.features[0].bbox[1],results.features[0].bbox[2],results.features[0].bbox[3]])
    })
}

function consignesVille(ville){
    var listConsignesVille= listLocalisation.filter(x => x.ville_affectation.toLowerCase()===ville.toLowerCase());
    if(listConsignesVille.length==0){
        return null
    }
    else{
        return listConsignesVille;
    }
    
}

function resize(){
    map.resize()
}

function modaleShow(){

    $("#map-modal").modal("show")
    villeZone();
    setTimeout(function(){map.resize()},200);
    
    markerConsigneHorsService.remove();
    markerConsigneEnService.remove();

}

function consigneMap(id){
    $("#map-modal").modal("show");
    setTimeout(function(){map.resize()},200);
    
    var index = listLocalisation.findIndex(x=> x.num_serie_consigne==id);
    var consigne = listLocalisation[index];
    if(consigne.etat==="En Service"){
        var popupEnService = new mapboxgl.Popup({ offset: 25 }).setHTML("<h6>"+consigne.ville_affectation+"</h6><p>"+consigne.adresse+"</p><button class='btn btn-consigne' onclick='inputCheck("+consigne.num_serie_consigne+")' data-dismiss='modal'>Choisir cette consigne</button>");
        markerConsigneEnService.setLngLat([consigne.gps_latitude, consigne.gps_longitude]).setPopup(popupEnService).addTo(map);
        $(".marker3").addClass("marker3-animation");
    }
    
    if(consigne.etat==="Hors Service"){
        markerConsigne.setLngLat([consigne.gps_latitude, consigne.gps_longitude]).addTo(map);
        var popupHorsService = new mapboxgl.Popup({ offset: 25 }).setHTML("<h6>"+consigne.ville_affectation+"</h6><p>"+consigne.adresse+"</p>");
        markerConsigneHorsService.setLngLat([consigne.gps_latitude, consigne.gps_longitude]).setPopup(popupHorsService).addTo(map);
    
    }

    map.flyTo({
        center: [consigne.gps_latitude, consigne.gps_longitude],
        zoom: 15,
        // ,speed: 0.2
        });
}

function retour(){
    emptyListConsigne();
    var check = document.getElementById("numeroCasier").value;
    var ville = document.getElementById("ville").value
    if(ville!=""){
        var listVilles = consignesVille(ville)
        if(listVilles===null){
            aucunConsigne()
            alert("")
        }
        else{
            listConsigne(listVilles,"")
            document.getElementById(check).checked=true;
        }  
    }
    else{
        listConsigne(listLocalisation,"")
        document.getElementById(check).checked=true;
    }
}


function chargerListVilles(list,id){
        for(var i=0 ; i < list.length ; i++){
        $("#"+id).append("<option value='"+list[i].ville+"'>"+list[i].ville+"</option>");
    }
}

function distances(de,a){
var distance = (turf.distance(de,a,[units='kilometers']))
distance=distance.toFixed(2);
return distance;
}


function distanceBetween(listLocation,location) {

for(var i=0 ; i < listLocation.length ; i++){
    var a = [listLocation[i].gps_latitude,listLocation[i].gps_longitude]
listLocation[i].distance=distances(location,a)
}
}

function afficheConsigne(listLocation,index,position){
    var distance="";
    if(listLocation[index].distance!==null){distance="<li class='distance-concigne'>Distance entre "+position+" et cette consigne: "+listLocation[index].distance +"km</li>"}
    var list = $("#consignes-list");
    list.append("<li class='consigne consigne-en-service'>"+
                    "<div class='row'>"+
                        "<div class='col-2 radio-cont'>"+
                            "<label class='radio-input'>"+
                                "<input onchange='setRadioValue("+listLocation[index].num_serie_consigne+")' type='radio' name='consigne' id='"+listLocation[index].num_serie_consigne+"'>"+
                                "<span class='checkmark'></span>"+
                            "</label>"+
                        "</div>"+
                        "<div class='col-8' p-0>"+
                            "<ul class='list-info'>"+
                                "<li> <h5 class='num-consigne'><strong>Numero de consigne :</strong> "+listLocation[index].num_serie_consigne+"</h5></li>"+
                                "<li class='ville-consigne'>"+listLocation[index].ville_affectation+" </li>"+
                                "<li class='addr'>"+listLocation[index].adresse+"</li>"+
                                distance+
                            "</ul>"+
                        "</div>"+
                        "<div class='col-2 p-0'>"+
                            "<button class='btn btn-map-icon' onclick='consigneMap("+listLocation[index].num_serie_consigne+")'>"+
                                "<i class='bi bi-geo-alt-fill icon-map-enservice'></i>"+
                            "</button>"+
                        "</div>"+
                    "</div>"+
                "</li>")

    list.append("<button onclick='retour()' class='btn-retoure btn btn-secondary'><i class='bi bi-arrow-bar-left'></i> Changer consigne </button>")            
    
}

function aucunConsigne(){
    $("#consignes-list").popover({
        trigger: 'manual',
        container: 'body', 
        html: true,                                                   
        content: "<i class='bi bi-exclamation-triangle'></i> <span style='color:blue;'>Il y-a aucune consigne dans cette ville il faut choisir une autre ville proche</span> <span style='color:blue;'>ou clicker sur <i class='bi bi-geo-alt-fill'></i> pour afficher la map</span>",   
        placement:"bottom",     
    });     
    $("#consignes-list").popover('show');
}

function listConsigne(listLocation,position){

var list = $("#consignes-list");
for(var i=0 ; i < listLocation.length ; i++){
    var distance="";

    if(listLocation[i].distance!==null){distance="<li class='distance-concigne'>Distance entre "+position+" et cette consigne: "+listLocation[i].distance +"km</li>"}

    if(listLocation[i].etat==="En Service"){

        list.append("<li class='consigne consigne-en-service'>"+
                        "<div class='row'>"+
                            "<div class='col-2  radio-cont'>"+
                                "<label class='radio-input'>"+
                                    "<input onchange='setRadioValue("+listLocation[i].num_serie_consigne+")' type='radio' name='consigne' id='"+listLocation[i].num_serie_consigne+"'>"+
                                    "<span class='checkmark'></span>"+
                                "</label>"+
                            "</div>"+
                            "<div class='col-8' p-0>"+
                                "<ul class='list-info'>"+
                                    "<li> <h5 class='num-consigne'><strong>Numero de consigne :</strong> "+listLocation[i].num_serie_consigne+"</h5></li>"+
                                    "<li class='ville-consigne'>"+listLocation[i].ville_affectation+" </li>"+
                                    "<li class='addr'>"+listLocation[i].adresse+"</li>"+
                                    distance+
                                "</ul>"+
                            "</div>"+
                            "<div class='col-2 p-0'>"+
                                "<button class='btn btn-map-icon' onclick='consigneMap("+listLocation[i].num_serie_consigne+")'>"+
                                    "<i class='bi bi-geo-alt-fill icon-map-enservice'></i>"+
                                "</button>"+
                            "</div>"+
                        "</div>"+
                    "</li>")
    }


    if(listLocation[i].etat==="Hors Service"){

        list.append("<li class='consigne consigne-hors-service'>"+
                        "<div class='row'>"+
                            "<div class='col-2 radio-cont'>"+
                                "<label class='radio-input'>"+
                                    "<input onchange='setRadioValue("+listLocation[i].num_serie_consigne+")' type='radio' name='consigne' id='"+listLocation[i].num_serie_consigne+"' disabled>"+
                                    "<span class='checkmark'></span>"+
                                "</label>"+
                            "</div>"+                       
                            "<div class='col-8 p-0'>"+
                                "<ul class='list-info'>"+
                                    "<li> <h5 class='num-consigne'><strong>Numero de consigne :</strong> "+listLocation[i].num_serie_consigne+"</h5></li>"+
                                    "<li class='ville-consigne'>"+listLocation[i].ville_affectation+" </li>"+
                                    "<li class='addr'>"+listLocation[i].adresse+"</li>"+
                                    distance+
                                "</ul>"+
                            "</div>"+
                            "<div class='col-2 p-0'>"+
                                "<button class='btn btn-map-icon' onclick='consigneMap("+listLocation[i].num_serie_consigne+")'>"+
                                    "<i class='bi bi-geo-alt-fill icon-map-horsservice'></i>"+
                                "</button>"+
                            "</div>"+
                        "</div>"+
                    "</li>")
                    }

}

}


function emptyListConsigne(){

var list = $("#consignes-list");
list.empty();
$("#consignes-list").popover('hide');
}

function marker(listLocation){
for (var i = 0; i < listLocation.length; i++) {
        if(listLocation[i].etat==="En Service"){
            var el = document.createElement('div');
            el.className = 'marker1';

            var popup = new mapboxgl.Popup({ offset: 25 }).setHTML("<h6>"+listLocation[i].ville_affectation+"</h6><p>"+listLocation[i].adresse+"</p><button class='btn  btn-consigne' onclick='inputCheck("+listLocation[i].num_serie_consigne+")' data-dismiss='modal'>Choisir cette consigne</button>");
        }
        else{
            var el = document.createElement('div');
            el.className = 'marker2';

        var popup = new mapboxgl.Popup({ offset: 25 }).setHTML("<h6>"+listLocation[i].ville_affectation+"</h6><p>"+listLocation[i].adresse+"</p>");
        }
        var mark = new mapboxgl.Marker(el).setLngLat([ listLocation[i].gps_latitude,listLocation[i].gps_longitude] ).setPopup(popup).addTo(map);
}
}
