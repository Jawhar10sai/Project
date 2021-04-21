
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
