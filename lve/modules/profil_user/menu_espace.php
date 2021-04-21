<div class="staticHeader">
            <h1 class="redRegular">Bonjour <?php echo $_SESSION['nom_acces']; ?></h1>
           <div class="deconnexion_compte">
                <input type="submit" class="bgRed whiteColor" onclick="javascript:document.location.href='logout_acces.php'" value="Déconnexion" />
            </div>
            <div class="espace_client">
                <input type="submit" class="bgRed whiteColor" onclick="javascript:document.location.href='<?php echo get_name_page($idsite,$id_page); ?>'" value="Espace Client" />
            </div>
        </div>
        <div id="corps" class="infoContent">
        
        <div class="blocLeft">
        <ul id="blocLeftParams">
                <li>
                    <div class="profilIcon"> <img src="modules/profil_user/img/profilPic.png" />
                        <h2 class="redBold">Mon Profil</h2>
                    </div>
                    <hr />
                    <ul class="textMonCompte">
                        <li><a class="redRegular" href="<?php echo get_name_page($idsite,$id_page); ?>&Informations">Mes informations</a></li>
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?>&Adresses">Mes adresses</a></li>
                    </ul>
                </li>
                 <?php if($is_catalogue == 1){ ?>
                <li>
                    <div class="cartIcon"> <img src="modules/profil_user/img/CartPic.png" />
                        <h2 class="redBold">Mes commandes</h2>
                    </div>
                    <hr />
                      <ul class="textMonCompte">
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?>&Commandes">Suivi commandes</a></li>
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?>&Historiques">Historiques</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <div class="avantIcon"> <img src="modules/profil_user/img/avantagePic.png" />
                        <h2 class="redBold">Mes avantages</h2>
                    </div>
                    <hr />
                       <ul class="textMonCompte">
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?>&Recompenses">Mes récompenses</a></li>
                        <li><a href="<?php echo get_name_page($idsite,$id_page); ?>&Cadeaux">Mes cadeaux</a></li>
                    </ul>
                    </li></ul>
                </li>
            </ul>
        </div>