function supprimerclient(){
  $('#supprimer').click(function(){
    $('.supmod').modal('show');
  });
}

function pops(){
  window.openDialog(imp.php,'','',500,500);}

  function afficheinfoclient(){
      var iDClient = $('#codecli').val();
      var arrres =false;
      if (iDClient) {
        $.ajax({
          type:'POST',
          url:'client.php',
          data:'idcli='+iDClient,
          success: function(res){
              try {
                $('#nom').val(res[4]['NOM']);
                $('#prenom').val(res[4]['PRENOM']);
                $('#adresse').val(res[2]['lib_adresse']);
                $('#firstval').text(res[0]['VILLE_LIB']);
                $('#firstval').val(res[1]['VILLE_COD']);
                $('#telephone').val(res[4]['telephone']);
                $('#mess').hide();
              }
               catch (e) {
                 $('#mess').show();
                 $('#mess').html("<label class='alert alert-warning' role='alert'>Client inexistant, veuillez-vous remplir les autres champs!</label>");
                 $('#nom').val("");
                 $('#prenom').val("");
                 $('#adresse').val("");
                 $('#firstval').text("");
                 $('#firstval').val("");
                 $('#telephone').val("");
              }
          }
        });
      }else {
        $('#mess').hide();
      }
  }
  function showag(){
    $('#buttag').on('click',function(){
      $('.agdiv').slideToggle('slow');
      $('.maindiv').slideToggle('slow');
    });
  }
  function vildess(){
  $('#buttvil').on('click',function(){
	/*$('.vildes').slideToggle('slow');
	$('.maindiv').slideToggle('slow');*/
  $.ajax({
    url:'villesdess.php',
    method:'get'
  });
  });
  }
    function rechvv(){
      $('#rechcont').toggle('slow');
    }
  /*  function PlaySound(soundObj) {
        var sound = document.getElementById(soundObj);
        sound.Play();
      }*/
function specifier(){
  $("#telephone").keypress(function(e){
    var keyCode = e.which;
    if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
      return false;
    }
  });

    $(".palet").keypress(function(e){
    var keyCode = e.which;
    if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
      return false;
    }
  });

/*$("#poids").on("keypress",  function(){

  function(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = $(this).val();
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;

         }
});*/
       $("#poids").on("keypress", function(evt) {
          var self = $(this);
          self.val(self.val().replace(/[^0-9\.]/g, ''));
          if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
          {
            alert("veuillez-vous saisir des valeurs numériques!");
            $("#poids" ).focus();
            evt.preventDefault();
          }
  /*  /-------------------------------------------------------------------------------------------------------/
        var intRegex = /^\d+$/;
               var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
               var self = $(this);
               self.val(self.val().replace(/[^0-9\.]/g, ''));
               var str = self.val();
               if(intRegex.test(str) || floatRegex.test(str)) {
                   evt.preventDefault();
               }else {
                 alert('veuillez-vous saisir des valeurs numériques!');
               }
*/
        });
		  $(".dim").on("keypress", function(evt) {
     var self = $(this);
     self.val(self.val().replace(/[^0-9\.]/g, ''));
     if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
     {
       evt.preventDefault();
     }
     /*var colisval = $('#colis').val();
     if (self.val()>=(parseInt(colisval)*10000)) {
       evt.preventDefault();
     }*/
   });
  $("#valeur").on("keypress", function(evt) {
     var self = $(this);
     self.val(self.val().replace(/[^0-9\.]/g, ''));
     if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
     {
       evt.preventDefault();
     }
     /*var colisval = $('#colis').val();
     if (self.val()>=(parseInt(colisval)*10000)) {
       evt.preventDefault();
     }*/
   })
   .on('keyup',function(e){
     var self = $(this);
     var colisval = $('#colis').val();
     if (self.val()>=(parseInt(colisval)*10000)) {
       alert("la valeur ne doit pas être >"+(parseInt(colisval)*10000));
       self.val('');
       e.preventDefault();
     }
   });
   $("#Espece").on("keypress", function(evt) {
      var self = $(this);
      self.val(self.val().replace(/[^0-9\.]/g, ''));
      if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
      {
        evt.preventDefault();
      }
    });
    $("#Cheque").on("keypress", function(evt) {
       var self = $(this);
       self.val(self.val().replace(/[^0-9\.]/g, ''));
       if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
       {
         evt.preventDefault();
       }
     });
  $("#Traite").on("keypress", function(evt) {
     var self = $(this);
     self.val(self.val().replace(/[^0-9\.]/g, ''));
     if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
     {
       evt.preventDefault();
     }
   });
    //----------------------------------------------------------
/*  $("#name").keypress(function(e){
    var keyCode = e.which;


    48-57 - (0-9)Numbers
    65-90 - (A-Z)
    97-122 - (a-z)
    8 - (backspace)
    32 - (space)

    // Not allow special
    if ( !( (keyCode >= 48 && keyCode <= 57)
      ||(keyCode >= 65 && keyCode <= 90)
      || (keyCode >= 97 && keyCode <= 122) )
      && keyCode != 8 && keyCode != 32) {
      e.preventDefault();
    }
  });*/
}
function afficheaffretement(){
  $('.typ').on('change',function(){
    if ($('#affrtmnt').is(":checked")) {
      /*$.ajax({
        url:'cont.php',
        success:function(cont){
            $('.affret').html(cont);
            $('.mess').hide();
        }
      });*/
      $('.affret').show();
      $('.mess').hide();
    }else {
      $('.affret').hide();
      $('.mess').show();
    }
  });
}

function Nomsuggestions(){
   $('#nom').keyup(function(){
        var nomquer = $(this).val();
        if(nomquer != '')
        {
             $.ajax({
                  url:"nomclient.php",
                  method:"POST",
                  data:{query:nomquer},
                  success:function(res)
                  {
                    try {
                      $('.segg').fadeIn();
                      $('.segg').html(res);
                    } catch (e) {
                      $('.segg').fadeOut();
                    }
                  }
             });
        }else {
          $('.segg').fadeOut();
        }
   });
 }
 function emtyNomsuggestions(){
   $('#prenom').on('focus',function(){
     $('.segg').fadeOut();
   });
 }

 function Agenceetponitsrelais(){
   $('#ville').on('change',function(){
     var idvi = $(this).val();
     $.ajax({
       url:'aagence.php',
       method:'post',
       data:{idvill:idvi},
       success:function(resu){
         obj = JSON.parse(resu);
         if (obj.statut!="non") {
           try {
             $('#Gare').show();
           } catch (e) {
             $('#Gare').hide();
           }
         }else {
           $('#Gare').hide();
         }

         if (obj.apointr!="non") {
           try {
             $('#pointR').show();
             if ($("#Prr").is(":checked")) {
               $('.respr').show();
             }
           } catch (e) {
             $('#pointR').hide();
             $('.respr').hide();
           }
         }else {
           $('#pointR').hide();
           $('.respr').hide();
         }
       }
     });
     $.ajax({
       url:'listepr.php',
       method:'post',
       data:{idvil:idvi},
       success:function(res){
         try {
           $('.respr').html(res);
         } catch (e) {
           $('.respr').hide();
         }
       }
     });
   });
 }
 function Afficherpr(){
   $('.livr').on("change",function(){
     if (  $("#Prr").is(":checked")) {
       $('.respr').show();
     }else {
       $('.respr').hide();
     }
   });
 }

 function DemandeRamassage(){
   $('#ramass').on('click',function(){
       var dateram = $('#datram').val();
       var ids = new Array();
           $('input[name="numexramassage"]:checked').each(function() {
              ids.push($(this).val());
           });
         $.ajax({
             type: "POST",
             data: {idss:ids,datera:dateram},
             url: "ramassage.php",
             cache:false,
             success: function(){
               try {
                 alert('Demande de ramassage effectuée');
                 var url = "envoyercode.php";
                 window.open(url, '_blank');
                 $(location).attr('href', 'declaration.php');
               } catch (e) {
               }

             }
          });
          });
     }
     function CheckRamassage(){
     $("#checkAll").change(function(){  //"select all" change
     $(".numexramassage").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
     });
       //".checkbox" change
       $('.numexramassage').change(function(){
         //uncheck "select all", if one of the listed checkbox item is unchecked
           if(false == $(this).prop("checked")){ //if this item is unchecked
               $("#checkAll").prop('checked', false); //change "select all" checked status to false
           }
         //check "select all" if all checkbox items are checked
         if ($('.numexramassage:checked').length == $('.numexramassage').length ){
           $("#checkAll").prop('checked', true);
         }
       });
     }

     function AfficheBLoui(){
       $('.BLstat').on('change',function(){
         if ($("#blnon").is(":checked")) {
           $('#blocbl').hide();
           $('#blocnumsbl').hide();
           $('#numsbl').val('');
           $('#BL').val('');
         }else{
           $('#blocbl').show();
         }
       });
     }

     function AfficheBLmodal(){
       $('#affichemodalbl').on('click',function(){
         var nbrBL = $('#BL').val();
         var elem = $('.blres').empty();
         var i = 0;
         var divv ='<div class="form-group"><label>Numero de BL:</label>'
         while (i < nbrBL) {
           elem.append($(divv+'<input class="form-control" name="numBL[]">'));
               i++;
         }
       });
     }

     function ValideBL(){
       $('#validBL').on('click',function(){
         var numsbl ="";
         $("input[name='numBL[]']").each(function() {
           numsbl +=$(this).val()+" | ";
         });
         $('#numsbl').val(numsbl);
         $('#blocnumsbl').show();
         //$('#blocbl').hide();
         //$('#modalBL').modal('toggle');
       });
     }
	function affichepalettes(){
	       $('.palstat').on('change',function(){
         if ($("#palnon").is(":checked")) {
           $('#typpalet').hide();
         }else{
           $('#typpalet').show();
         }
       });
	}
function novillesdiv(){
  $('#libvi').on('keyup',function(){
    var libvi = $(this).val();
    $.ajax({
      url:"vildes.php",
      method:"POST",
      data:{libvil:libvi},
      success:function(res){
        try {
          $('.vilclass').html(res);
          //console.log(res);
        } catch (e) {
        }
      }
    });
  });
}
function vildl(){
  $.ajax({
    url:"vildes.php",
    success:function(res){
      try {
        $('.vilclass').html(res);
        //console.log(res);
      } catch (e) {
      }
    }
  });
}
function affichemodifpal(){
  $('.mpalstat').on('change',function(){
  if ($("#mpalnon").is(":checked")) {
    $('#mtypalet').hide();
  }else{
    $('#mtypalet').show();
  }
});
}
