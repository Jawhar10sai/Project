$('.panier-form').on('submit',function(event){
  event.preventDefault();
  $.ajax({
    url:'gestion/ajout.php',
    method:'POST',
    data:$('.panier-form').serialize(),
    success:function(res){
      //console.log(res);
      if (res == "Code erroné") {
        Swal.fire({
        icon: 'error',
        title: 'Erreur',
        text: res,
      });
      $('#coderams').val("");
      }else {
        window.open('Carnet/'+res,'_blank');
        $(location).attr('href', 'Déclarations');
      }
    }
  });
});
  $('#annuler_carnet').on('click',function(){
    var motif = $('#mmotif').val();
    $.ajax({
      url:'gestion/suppression.php',
      method:'POST',
      data:{"annuler_carnet":true,"motif":motif},
      success:function(){
        $(location).attr('href', 'Déclarations');
      }
    });
  });
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
  $('.adiv').css({"border":"1px solid black","padding":"30px","border-radius":"5px","margin-left":"40px"});
  $('.vdiv').css({"border":"1px solid black","padding":"30px","border-radius":"5px","margin-left":"40px"});
  $('#annul').on('click',function(){
    var content = $('.motifdiv').html();
    $('.vdiv').html('');
    $('.adiv').html(content);
    $('.vdiv').css({"border":"0px"});
  });
