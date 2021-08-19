//Gestion de la connexion
$(".form-signin").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
    url: "gestion/connexion.php",
    method: "POST",
    data: $(".form-signin").serialize(),
    beforeSend: function () {
      $("#btn-connect").prop("disabled", true);
      $("#btn-connect").html('<img src="images/red-load.gif" height="32"/>');
    },
    success: function (res) {
      try {
        console.log(res);
        if (res == "deja co") {
          Swal.fire({
            icon: "error",
            title: "Utilisateur déjà connecté!",
          });
          $(".form-signin")[0].reset();
          $("#btn-connect").prop("disabled", false);
          $("#btn-connect").html(
            '<i class="fas fa-sign-in-alt"></i> Se connecter'
          );
        } else if (res == "non trouve") {
          Swal.fire({
            icon: "error",
            title:
              "Aucun utilisateur n'est compatible avec les données que vous avez insérées, merci de ressayer!",
          });
          $(".form-signin")[0].reset();
          $("#btn-connect").prop("disabled", false);
          $("#btn-connect").html(
            '<i class="fas fa-sign-in-alt"></i> Se connecter'
          );
        } else if (res == "reussite") {
          $(location).attr("href", "Déclarations");
        } else if (res == "Tracking") {
          $(location).attr("href", "Tracking");
        }
          else if (res == "admin") {
          $(location).attr("href", "LveAdmin");
        }
      } catch (error) {
        //console.log(error);
      }
    },
  });
});
//**** Ajout d'une déclaration ****
$("#declaration-form-ajout").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
    url: "gestion/ajout.php",
    method: "POST",
    data: $("#declaration-form-ajout").serialize(),
    beforeSend: function () {
      //console.log(data);
      $("#btn-envois").prop("disabled", true);
      $("#btn-envois").html('<img src="images/red-load.gif" height="32"/>');
    },
    success: function (res) {
      console.log(res);
      Swal.fire({
        icon: "success",
        title: "Déclaration bien ajoutée!",
      });
      getDeclarations();
      $("#declaration-form-ajout")[0].reset();
      $("#btn-envois").prop("disabled", false);
      $("#btn-envois").html(
        '<i class="fas fa-save"></i>Confirmer la déclaration'
      );
    },
  });
});

//************************* Modification des informations personnelles du client LVE *******************************
$(".info-perso").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
    url: "Modification",
    method: "POST",
    data: $(".info-perso").serialize(),
    beforeSend: function () {
      //console.log(data);
      $("#modif-infos").prop("disabled", true);
      $("#modif-infos").html('<img src="images/red-load.gif" height="32"/>');
    },
    success: function (res) {
      //console.log(res);
      Swal.fire({
        icon: "success",
        title: "Bien modifiées",
      });
      $("#modif-infos").prop("disabled", false);
      $("#modif-infos").html(
        '<i class="fas fa-save"></i> Enregistrer les changements'
      );
    },
  });
});
/*********************************************** Changement de mot de passe ******************************************************/
$(".mdp-change").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
    url: "Modification",
    method: "POST",
    data: $(".mdp-change").serialize(),
    beforeSend: function () {
      //console.log(data);
      $("#mod-pass").prop("disabled", true);
      $("#mod-pass").html('<img src="images/red-load.gif" height="32"/>');
    },
    success: function (res) {
      if (res == "modifie") {
        console.log(res);
        Swal.fire({
          icon: "success",
          title: "Le mot de passe a été bien modifié",
        });
        $(".mdp-change")[0].reset();
        $("#mod-pass").prop("disabled", false);
        $("#mod-pass").html(
          '<i class="fas fa-save"></i> Changer le mot de passe'
        );
      } else {
        Swal.fire({
          icon: "error",
          title: res,
        });
        $("#mod-pass").prop("disabled", false);
        $("#mod-pass").html(
          '<i class="fas fa-save"></i> Changer le mot de passe'
        );
      }
    },
  });
});
function showag() {
  $("#buttag").on("click", function () {
    $(".agdiv").slideToggle("slow");
    $(".maindiv").slideToggle("slow");
  });
}
function afficheaffretement() {
  $(".typ").on("change", function () {
    if ($("#affrtmnt").is(":checked")) {
      $(".affret").show();
      $(".mess").hide();
    } else {
      $(".affret").hide();
      $(".mess").show();
    }
  });
}
function Nomsuggestions() {
  $("#nom").keyup(function () {
    var nomquer = $(this).val();
    if (nomquer != "") {
      $.ajax({
        url: "gestion/infos_client.php",
        method: "POST",
        data: { nom_client: nomquer },
        success: function (res) {
          try {
            $(".segg").fadeIn();
            $(".segg").html(res);
          } catch (e) {
            $(".segg").fadeOut();
          }
        },
      });
    } else {
      $(".segg").fadeOut();
    }
  });
}
function emtyNomsuggestions() {
  $("#prenom").on("focus", function () {
    $(".segg").fadeOut();
  });
  $("#ville").on("focus", function () {
    $(".segg").fadeOut();
  });
  $("#telephone").on("focus", function () {
    $(".segg").fadeOut();
  });
  $("#adresse").on("focus", function () {
    $(".segg").fadeOut();
  });
}

function getDeclarations() {
  $.ajax({
    url: "gestion/dnr.php",
    success: function (res) {
      $("#mesDNR").html(res);
    },
  });
}
function NombredanslePanier() {
  $.ajax({
    url: "gestion/countpanier.php",
    method: "get",
    success: function (res) {
      $("#count").html(res);
      if (parseInt(res) == 0) {
        $("#ramass").text("Créer un carnet de ramassage");
      } else {
        $("#ramass").text("Ajouter au panier");
      }
    },
  });
}
$(".maform").on("submit", function (event) {
  event.preventDefault();
  var dateram = $("#datram").val();
  var ids = new Array();
  $('input[name="numexramassage"]:checked').each(function () {
    ids.push($(this).val());
  });
  $.ajax({
    type: "POST",
    data: { idss: ids, datera: dateram },
    url: "gestion/ajout.php",
    success: function (res) {
      console.log(res);
      if (res == "ramasse") {
        Swal.fire({
          icon: "success",
          title: "Demande de ramassage effectuée!",
        });
      }
      getDeclarations();
      NombredanslePanier();
    },
  });
});
function CheckRamassage() {
  $("#checkAll").change(function () {
    //"select all" change
    $(".numexramassage").prop("checked", $(this).prop("checked")); //change all ".checkbox" checked status
  });
  //".checkbox" change
  $(".numexramassage").change(function () {
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if (false == $(this).prop("checked")) {
      //if this item is unchecked
      $("#checkAll").prop("checked", false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($(".numexramassage:checked").length == $(".numexramassage").length) {
      $("#checkAll").prop("checked", true);
    }
  });
}
//reclamations
$("#form_reclam").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
    url: "gestion/ajout.php",
    method: "POST",
    data: $("#form_reclam").serialize(),
    beforeSend: function () {
      $("#btn-reclame").prop("disabled", true);
      $("#btn-reclame").html('<img src="images/red-load.gif" height="32"/>');
    },
    success: function (res) {
      if (res == "reclame") {
        Swal.fire({
          icon: "success",
          title: "Votre Réclamation a été envoyée",
        });
        $("#form_reclam")[0].reset();
        $("#btn-reclame").prop("disabled", false);
        $("#btn-reclame").html("Valider");
      } else {
        Swal.fire({
          icon: "error",
          title: "Erreur! merci d'essayer ultérieurement",
        });
        $("#btn-reclame").prop("disabled", false);
        $("#btn-reclame").html("Valider");
      }
    },
  });
});
function telecharger() {
  Swal.fire({
    icon: "success",
    title: "Fichier téléchargé!",
  });
}
