$.ajax({
url:'gestion/preparation_tracking.php',
beforeSend:function(){
  $('#dvData').html('<div class="offset-md-6" ><img src="images/red-load.gif" height="100"/></div>');
},
success:function(res){
  $('#dvData').html(res);
}
});
$('#form-tracking').on('submit',function(event){
  event.preventDefault();
  $.ajax({
  url:'gestion/preparation_tracking.php',
  method:'POST',
  data:$('#form-tracking').serialize(),
  beforeSend:function(){
    $('#btn-filter').prop('disabled', true);
    $('#btn-filter').html('<img src="images/red-load.gif" height="32"/>');
  },
  success:function(res){
    //$('#form-tracking')[0].reset();
    $('#btn-filter').prop('disabled', false);
    $('#btn-filter').html('<span class="fa fa-filter"></span> Filtrer');
    $('#dvData').html(res);
  }
  });
});
