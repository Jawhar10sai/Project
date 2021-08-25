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
          center: [-7, 33],
          zoom: 10,
        });
        for (var i = 0; i < consigne.length; i++) {
          var marker1 = document.createElement('div');
          if (consigne[i].etat == "En Service")
            marker1.className = 'marker1';
          else
            marker1.className = 'marker2';

          var markerConsigneEnService = new mapboxgl.Marker(marker1)
            .setLngLat([parseFloat(consigne[i].gps_latitude), parseFloat(consigne[i].gps_longitude)])
            .addTo(map);
        }
      }
    });
  }

  function OpenMap(position) {
    var map = new mapboxgl.Map({
      container: 'map',
      //style: 'assets/styleMap/style.json',
      style: 'mapbox://styles/oussamaaithbibi1997/ckq25pxf721ti17mg0agtyldh',
      //center: position,
      //[position.gps_longitude, position.gps_latitude],
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
    var marker1 = document.createElement('div');
    marker1.className = 'marker3';
    var markerConsigneEnService = new mapboxgl.Marker(marker1)
      .setLngLat(position)
      .addTo(map);
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
        //OpenMap([consigne.gps_longitude, consigne.gps_latitude]);
        console.log(consigne);
        $('#vilecons').html(consigne.num_serie_consigne);

        /* $("#map-modal").modal("show");
         setTimeout(function() {
           map.resize()
         }, 200);*/
        /*
        if (consigne.etat === "En Service") {
          var popupEnService = new mapboxgl.Popup({
            offset: 25
          }).setHTML("<h6>" + consigne.ville_affectation + "</h6><p>" + consigne.adresse + "</p><button class='btn btn-consigne' onclick='inputCheck(" + consigne.num_serie_consigne + ")' data-dismiss='modal'>Choisir cette consigne</button>");
          markerConsigneEnService.setLngLat([consigne.gps_latitude, consigne.gps_longitude]).setPopup(popupEnService).addTo(map);
          $(".marker3").addClass("marker3-animation");
        }

        if (consigne.etat === "Hors Service") {
          markerConsigne.setLngLat([consigne.gps_latitude, consigne.gps_longitude]).addTo(map);
          var popupHorsService = new mapboxgl.Popup({
            offset: 25
          }).setHTML("<h6>" + consigne.ville_affectation + "</h6><p>" + consigne.adresse + "</p>");
          markerConsigneHorsService.setLngLat([consigne.gps_latitude, consigne.gps_longitude]).setPopup(popupHorsService).addTo(map);

        }
        */
      }
    })
  }