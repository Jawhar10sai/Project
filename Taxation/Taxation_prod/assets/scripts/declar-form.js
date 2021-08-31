vm = new Vue({
    el: '.form-dec',
    data: {
        codee: '',
        livr_typ:'',
        palstat:'',
        blstat:'',
        nbrbl:'',
        code_ville:'',
        /* infos client */
        nom:'',
        prenom:'',
        adresse:'',
        mail:'',
        telephone:'',
        ville_cod:'',
        /* fin infos client */
        ville_cons:'',
        message : false
    },
    created: function () {
        this.checkCode();
        this.codeVille();
    },
    methods: {
        
        checkCode() {
            if (this.codee != "") {
                $.ajax({
                    type: 'POST',
                    url: 'gestion/infos_client.php',
                    data: 'code_client=' + this.codee,
                    success: function (res) {
                        try {
                            result = JSON.parse(res);
                            vm.nom = result.NOM;
                            vm.prenom = result.PRENOM;
                            vm.adresse = result.ADRESSE;
                            vm.telephone = result.telephone;
                            vm.mail = result.mail;
                            vm.code_ville = result.VILLE_COD;
                            vm.message = false;

                        } catch (e) {
                            vm.nom = '';
                            vm.prenom = '';
                            vm.adresse = '';
                            vm.telephone = '';
                            vm.code_ville = '';
                            vm.message = true;
                        }
                    }
                });
            } else {
                this.message = false;
            }
        
       },
       codeVille(){
        if (this.code_ville != "") {
            $.ajax({
                url: "gestion/getAgence.php",
                type: "POST",
                data: { code_vil: vm.code_ville },
                success: function (res) {
                    result = JSON.parse(res);
                  vm.ville_cons = result.ville;
                  if (result.agence != null) {
                    $("#showdesti").html(
                        "<label class='alert alert-success col-12' role='alert'>Agence de destination: " + result.agence + "</label>"
                      );
                  }else{
                    $("#showdesti").html(
                        "<label class='alert alert-danger col-12' role='alert'>cette ville n'a pas d'agence</label>"
                      );
                  }
                },
              });
              if(this.livr_typ == 'p'){
                $.ajax({
                    url: "gestion/getConsigne.php",
                    type: "POST",
                    data: { code_vil: vm.code_ville },
                    success: function (res) {
                        $('#div-consigne').html(res);
                    }
                  });
            }
            }
       },
       validerBL : function() {
        var numsbl = "";
          $("input[name='numBL[]']").each(function () {
            if ($(this).val() != "") {
              numsbl += $(this).val() + " | ";
            }
          });
          $("#numsbl").val(numsbl);
          $("#blocnumsbl").show();
      },
      AfficherBLmodal: function () {
          var elem = $(".blres").empty();
          var i = 0;
          var divv = '<div class="form-group"><label>Numero de BL:</label>';
          while (i < this.nbrbl) {
            elem.append($(divv + '<input class="form-control" name="numBL[]">'));
            i++;
          }
      }
      /*S,
      characterOnclick(){

      }*/
    },
    watch: {
        codee: "checkCode",
        code_ville :"codeVille"
    }
});