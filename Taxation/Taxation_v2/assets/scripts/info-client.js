new Vue({
  el:'.minfoclient',
data:{
    codee:''
},
created:function(){
  this.checkCode();
},
methods:{
 checkCode(){
   if (this.codee!="") {
     $.ajax({
       type:'POST',
       url:'gestion/infos_client.php',
       data:'code_client='+this.codee,
       success: function(res){
         try {
           $('#mess').hide();
           result = JSON.parse(res);
           $('#nom').val(result.NOM);
           $('#prenom').val(result.PRENOM);
           $('#adresse').val(result.ADRESSE);
           $('#firstval').text(result.VILLE_LIB);
           $('#firstval').val(result.VILLE_COD);
           $('#telephone').val(result.telephone);

         } catch (e) {
           $('#mess').show();
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
},
watch:{
  codee: "checkCode"
}
});

/*
$('#codecli').on('keyup',function(){
    var iDClient = $(this).val();
    if (iDClient) {
      $.ajax({
        type:'POST',
        url:'gestion/infos_client.php',
        data:'code_client='+iDClient,
        success: function(res){
            try {
              $('#mess').html("");
              $('#nom').val(res.NOM);
              $('#prenom').val(res.PRENOM);
              $('#adresse').val(res.ADRESSE);
              $('#firstval').text(res.VILLE_LIB);
              $('#firstval').val(res.VILLE_COD);
              $('#telephone').val(res.telephone);
            } catch (e) {
              $('#mess').html('<label class="form-group col-12 alert alert-warning" role="alert">Client inexistant, veuillez-vous remplir les autres champs!</label>');
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
      $('#mess').html("");
    }
});
*/
