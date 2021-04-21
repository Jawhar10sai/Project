//forcer la saisie des numero uniquement pour le champ telephone
function specifier(){
  $("#telephone").keypress(function(e){
    var keyCode = e.which;
    if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
      return false;
    }
  });
  $("#poids").on("keypress", function(evt) {
     var self = $(this);
     self.val(self.val().replace(/[^0-9\.]/g, ''));
     if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
     {
       evt.preventDefault();
     }
   });
/**/
$("#idhaut").on("keypress", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9\.]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
   {
     evt.preventDefault();
   }
 });
/**/
$("#idlarg").on("keypress", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9\.]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
   {
     evt.preventDefault();
   }
 });
/**/
$("#idlong").on("keypress", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9\.]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
   {
     evt.preventDefault();
   }
 });
}
//forcer la saisie des caracteres uniquement
  function lettersOnly()
  {
                  var charCode = event.keyCode;
              if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 8)
                  return true;
              else
                  return false;
  }
/*
  function AfficheBLmodal(){
    $('#affichemodalbl').on('click',function(){
      var nbrBL = $('#BL').val();
      var elem = $('.blres').empty();
      var i = 0;
      var divv ='<div class="form-group"><label>Mission:</label>'
      while (i < nbrBL) {
        elem.append($(divv+'<input class="form-control" name="nummission[]">'));
            i++;
      }
    });
  }

  function ValideBL(){
    $('#validBL').on('click',function(){
      var numsbl ="";
      $("input[name='nummission[]']").each(function() {
        numsbl +=$(this).val()+" | ";
      });
      $('#numsbl').val(numsbl);
      $('#blocnumsbl').show();
    });
  }
*/
