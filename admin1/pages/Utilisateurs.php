<?php require_once "users/navbar.php"; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-12 uscontent">
      <?php require_once "users/liste_user.php"; ?>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      clientinterval();
      clientsessions();
      clientsouclient();
      clientdeclaration();
      clientarchive();
      clientconnexion();
    });
</script>
