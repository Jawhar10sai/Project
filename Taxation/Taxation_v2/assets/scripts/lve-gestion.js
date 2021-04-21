//Que les nombres
$(".nombres").keypress(function(e){
  var keyCode = e.which;
  if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
    return false;
  }
});
//Que les caracteres
$(".caracteres").keypress(function(e){
  var keyCode = e.which;
  if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
    return false;
  }
});
//Que les chiffres
$(".chiffres").on("keypress", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/[^0-9\.]/g, ''));
   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
   {
     alert("veuillez-vous saisir des valeurs numériques!");
     $(this).focus();
     evt.preventDefault();
   }
 });

//Traitement sur la valeur
$("#valeur").on('keyup',function(e){
  var self = $(this);
  var colisval = $('#colis').val();
  if (self.val()>=(parseInt(colisval)*10000)) {
    Swal.fire({
      icon: 'error',
      title: "la valeur ne doit pas être >"+(parseInt(colisval)*10000)
    });
    self.val('');
    e.preventDefault();
  }
});
