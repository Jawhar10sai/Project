<?php
session_start();

include_once('../../config/connect.php');
$produit=mysql_escape_string(($_GET['produit']));
$page=mysql_escape_string(($_GET['page']));
$id_user=$_SESSION['ID_user']; 

$show_prx=1;


$src="images/empty_img.png";

		if(isset($_GET['produit']) && !empty($produit)){
			$produits = "SELECT * FROM produit where id='$produit'";
			$req_produits = mysql_query($produits ,$connect);
			$row_produits = mysql_fetch_assoc($req_produits);

			$src=$row_produits['Image'];
			$show_prx=$row_produits['show_prix'];
		}
		
		if(isset($_POST['save_produit'])){
		$Nom=mysql_escape_string(utf8_decode($_POST["Nom"]));
		$Description=mysql_escape_string(utf8_decode($_POST["Description"]));

		$Image="upload/" . $produit."_".$_FILES["Image"]["name"];
		
		$show_prix=isset($_POST["show_prix"]);
		$Prix=mysql_escape_string(utf8_decode($_POST["Prix"]));
		
		$extension = end(explode(".", $_FILES["Image"]["name"]));
		$allowedExts = array("jpg", "jpeg", "gif", "png");

		if (($_FILES["Image"]["size"] < 2000000)&& in_array($extension, $allowedExts))  {
		  if ($_FILES["Image"]["error"] > 0)
			{
			echo "Erreur de téléchargement du fichier: " . $_FILES["Image"]["error"] . "<br />";
			}
		  else
			{
				move_uploaded_file($_FILES["Image"]["tmp_name"], $Image);
				
				if($_POST['action']=="add"){
				
					$query_user = "INSERT INTO `produit` (`id_page` ,`Nom` ,`Image` ,`Description` ,`Prix` ,`show_prix`)
					VALUES ( '$page', '$Nom', '$Image', '$Description', '$Prix', '$show_prix')";
					mysql_query($query_user);

				}
		
			}
		  }
		else
		  {
		  echo "Fichier invalid";
		  }





if($_POST['action']=="edit"){
	
	$update_img="";
	
			if(!empty($_FILES["Image"]["name"])){
	
			if (($_FILES["Image"]["size"] < 2000000)&& in_array($extension, $allowedExts))  {
			  if ($_FILES["Image"]["error"] > 0)
				{
				echo "Erreur de téléchargement du fichier: " . $_FILES["Image"]["error"] . "<br />";
				}
			  else
				{
					move_uploaded_file($_FILES["Image"]["tmp_name"], $Image);
					$update_img=" ,`Image`='$Image'";
				}
			  }
			else
			  {
			  echo "Fichier invalid";
			  }
			$mot_passe=$row_users['Password'];	
			}
		$query_user = "update `produit` set `Nom`='$Nom' ,`Description`='$Description',`Prix`='$Prix' ,`show_prix`='$show_prix' $update_img where id='$produit'";
		mysql_query($query_user);
}
		
?>
	<script language="javascript">
	
		document.location.href = "List_produits.php";
		
    </script>
<?php
	}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>produit de blog</title>
<link rel="stylesheet" type="text/css" href="../../css/template.css"/><link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css"/><link rel="stylesheet" type="text/css" href="../../install/css/style.css"/>
<script src="js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="../../tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
        convert_urls : false,


		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
		file_browser_callback : "filebrowser",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,image,code,|,insertdate,inserttime",
		theme_advanced_buttons3 : "sub,sup,|,charmap,emotions,styleprops,|,forecolor,backcolor",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		//content_css : "tiny_mce/css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
	
	function filebrowser(field_name, url, type, win) {
  // alert('coco'+url);
    fileBrowserURL = "/exemple1/pdw_file_browser/index.php?editor=tinymce&filter=" + type;
     
    tinyMCE.activeEditor.windowManager.open({
        title: "PDW File Browser",
        url: fileBrowserURL,
        width: 950,
        height: 650,
        inline: 0,
        maximizable: 1,
        close_previous: 0
      },{
        window : win,
        input : field_name
      }
    );    
  }
  

  
  </script>


</head>

<body>

<div style="width:30%">
<h1>produit</h1>
  <form id="formID" class="formular" method="post" action="" enctype="multipart/form-data">
    <label for="Description"><span><strong>Nom du produit</strong></span>
      <input class="validate[required] text-input text" type="text" name="Nom" id="Nom" value="<?php echo utf8_encode($row_produits['Nom']) ?>" />
    </label>
	<label for="Description"><span><strong>Description</strong></span>
          <textarea name="Description" class="validate[required] text-input text" id="Description"><?php echo utf8_encode($row_produits['Description']) ?></textarea>
    </label>
    <label for="Prix"><input type="checkbox" name="show_prix" id="show_prix" style="display:inline" <?php if($show_prx) echo 'checked="checked"'; ?> />
    <span><strong>Prix</strong></span>
      <input class="validate[required] text-input text" type="text" name="Prix" id="Prix" value="<?php echo utf8_encode($row_produits['Prix']);?>" />
    </label>
    <label for="Description"><span><strong>Image</strong></span>
      <input class="text-input text" type="File" name="Image" id="Image" />
 	</label>
    <img src="<?php echo $src; ?>" id="preview" style="max-width:100%" />
    <input type="submit" name="save_produit" />
	<input type="hidden" name="action" value="<?php if(isset($_GET['produit']) && !empty($_GET['produit'])){ echo "edit"; }else{ echo "add";}?>"/>

</form>
</div>

<script>
function readURL(input,img) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
				var res=e.target.result;
                    img.attr('src', e.target.result);
				
				}

                reader.readAsDataURL(input.files[0]);
            }
}

$(document).ready(function(){
	$("#Image").change(function(){
		//var id=$(this).parents(".image_box").find("img").attr("id");
    if(navigator.appName=="Microsoft Internet Explorer") {  
		$('#preview').attr("src",this.value);
	}
		readURL(this ,$('#preview'));
		
	});
	$("#show_prix").change(function(){

		if($("#show_prix:checked").length==1){
				$("#Prix").removeAttr("disabled");
		}else{
				$("#Prix").attr("disabled","disabled");
			}
		
		});
		$("#show_prix").change();
	});

</script>			
				
</body>

</html>