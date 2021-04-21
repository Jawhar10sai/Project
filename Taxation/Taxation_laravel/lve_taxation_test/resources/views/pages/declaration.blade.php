<?php
use App\Ville;
 ?>
@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/styles/mstyle.css') }}">
<div class="container-fluid">
  <div class="container" style="margin-top:50px;margin-bottom:50px;">
    <div class="row">
      <div class="col-md-4 col-xs-12 offset-md-2">
        <button type="button" class="btn btn-block btn-lg btn-primary" name="button">test</button>
      </div>
      <div class="col-md-4 col-xs-12">
        <button type="button" class="btn btn-block btn-lg btn-primary" name="button">test</button>

      </div>
    </div>
  </div>
  <div class="row">
    <!--**************************Expéditeur********************************-->
    <div class="col-xs-12 col-md-3">
      <div class="card">
        <div class="card-header">
          <h4> <b>1) Expéditeur</b> </h4>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-6">
              <label for=""> Code:</label>
              <input type="text" class="form-control form-control-sm" value="" disabled>
            </div>
            <div class="form-group col-6">
              <label for=""> Nom:</label>
              <input type="text" class="form-control form-control-sm" value="" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <label for=""> ICE:</label>
              <input type="text" class="form-control form-control-sm" value="" disabled>
            </div>
            <div class="form-group col-6">
              <label for=""> Telephone:</label>
              <input type="text" class="form-control form-control-sm" value="" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-7">
              <label for=""> Contact:</label>
              <input type="text" class="form-control form-control-sm" value="" disabled>
            </div>
            <div class="form-group col-5">
              <label for=""> Ville:</label>
              <input type="text" class="form-control form-control-sm" value="" disabled>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-12">
              <label for=""> Adresse:</label>
              <input type="text" class="form-control form-control-sm" value="" disabled>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--**************************Destinataire********************************-->
    <div class="col-xs-12 col-md-3">
      <div class="card">
        <div class="card-header">
           <h4> <b>2) Destinataire</b> </h4>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-4">
              <label for=""> Code:<span style="color:red;">*</span></label>
              <input type="text" class="form-control form-control-sm" id="codecli" name="codecli" onkeyup="afficheinfoclient()" required>
            </div>
            <div class="form-group col-8 " id="mess" style="
                                                          margin-top: 20px;
                                                          margin-bottom: -8px;
                                                      ">
            </div>
          </div>
          <div class="minfoclient">
            <div class="form-row">
                <div class="form-group col-6">
                  <label for=""> Nom:<span style="color:red;">*</span></label>
                  <input type="text" class="form-control form-control-sm" id="nom" name="nom" value=""  required>
                  <div class="segg">

                  </div>
                </div>
                <div class="form-group col-6">
                  <label> Prénom:</label>
                  <input type="text" class="form-control form-control-sm" id="prenom" name="prenom" value="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <label for=""> Adresse:<span style="color:red;">*</span></label>
                  <input type="text" class="form-control form-control-sm" id="adresse" name="adresse" value="" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-6">
                  <label for=""> Ville:<span style="color:red;">*</span></label>
                  <select class="form-control form-control-sm" name="ville" id="ville" required>
                    <option value="" id="firstval"></option>
                    @foreach(Ville::listeville() as $ville)
                      <option value="{{ $ville->VILLE_COD }}">{{ $ville->VILLE_LIB }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-6">
                  <label for=""> Téléphone:<span style="color:red;">*</span></label>
                  <input type="tel" maxlength="10" placeholder="05XXXXXXXX" class="form-control form-control-sm" id="telephone" name="telephone" value="" required>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!--**************************Livraison********************************-->
    <div class="col-md-6 col-xs-12">
      <div class="card">
        <div class="card-header">
           <h4> <b>3) Livraison</b> </h4>
        </div>
        <div class="card-body">
          <div class="form-row">
             <div class="form-group col-md-6">
                <label for="colis">Nbre colis:<span style="color:red;">*</span></label>
                <input class="form-control form-control-sm" type="number" min="1" step="1" name="colis"  id="colis" required >
              </div>
              <div class="form-group col-md-6">
                <label for="poids">Poids:(Kg)<span style="color:red;">*</span></label>
                <input class="form-control form-control-sm text-right" type="text" min="0"    name="poids"  id="poids" required>
              </div>
          </div>
          <div class="form-row">
             <fieldset class="form-group  col-md-6">
               <h5>Livraison :</h5>
               <div class="form-check">
                 <label class="form-check-label">
                   <input type="radio" class="form-check-input livr" name="livraison" id="D" value="D" checked>
                   À domicile
                 </label>
               </div>
               <div class="form-check" id="Gare">
                 <label class="form-check-label">
                  <input type="radio" class="form-check-input livr" name="livraison" id="G" value="G">
                  En gare
                 </label>
               </div>
               <div class="form-check" id="pointR">
                 <label class="form-check-label">
                   <input type="radio" class="form-check-input livr" disabled name="livraison" id="Prr" value="p">
                   Points relais
                 </label>
               </div>
             </fieldset>
             <fieldset class="form-group col-md-6">
               <h5>Port :</h5>
               <div class="form-check">
                 <label class="form-check-label">
                   <input type="radio" class="form-check-input pay" name="port" id="P" value="P" checked>
                   Payé
                 </label>
               </div>
               <div class="form-check">
                 <label class="form-check-label">
                   <input type="radio" class="form-check-input pay" name="port" id="D" value="D">
                   Dû
                 </label>
               </div>
             </fieldset>
           </div>
           <div class="respr col-md-6" style="background-color:#E7E6E6; margin:1px; padding: 5px;border-radius:5px;">

           </div>
           <div class="form-row">
               <fieldset class="form-group  col-md-6">
                 <h5>Produits et service :</h5>
                 <div class="form-check">
                   <label class="form-check-label">
                     <input type="radio" class="form-check-input typ" name="courrier_typ" id="M" value="M" checked>
                     Messagerie
                   </label>
                 </div>
                 <div class="mess" style="border: 1px solid black;
                 border-radius:5px;
                 padding-left:15px;">
                   <fieldset class="form-group col-md-6">
                   <div class="col-12">
                     <div class="form-check">
                       <label class="form-check-label">
                         <input type="radio"  class="form-check-input" value="S" name="typliv"  id="simple" checked>Simple
                       </label>
                     </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio"  class="form-check-input" value="X" name="typliv"  id="express" >Express
                      </label>
                    </div>
                   </div>
                   </fieldset>
                 </div>
                 <div class="form-check">
                   <label class="form-check-label">
                     <input type="radio" class="form-check-input typ" name="courrier_typ" id="affrtmnt" value="L">
                     Affrêtement
                   </label>
                 </div>
                 <div class="affret">
                   <div class="aff" style="border: 1px solid black;
                     border-radius:5px;
                     padding-left:15px;">
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
               <fieldset class="form-group col-md-6">
                 <h5>Nature marchandises :</h5>
                 <div class="form-check">
                   <label class="form-check-label">
                     <input type="radio" class="form-check-input natu" name="nature" id="Normal" value="Normal" checked>
                     Normal
                   </label>
                 </div>
                 <div class="form-check">
                   <label class="form-check-label">
                      <input type="radio" class="form-check-input natu" name="nature" id="Fragile" value="Fragile">
                      Fragile
                   </label>
                 </div>
                 <div class="form-check">
                   <label class="form-check-label">
                     <input type="radio" class="form-check-input natu" name="nature" id="Très fragile" value="Très fragile">
                     Très fragile
                   </label>
                 </div>
               </fieldset>
            </div>
        </div>
      </div>
    </div>
<!--**************************Dimensions et Taxe Ad valorem********************************-->

<!--**************************Retour de fonds********************************-->

<!--**************************Retour palettes********************************-->

<!--**************************Fin Retour palettes********************************-->
  </div>
</div>

<script type="text/javascript" src="{{ asset('assets/js/decs.js') }}">
</script>

@endsection
