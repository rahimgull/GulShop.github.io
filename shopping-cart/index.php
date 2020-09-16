<?php
session_start();
include("functions/functions.php");
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["qty"])) {
			$productByname = $db_handle->runQuery("SELECT * FROM products WHERE product_name='" . $_GET["product_name"] . "'");
			$itemArray = array($productByname[0]["product_name"]=>array('product_name'=>$productByname[0]["product_name"], 'product_keywords'=>$productByname[0]["product_keywords"], 'qty'=>$_POST["qty"], 'product_price'=>$productByname[0]["product_price"], 'product_image'=>$productByname[0]["product_image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByname[0]["product_name"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByname[0]["product_keywords"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["qty"])) {
									$_SESSION["cart_item"][$k]["qty"] = 0;
								}
								$_SESSION["cart_item"][$k]["qty"] += $_POST["qty"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["product_name"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style1.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	

<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>

<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	


<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["qty"]*$item["product_price"];
		?>
				<tr>
				<td><img src="<?php echo $item["product_image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
				<td><?php echo $item["product_name"]; ?></td>
				<td style="text-align:right;"><?php echo $item["qty"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["product_price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&product_name=<?php echo $item["product_name"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["qty"];
				$total_price += ($item["product_price"]*$item["qty"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY product_id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
	
		<div class="product-item">
			<form method="post" action="index.php?action=add&product_name=<?php echo $product_array[$key]["product_name"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["product_image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["product_name"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["product_price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="qty" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>





</div>
</BODY>
</HTML>