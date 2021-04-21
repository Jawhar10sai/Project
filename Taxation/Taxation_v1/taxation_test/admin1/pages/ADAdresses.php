      <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id="adressinfos"><i class="fas fa-address-card"></i>Infos</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id=""><i class="fas fa-tasks"></i>Gestion</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;" class="nav-link" id=""><i class="fas fa-map-marker-alt"></i>Adresses des clients</button>
            </li>
            <li class="nav-item">
              <button style="background:transparent; border:0;"  class="nav-link" id=""><i class="fas fa-file-archive"></i>Archives</button>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="adcontent">

            </div>
          </div>
        </div>
      </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#adressinfos').on('click',function(){
        $.ajax({
          url:"pages/adresses/ajadresse.php",
          success:function(res){
            try {
              //console.log(res);
              $('.adcontent').html(res);
            } catch (e) {
              $('.adcontent').empty();
            }
          }
        });
      });
    });
    </script>
