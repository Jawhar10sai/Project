//tester si le mot de passe a été changé ou pas.
$.ajax({
  url:'gestion/pass-change.php',
  method:'get',
  data:{"pass":true},
  success:function(res){
    if (res=="a changer") {
      Swal.fire({
    icon: 'info',
    title: 'Recommendation',
    text: 'Il est recommandé de changer votre mot de passe pour des raisons de sécurité!',
    footer: '<a href="Profile">Changer le mot de passe?</a>'
  })
    }
  }
});
//nombre des déclarations dans le panier de ramassage et changer la texte du button creation et ajout au panier
$.ajax({
  url:'gestion/countpanier.php',
  method:'get',
  success:function(res){
    $('#count').html(res);
    if (parseInt(res)==0) {
      $("#ramass").text('Créer un carnet de ramassage');
    }else {
      $("#ramass").text('Ajouter au panier');
    }
  }
});
