function consigneVilleMap() {
    $("#map-modal").modal("show");
    $.ajax({
      url: "gestion/getConsigne.php",
      type: "POST",
      data: {
        consigne_ville: $("#ville").val()
      },
      success: function(res) {
        consigne = JSON.parse(res);
        var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/oussamaaithbibi1997/ckq25pxf721ti17mg0agtyldh'
        });
        map.flyTo({
          center: [-7.60, 33.50],
          zoom: 10,
        });
        for (var i = 0; i < consigne.length; i++) {
          var marker1 = document.createElement('div');
          var html = '';
          if (consigne[i].etat == "En Service"){
            marker1.className = 'marker1';
            html = "<h6>Consigne :" + consigne[i].num_serie_consigne + "</h6><p>" + consigne[i].adresse + "</p><button class='btn btn-consigne' onclick='ChooseConsigne("+consigne[i].num_serie_consigne+")' data-dismiss='modal'>Choisir cette consigne</button>";
          }
          else{
            marker1.className = 'marker2';
           html = "<h6>Consigne :" + consigne[i].num_serie_consigne + "</h6><p>" + consigne[i].adresse + "</p>";
          }
          var popupEnService = new mapboxgl.Popup({
            offset: 25
          })
          .setHTML(html);
          var markerConsigneEnService = new mapboxgl.Marker(marker1);
          markerConsigneEnService
            .setLngLat([parseFloat(consigne[i].gps_latitude), parseFloat(consigne[i].gps_longitude)])
            .setPopup(popupEnService)
            .addTo(map);
    }
      }
    });
  }

function ChooseConsigne(id){
    //$("#map-modal").modal("toggle");
    $("#cons-"+id).prop("checked",true);
}

  function OpenMap(position) {
    var map = new mapboxgl.Map({
      container: 'map',
      //style: 'assets/styleMap/style.json',
      style: 'mapbox://styles/oussamaaithbibi1997/ckq25pxf721ti17mg0agtyldh',
      //center: position,
      //zoom: 10
    });
    map.flyTo({
      center: position,
      zoom: 10,
      // ,speed: 0.2
    });
    /*
    mapboxgl.setRTLTextPlugin('https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js');
    map.addControl(new MapboxLanguage({
      defaultLanguage: 'mul'
    }));*/
    var popupEnService = new mapboxgl.Popup({
        offset: 25
      })
      .setHTML("<h6>Consigne: " + consigne.num_serie_consigne + "</h6><p>" + consigne.adresse + "</p><button class='btn btn-consigne' onclick='ChooseConsigne("+consigne.num_serie_consigne+")' data-dismiss='modal'>Choisir cette consigne</button>");
    var marker1 = document.createElement('div');
    marker1.className = 'marker3';
    var markerConsigneEnService = new mapboxgl.Marker(marker1);

    if (consigne.etat == "En Service"){
        marker1.className = 'marker1';
        html = "<h6>Consigne :" + consigne.num_serie_consigne + "</h6><p>" + consigne.adresse + "</p><button class='btn btn-consigne' onclick='ChooseConsigne("+consigne.num_serie_consigne+")' data-dismiss='modal'>Choisir cette consigne</button>";
      }
      else{
        marker1.className = 'marker2';
       html = "<h6>Consigne :" + consigne.num_serie_consigne + "</h6><p>" + consigne.adresse + "</p>";
      }
      var popupEnService = new mapboxgl.Popup({
        offset: 25
      })
      .setHTML(html);
      var markerConsigneEnService = new mapboxgl.Marker(marker1);
    markerConsigneEnService
      .setLngLat(position)
      .setPopup(popupEnService)
      .addTo(map);
      /******************************************* */      
  }
  mapboxgl.accessToken = 'pk.eyJ1Ijoib3Vzc2FtYWFpdGhiaWJpMTk5NyIsImEiOiJja3EyNWh6aWEwOGd5MnZrYTM5ZHB1MTUwIn0.uN6AcQ7cnmIzmZ1kTs7GqA';

  function consigneMap(id) {
    $("#map-modal").modal("show");
    $.ajax({
      url: "gestion/getConsigne.php",
      type: "POST",
      data: {
        id_cons: id
      },
      success: function(res) {
        consigne = JSON.parse(res);
        OpenMap([parseFloat(consigne.gps_latitude), parseFloat(consigne.gps_longitude)]);
        $('#vilecons').html(consigne.num_serie_consigne);
      }
    })
  }