
function ouvre_popup(page) {
      window.open(page,"Condition Géneral","menubar=no, status=no, scrollbars=no, menubar=no, width=500, height=400");
  }
   $(document).ready(function() {
  $("#resultat_num_envoi").dialog({
   autoOpen: false,
   modal: true,
   draggable:false,
   resizable:false,
   open: function(event, ui){
     },
   close: function() {}
 });


  $("#envoi_num").click(function(){
    $("#load_num_envoi").show();
  $.ajax({

    url: "content_webservice.php",
    data : "NUM="+$("#num_envoi").val()

  }).then(function(data) {
    if($(data).find("declaration").text() != ''){
    $("#resultat_num_envoi").html('<strong>DECLARATION : </strong>'+$(data).find("declaration").text()+'<br><strong>STATUT :</strong> '+$(data).find("statut").text()+'<br><strong>DEPUIS le : </strong> '+$(data).find("depuis").text()+'<br><strong>LIEU :</strong> '+$(data).find("lieu").text()+'<br><strong>LIVREUR :</strong> '+$(data).find("livreur").text()+'<br><strong>TEL :</strong>'+$(data).find("tel").text()+'');
    }else{
    $("#resultat_num_envoi").html('Aucun résultat trouvé');
      }


    $("#resultat_num_envoi").dialog('open');
    $("#load_num_envoi").hide();

     });
   });
 });
