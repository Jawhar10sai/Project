<?php

$idpage = $id_page;
$idbloc = $valeur2;
$id = str_replace("Slider_#","",$row_donnees['contenu']);
$path = SITEPATH.'uploads/site_'.$idsite.'/slider_bloc/min/';
$path2 = SITEPATH.'modules/slider_bloc/';



/*listage du repertoire */
    $slider = "SELECT * FROM slider_bloc WHERE id_param = '".$id."' ORDER bY ordre";
	$req_slider  = mysql_query($slider ,$connect);
	$row_slider = mysql_fetch_assoc($req_slider);
	$num_slider = mysql_num_rows($req_slider);
	
	
	$param_slider = "SELECT * FROM parametres_slider_bloc WHERE id = '".$id."' AND active = '1'";
	$req_param_slider  = mysql_query($param_slider ,$connect);
	$row_param_slider = mysql_fetch_assoc($req_param_slider); ?>
<script language="javascript">

$(document).ready(function() {
    $('#images_<?php echo $idbloc; ?>').refineSlide({
        transition : "<?php echo $row_param_slider['transition']; ?>",
		autoPlay              : true,    // Int (default false): Auto-cycle slider
		delay                 : <?php echo $row_param_slider['delay']*1000; ?>,     // Int (default 5000) Time between slides in ms
		transitionDuration    : <?php echo $row_param_slider['transitionDuration']*1000; ?>,
        onInit : function () {
            var slider = this.slider,
               $triggers = $('.translist').find('> li > a');

            $triggers.parent().find('a[href="#_'+ this.slider.settings['transition'] +'"]').addClass('active');

            $triggers.on('click', function (e) {
               e.preventDefault();

                if (!$(this).find('.unsupported').length) {
                    $triggers.removeClass('active');
                    $(this).addClass('active');
                    slider.settings['transition'] = $(this).attr('href').replace('#_', '');
					$('#transition').val($(this).attr('href').replace('#_', ''));
                }
            });

            function support(result, bobble) {
                var phrase = '';

                if (!result) {
                    phrase = ' not';
                    $('#upper').find('div.bobble-'+ bobble).addClass('unsupported');
                    $('#upper').find('div.bobble-js.bobble-css.unsupported').removeClass('bobble-css unsupported').text('JS');
                }
            }

            support(this.slider.cssTransforms3d, '3d');
            support(this.slider.cssTransitions, 'css');
        },
        controls : 'arrows'
    });
});

</script>

<?php if($row_param_slider['height_slider'] != '' && $row_param_slider['width_slider'] != '' && $row_param_slider['height_slider'] != 0 && $row_param_slider['width_slider'] != 0){ ?>
<script language="javascript">
$(document).ready(function(){
$('.wrap_<?php echo $idbloc; ?>,.wrap_<?php echo $idbloc; ?> .section-2,.wrap_<?php echo $idbloc; ?> .section-2 .rs-wrap,.wrap_<?php echo $idbloc; ?> .section-2 .rs-wrap .rs-slider li,.wrap_<?php echo $idbloc; ?> .section-2 .rs-wrap .rs-slider li img').css({'width' : "<?php echo $row_param_slider['width_slider']; ?>px",'height' : "<?php echo $row_param_slider['height_slider']; ?>px"});
$('.wrap_<?php echo $idbloc; ?>').css({"marginLeft":"auto","marginRight":"auto"});
});
</script>
<?php } ?>

<div class="wrap_<?php echo $idbloc; ?> group">
  <?php if($num_slider > 0){ ?>
  <div class="section-2 group">
    <ul id="images_<?php echo $idbloc; ?>" class="rs-slider">
      <?php do{  ?>
        <li class="group">
       <?php  if($row_slider['type_lien'] == 1){echo '<a href="'.get_name_page($idsite,$row_slider['Lien']).'">';}else if($row_slider['type_lien'] == 2){echo '<a href="'.$row_slider['Lien'].'" target="_blank">';}else{echo '<a>';}
        
        ?>
          <?php if($row_slider["images"] != ''){ ?>
          <img src="<?php echo SITEPATH; ?>uploads/site_<?php echo $idsite; ?>/slider_bloc/min/<?php echo utf8_encode(end(explode("/", $row_slider['images']))); ?>" alt="<?php echo $row_slider["descriptif"]; ?>" />
          <?php }else{ ?>
          <img src="<?php echo SITEPATH; ?>images/no_image.png" alt="<?php echo $row_slider["descriptif"]; ?>" />
          <?php } ?>
          </a>
        </li>
        <?php }while($row_slider = mysql_fetch_assoc($req_slider));
				
				?>
    </ul>
  </div>
  <!-- /.section-2 -->
  
  <?php }else{  ?>
  Vous devez definir vos images d'abord
  <?php		 } ?>
</div>
<!-- /#upper --> 

