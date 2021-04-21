<div class="form-row">
  <legend>Produits et service :</legend>
  <fieldset class="form-group  col-md-6">
    <?php
    if ($row_list_dec['courrier_typ']=="M") {
      $mchecked = "checked";
      $lchecked = "";
    }else {
      $lchecked = "checked";
      $mchecked = "";
    }
    if ($row_list_dec['express']=="X") {
      $checkedex = "checked";
      $checkedsimple = "";
    }elseif ($row_list_dec['express']=="S") {
      $checkedsimple = "checked";
      $checkedex = "";
    }
     ?>

      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input typ" name="mcourrier_typ" id="mM" value="M" <?=$mchecked;?>>
          Messagerie
        </label>
        <div class="messagtype">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio"  class="form-check-input" value="S" name="mtypliv"  id="simple" <?=$checkedsimple;?> >Simple
            </label>
          </div>
         <div class="form-check">
           <label class="form-check-label">
             <input type="radio"  class="form-check-input" value="X" name="mtypliv"  id="express" <?=$checkedex;?> >Express
           </label>
         </div>
        </div>
      </div>

      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input typ" name="mcourrier_typ" id="mL" value="L" <?=$lchecked;?>>
          Affrêtement
        </label>
        <div class="affrettype">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input affrt" name="affrettyp" id="25" value="25" checked>
              25t
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input affrt" name="affrettyp" id="14" value="14">
              14t
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input affrt" name="affrettyp" id="5" value="5">
              5t
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input affrt" name="affrettyp" id="U" value="U">
              Utilitaires
            </label>
          </div>
        </div>
      </div>
  </fieldset>
</div>
