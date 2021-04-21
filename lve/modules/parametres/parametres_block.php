<?php 


	$block = "SELECT r.*,c.id_reglages,c.id_page FROM reglages_block r,contenu c WHERE r.id_reglages = c.id_reglages AND c.id_page = '".$id_page."'";
	$req_block  = mysql_query($block ,$connect);
	$row_block  = mysql_fetch_assoc($req_block);
	$num_block  = mysql_num_rows($req_block);
	
	$style_layout = "SELECT style_layout FROM pages  WHERE id_site = '".$idsite."' AND id = '".$id_page."'";
	$req_style_layout  = mysql_query($style_layout ,$connect);
	$row_style_layout  = mysql_fetch_assoc($req_style_layout);

?>
  <style type="text/css">

<?php
if($num_block>0){
	do{
?>

 
	
	#tout div.column div.dragbox_<?php echo $row_block["id_reglages"]; ?> div.dragbox-content
           {
				float : left;
			  <?php if($row_block['largeur'] != "0" && $row_block["unite_l"] == "px"){ ?>  
			  width:<?php echo ($row_block["largeur"]-($row_block["padding_left"]+$row_block["padding_right"])).$row_block["unite_l"]; ?>;<?php }else if($row_block['largeur'] != "0" && $row_block["unite_l"] != "px") {?>
			  width:<?php echo $row_block["largeur"].$row_block["unite_l"]; ?>;
			  <?php } ?>
			  
			  <?php if($row_block['hauteur'] != "0" && $row_block["unite_h"] == "px"){ ?>  
			  height:<?php echo ($row_block["hauteur"]-($row_block["padding_top"]+$row_block["padding_bottom"])).$row_block["unite_h"]; ?>;
			  <?php }else if($row_block['hauteur'] != "0" && $row_block["unite_h"] != "px") {?>
			  height:<?php echo $row_block["hauteur"].$row_block["unite_h"]; ?>;
			  <?php } ?>
			  
			 <?php if($row_block['marge_top'] != 0){ ?>   margin-top:<?php echo $row_block["marge_top"]; ?>px;<?php } ?>
			  <?php if($row_block['marge_bottom'] != 0){ ?>  margin-bottom:<?php echo $row_block["marge_bottom"]; ?>px;<?php } ?>
			  <?php if($row_block['marge_left'] != 0){ ?>  margin-left:<?php echo $row_block["marge_left"]; ?>px;<?php }else{ ?>margin-left:auto;
float : none;
<?php }?>
			  <?php if($row_block['marge_right'] != 0){ ?>  margin-right:<?php echo $row_block["marge_right"]; ?>px;<?php }else{ ?>margin-right:auto;
float : none;
<?php }?>

				<?php if($row_block['padding_top'] != 0){ ?>   padding-top:<?php echo $row_block["padding_top"]; ?>px;<?php } ?>
			  <?php if($row_block['padding_bottom'] != 0){ ?>  padding-bottom:<?php echo $row_block["padding_bottom"]; ?>px;<?php } ?>
			  <?php if($row_block['padding_left'] != 0){ ?>  padding-left:<?php echo $row_block["padding_left"]; ?>px;<?php }?>
			  <?php if($row_block['padding_right'] != 0){ ?>  padding-right:<?php echo $row_block["padding_right"]; ?>px;<?php }?>
			  
			  
			  
			  
			  
			  border-radius: <?php echo $row_block["arrondi1"]; ?>px <?php echo $row_block["arrondi2"]; ?>px <?php echo $row_block["arrondi3"]; ?>px <?php echo $row_block["arrondi4"]; ?>px ;


			  <?php if($row_block['bordure'] != 0){ ?>  border:<?php echo $row_block["bordure"].'px '.$row_block["format_bordure"].' '.$row_block["couleur_b"]; ?>;<?php } ?>
			   <?php if($row_block["param"] == 1) { ?>
				background:<?php echo $row_block["couleur"]; ?>;
 <?php }else if($row_block["param"] == 2) { 
 $keywords3 = preg_split("/[\s,]+/", $row_block["degrade"]);?>
background-image: -webkit-linear-<?php echo $row_block["degrade"];?>;
background-image:    -moz-linear-<?php echo $row_block["degrade"];?>;
background-image:     -ms-linear-<?php echo $row_block["degrade"];?>;
background-image:      -o-linear-<?php echo $row_block["degrade"];?>;
background-image:         linear-<?php echo $row_block["degrade"];?>;

filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=<?php echo $keywords3[2]; ?>,endColorstr=<?php echo $keywords23[4]; ?>); 
zoom: 1;

 <?php }else if($row_block["param"] == 3) { ?>  
 <?php if($row_block["repeat_x"] == 0 && $row_block["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_block['image']; ?>) no-repeat scroll left top transparent;
 <?php }else if($row_block["repeat_x"] == 1 && $row_block["repeat_y"] == 0){ ?>
 background:url(<?php echo $row_block['image']; ?>) repeat-x scroll left top transparent;
 <?php }else if($row_block["repeat_x"] == 0 && $row_block["repeat_y"] == 1){ ?>
 background:url(<?php echo $row_block['image']; ?>) repeat-y scroll left top transparent;
 <?php }else{ ?>
 background:url(<?php echo $row_block['image']; ?>) repeat scroll left top transparent;
 <?php } ?>
 
 <?php }else if($row_block["param"] == 4) { ?>  
 				background:Transparent;
 <?php } ?>
 <?php if($row_block['ombre'] == 1){ ?>
    -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;
    -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;
    box-shadow: 0px 1px 5px 0px #4a4a4a;

<?php } ?>
 <?php if($row_block['fixe'] == 1){ ?>
 position : fixed !important;
 bottom: 0 !important;

<?php } ?>
opacity:<?php echo $row_block["opacite"]/10; ?>;
color:<?php echo $row_block["couleur_texte"]; ?> !important;
			  
		   }
		#tout div.column div.dragbox_<?php echo $row_block["id_reglages"]; ?> div.dragbox-content div,#tout div.column div.dragbox_<?php echo $row_block["id_reglages"]; ?> div.dragbox-content div embed
           {
		/*float : left;*/
			  <?php if($row_block['largeur'] != "0" && $row_block["unite_l"] == "px"){ ?>  
			  width:<?php echo ($row_block["largeur"]-($row_block["padding_left"]+$row_block["padding_right"])).$row_block["unite_l"]; ?>;<?php }else if($row_block['largeur'] != "0" && $row_block["unite_l"] != "px") {?>
			  width:<?php echo $row_block["largeur"].$row_block["unite_l"]; ?>;
			  <?php } ?>
			  
			  <?php if($row_block['hauteur'] != "0" && $row_block["unite_h"] == "px"){ ?>  
			  height:<?php echo ($row_block["hauteur"]-($row_block["padding_top"]+$row_block["padding_bottom"])).$row_block["unite_h"]; ?>;
			  <?php }else if($row_block['hauteur'] != "0" && $row_block["unite_h"] != "px") {?>
			  height:<?php echo $row_block["hauteur"].$row_block["unite_h"]; ?>;
			  <?php } ?>
		   }
		   
		   
		   
		   
         
   
    
    <?php 
	
	}while($row_block  = mysql_fetch_assoc($req_block));
	} 
	
	
	

	if($row_style_layout['style_layout'] == 11){?>
	body #tout #column1{
		width:70%;
		}	
	body #tout #column2{
		width:30%;
		}
	<?php }else if($row_style_layout['style_layout'] == 10){?>
	body #tout #column1{
		width:30%;
		}
	body #tout #column2{
		width:70%;
		}
	<?php }else if($row_style_layout['style_layout'] == 12){?>
		
	body #tout #column1,#tout #column2,#tout #column3,#tout #column4,#tout #column5{
		width:20%;
		}
	<?php }else if($row_style_layout['style_layout'] == 9){?>
	body #tout #column1{
		width:100%;
		}	
	body #tout #column2,#tout #column3,#tout #column4,#tout #column5{
		width:25%;
		}
	<?php }else if($row_style_layout['style_layout'] == 13){?>
	body #tout #column1{
		width:100%;
		}	
	body #tout #column2,#tout #column3,#tout #column4,#tout #column5,#tout #column6{
		width:20%;
		}
	<?php }else if($row_style_layout['style_layout'] == 8){?>
	
	body #tout #column1{
		width:100%;
		}	
	body #tout #column2,#tout #column4{
		width:33%;
		}
		body #tout #column3{
			width:34%;}
	<?php }else if($row_style_layout['style_layout'] == 7){?>
	body #tout #column1{
		width:100%;
		}	
	body #tout #column2,#tout #column3{
		width:50%;
		}
	
	<?php }else if($row_style_layout['style_layout'] == 6){?>
	body #tout #column1{
		width:100%;
		}	
	body #tout #column2{
		width:75%;
		}
	body #tout #column3{
		width:25%;
		}
	<?php }else if($row_style_layout['style_layout'] == 5){?>
	body #tout #column1{
		width:100%;
		}	
	body #tout #column3{
		width:75%;
		}
	
	body #tout #column2{
		width:25%;
		}
	
	<?php }else if($row_style_layout['style_layout'] == 4){?>
	body #tout #column1{
		width:25% !important;
		}
	body #tout #column2{
		width:25% !important;
		}	
		body #tout #column3{
		width:25% !important;
		}		
		body #tout #column4{
		width:25% !important;
		}				
	<?php }else if($row_style_layout['style_layout'] == 3){?>
	body #tout #column1,#tout #column3{
		width:33%;
		}
	body #tout #column2{
		width:34%;}
	<?php }else if($row_style_layout['style_layout'] == 2){?>
	
	body #tout #column1,#tout #column2{
		width:50%;
		}
	
	<?php }else{?>
	
	body #tout #column1{
		width:100%;
		}
	<?php }?>
	
	
	
	
</style>
