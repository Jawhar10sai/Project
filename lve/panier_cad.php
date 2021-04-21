<?php
session_start();
if (isset($_POST["products"])) {
    $_SESSION["cat_products_".$_POST["idsite"]] = explode(',', $_POST["products"]);
    $_SESSION["cat_prices_".$_POST["idsite"]] = explode(',', $_POST["prices"]);
    $_SESSION["cat_productsName_".$_POST["idsite"]] = explode(',', $_POST["productsName"]);
    $_SESSION["cat_quantity_".$_POST["idsite"]] = explode(',', $_POST["quantity"]);
    $_SESSION["cat_total_".$_POST["idsite"]] = $_POST["total"];
    $_SESSION["pic_".$_POST["idsite"]] = explode(',', $_POST["productsPic"]);
}
$quantity = $_SESSION["cat_quantity_".$idsite];
$products = $_SESSION["cat_products_".$idsite];
$prices = $_SESSION["cat_prices_".$idsite];
$productsName = $_SESSION["cat_productsName_".$idsite];
$productsPic = $_SESSION["pic_".$idsite];
$total = $_SESSION["cat_total_".$idsite];
if (!isset($total)) {
    $nbrP = 0;
    $total = 0;
}
if(count($products)==1 && $products[0]==''){
    $products=NULL;
}
$nbrP = count($products);
echo '<div id="globalPanierCad" style="display:none" title="Ma Sélection">';
?>
<div id="left_bar_cad"> 
    <form action="#" id="cart_form_cad" name="cart_form">

        <div class="cart-info">
            <?php
            $i = 0;
            if (isset($products)) {
                foreach ($products as $product) {
                        echo "<div class='shopp' id='each-$product'> 
						<div id='img_shop'><img width='50' src='".$productsPic[$i]."'></div>
                <div class='label'>
             ".stripslashes($productsName[$i])."
                </div>
                 <div id='shopp-quantity'>Quantité : <span class='shopp-quantity'>$quantity[$i]</span></div>
                <div class='shopp-price'>
                    <em>$prices[$i]</em> ".$Devise."
                </div>
				<a rel='nofollow' class='cart_quantity_delete remove_cad' href='#' style='float:right; margin-top:-4px'> X </a>
                <br class='all'>
            </div>";
                   
                    $i++;
                }
            }
            ?>
        </div>
        <div class="cart-total">
            <?php
            echo "<b>Total Charges :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span>$total</span> ".$Devise."

            <input type='hidden' name='total-hidden-charges' id='total-hidden-charges' value=$total />";
            ?>
        </div>
<input class="Paiement send" type="button" id="open_panier" value="Commander">
<input class="devise_catalogue" type="hidden" id="devise_catalogue" value="Points">
<input class="idsite_catalogue" type="hidden" id="idsite_catalogue" value="<?php echo $idsite; ?>">

    </form>
</div>
</div>
<script language="javascript">
	$(document).ready(function(){
	$("#open_panier").click(function(){
		
		document.location.href="<?php echo SITEPATH.get_name_page($idsite,$id_page); ?><?php echo $lien_plus; ?>&panier2";
		/* if ($('.shopp').length > 0 ) {
	$("#detail_panier").dialog('open');
		 }*/
	});	
});	
</script>