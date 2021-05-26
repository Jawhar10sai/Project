function getlisteville(){
  $('#infovil').on('click',function(){
        $.ajax({
          url:"pages/Villes/ADlistevilles.php",
          success:function(res){
            try {
              $('.vlcontent').html(res);
            } catch (e) {
              $('.vlcontent').empty();
            }
          }
        });
      });
}

function addville(){
  $('#ajo_ville').on('click',function(){
        $.ajax({
          url:"pages/Villes/ajville.php",
          success:function(res){
            try {
              $('.vlcontent').html(res);
            } catch (e) {
              $('.vlcontent').empty();
            }
          }
        });
      });
}

function listeadresse(){
  $('#adressinfos').on('click',function(){
        $.ajax({
          url:"pages/adresses/liste_adresse.php",
          success:function(res){
            try {
              $('.adcontent').html(res);
            } catch (e) {
              //$('.adcontent').empty();
            }
          }
        });
      });
}

function client(){
  $('#clclient').on('click',function(){
        $.ajax({
          url:"pages/users/clients.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientdejacon(){
  $('#dejaco').on('click',function(){
        $.ajax({
          url:"pages/users/clientdejaco.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientsessions(){
  $('#clsession').on('click',function(){
        $.ajax({
          url:"pages/users/sessionss.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientconnexion(){
  $('#clconnexions').on('click',function(){
        $.ajax({
          url:"pages/users/connexions.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientsouclient(){
  $('#clsclient').on('click',function(){
        $.ajax({
          url:"pages/users/sousclient.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientdeclaration(){
  $('#cldeclarations').on('click',function(){
        $.ajax({
          url:"pages/users/declaration.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientinterval(){
  $('#clinterval').on('click',function(){
        $.ajax({
          url:"pages/users/intervaldec.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientarchive() {
  $('#clinarch').on('click',function(){
        $.ajax({
          url:"pages/users/clientarchive.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });
}

function clientsinfos(){
  $('#infoscl').on('click',function(){
        $.ajax({
          url:"pages/users/infosclients.php",
          success:function(res){
            try {
              $('.uscontent').html(res);
            } catch (e) {
              $('.uscontent').empty();
            }
          }
        });
      });

}

function clientsinfosperso(){
        $.ajax({
          url:"pages/users/infosclientsperso.php",
          success:function(res){
            try {
              $('.infocl').html(res);
              $('.infocl').css({"background-color":"#FFFFE0"});
              $("#infoper").css({"background-color":"#FFFFE0	","color":"black"});
                $("#infopro").css({"background-color":"rgba(0,0,0,-0.97)","color":"black"});
            } catch (e) {
              $('.infocl').empty();
            }
          }
        });
}

function clientsinfospro(){
        $.ajax({
          url:"pages/users/infosclientspro.php",
          success:function(res){
            try {
              $('.infocl').html(res);
              $('.infocl').css({"background-color":"#FAFAD2"});
              $("#infopro").css({"background-color":"#FAFAD2	","color":"black"});
              $("#infoper").css({"background-color":"rgba(0,0,0,-0.97)","color":"black"});
            } catch (e) {
              $('.infocl').empty();
            }
          }
        });
}
  $(table).dataTable({
    "language": {
      "lengthMenu": "Affichage _MENU_ pages",
      "zeroRecords": "Pas d'elements",
      "info": "Affichage de _PAGE_ of _PAGES_",
      "infoEmpty": "Pas d'elements",
      "infoFiltered": "(filtered from _MAX_ total records)",
      "search": "Recherche",
      "paginate": {
        "previous": "Précédent",
        "next": "Suivant"
      }
    }
  });