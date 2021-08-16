new Vue({
    el: '.form-dec',
    data: {
        codee: '',
        livr_typ:'',
        palstat:'',
        code_ville:'',
        ville_cons:''
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
            } else {
                $('#mess').hide();
            }
        
       },
       codeVille(){
        if (this.code_ville != "") {
            $.ajax({
                url: "gestion/getAgence.php",
                type: "POST",
                data: { code_vil: this.code_ville },
                success: function (res) {
                    result = JSON.parse(res);
                  this.ville_cons = result.ville;
                  console.log(this.ville_cons);
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
        }
       }
    },
    watch: {
        codee: "checkCode",
        code_ville :"codeVille",
        ville_cons :"codeVille"
    }
});