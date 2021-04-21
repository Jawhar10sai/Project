<?php
session_start();
if(isset($_POST['idsite'])){
 include("config/connect.php");
 include("functions/reglages.php"); 
 include("functions/function.php"); 
	$idsite = $_POST['idsite'];
	}

if (isset($_POST["action"]) && $_POST["action"] == 'remove') {
	
	$elem = $_POST["elem"];
	
	$total = $_SESSION["total_".$_POST["idsite"]] - ($_SESSION["prices_".$_POST["idsite"]][$elem]*$_SESSION["quantity_".$_POST["idsite"]][$elem]);
	
unset($_SESSION["products_".$_POST["idsite"]][$elem]);
unset($_SESSION["prices_".$_POST["idsite"]][$elem]);
unset($_SESSION["productsName_".$_POST["idsite"]][$elem]);
unset($_SESSION["quantity_".$_POST["idsite"]][$elem]);
unset($_SESSION["pic_".$_POST["idsite"]][$elem]);

$_SESSION["products_".$_POST["idsite"]] = array_values($_SESSION["products_".$_POST["idsite"]]);
$_SESSION["prices_".$_POST["idsite"]] = array_values($_SESSION["prices_".$_POST["idsite"]]);
$_SESSION["productsName_".$_POST["idsite"]] = array_values($_SESSION["productsName_".$_POST["idsite"]]);
$_SESSION["quantity_".$_POST["idsite"]] = array_values($_SESSION["quantity_".$_POST["idsite"]]);
$_SESSION["pic_".$_POST["idsite"]] = array_values($_SESSION["pic_".$_POST["idsite"]]);


echo $_SESSION["total_".$_POST["idsite"]] = $total;

//var_dump($_SESSION["products_".$_POST["idsite"]]);
exit();	
}

if (isset($_POST["products"])) {
    $_SESSION["products_".$_POST["idsite"]] = explode(',', $_POST["products"]);
    $_SESSION["prices_".$_POST["idsite"]] = explode(',', $_POST["prices"]);
    $_SESSION["productsName_".$_POST["idsite"]] = explode(',', $_POST["productsName"]);
    $_SESSION["quantity_".$_POST["idsite"]] = explode(',', $_POST["quantity"]);
    $_SESSION["pic_".$_POST["idsite"]] = explode(',', $_POST["productsPic"]);
    $_SESSION["total_".$_POST["idsite"]] = $_POST["total"];
}





$quantity = $_SESSION["quantity_".$idsite];
$products = $_SESSION["products_".$idsite];
$prices = $_SESSION["prices_".$idsite];
$productsName = $_SESSION["productsName_".$idsite];
$productsPic = $_SESSION["pic_".$idsite];
$total = $_SESSION["total_".$idsite];
//var_dump($products);
if (!isset($total) || $total == 'NaN') {
    $nbrP = 0;
    $total = 0;
}
if(count($products)==1 && $products[0]==''){
    $products=NULL;
}
$nbrP = count($products);
if($nbrP < 1 && isset($_POST['idsite']) && $_POST['action'] != 'panierVide'){
	echo "0";
	exit();
	}

$req_devise = "SELECT devise FROM site where id_site='".$idsite."'";
	$param_devise  = mysql_query($req_devise ,$connect);
	$row_param_devise  = mysql_fetch_assoc($param_devise);
	$Devise = $row_param_devise['devise'];



echo '<div id="littlePanier"><img src="../images/bg_panier.png"></div>';
?>
<div id="left_bar"> 
<div id="title_left_bar"><span class="icone_title"><img src="../images/bg_title_panier.png" width="25" height="21" /></span> Mon panier <span class="count_title">(<?php echo $nbrP; ?>)</span></div>
<form action="#" id="cart_form" name="cart_form">

        <div class="cart-info">
            <?php
            $i = 0;
            if (isset($products)) {
                foreach ($products as $product) {
					
                        echo "<div class='shopp' id='each-$product'> 
						<div id='img_shop'><img width='50' src='".$productsPic[$i]."'></div>
                <div class='label'>
             ".$productsName[$i]."
                </div>
                 <div id='shopp-quantity'>Quantité : <span class='shopp-quantity'>$quantity[$i]</span></div>
                <div class='shopp-price'>
                    <em>$prices[$i]</em> ".$Devise."
                </div>
				<a rel='nofollow' class='cart_quantity_delete remove' href='#' style='float:right; margin-top:-4px'> X </a>
                <br class='all'>
            </div>";
                   
                    $i++;
                }
            }
            ?>
        </div>
        <div class="cart-total" style="display:none">
            <?php
            echo "<b>Total Charges :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span>$total</span> ".$Devise."

            <input type='hidden' name='total-hidden-charges' id='total-hidden-charges' value=$total />";
            ?>
        </div>
        
        <?php $page_panier = "SELECT c.id_page FROM pages p,contenu c where p.id_site = '".$idsite."' AND c.id_page = p.id AND c.type = 'Panier' LIMIT 1";
	$req_page_panier  = mysql_query($page_panier ,$connect);
	$raw_page_panier = mysql_fetch_array($req_page_panier);
	$num_page_panier = mysql_num_rows($req_page_panier);
	if($num_page_panier > 0){
	$lien_panier = SITEPATH.get_name_page($idsite,$raw_page_panier['id_page'])
	
	?>
<input class="Paiement send" type="button" id="open_panier" value="Voir mon panier">
<input class="devise_catalogue" type="hidden" id="devise_catalogue" value="<?php echo $Devise; ?>">
<input class="idsite_catalogue" type="hidden" id="idsite_catalogue" value="<?php echo $idsite; ?>">
<?php } ?>
    </form>
</div>
<script language="javascript">
	$(document).ready(function(){
	$("#open_panier").click(function(){
		
		document.location.href="<?php echo $lien_panier; ?><?php echo $lien_plus; ?>";
		/* if ($('.shopp').length > 0 ) {
	$("#detail_panier").dialog('open');
		 }*/
	});	
		


});	
</script>