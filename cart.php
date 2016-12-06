<?php
//session_start();
//$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];
require_once 'library/config.php';
require_once 'library/cart-functions.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">

</head>
<body id="top">

<?php
require_once 'library/config.php';
require_once 'library/cart-functions.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != '') ? $_REQUEST['action'] : 'view';

switch ($action) {
	case 'add' :
		addToCart();
		break;
	case 'update' :
		updateCart();
		break;
	case 'lineupdate' :
		lineupdateCart();
		break;
	case 'delete' :
		deleteFromCart();
		break;
	case 'view' :
}

$cartContent = getCartContent();
$numItem = count($cartContent);
$pageTitle = 'Shopping Cart';
// show the error message ( if we have any )
displayError();

if ($numItem > 0 ) {
?>
<form action="<?php echo $_SERVER['PHP_SELF'] . "?action=update"; ?>" method="post" name="frmCart"

id="frmCart" enctype="application/x-www-form-urlencoded">
<center>
<table width="1150"><tr><td  background="IMGcarts.jpg"> <font color="#000000" size="+1" face="Courier New,

Courier, monospace"> <font color="#000099"><b>Cart</b></font> </td></tr></table></center>

</br></br>

 <table width="780" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr >
   <td colspan="2" align="center"  bgcolor="#FFCCCC">Item</td>
   <td align="center" bgcolor="#FFCCCC">Unit Price (RM) </td>
   <td width="75" align="center"  bgcolor="#FFCCCC">Quantity </td>
   <td align="center" bgcolor="#0099FF">Total (RM)</td>
  <td width="75" align="center" bgcolor="#0033FF">&nbsp;</td>

 </tr>

<?php
	$subTotal = 0;
	$subTotal1 = 0;



	for ($i = 0; $i < $numItem; $i++) {
		extract($cartContent[$i]);
		$pd_name = "$ct_qty x $pd_name";

		$productUrl = "details.php?c=$cat_id&&p=$pd_id"; 
		$subTotal += $pd_price * $ct_qty;
		$subTotal1 += $pd_weight * $ct_qty;

		//echo   $stall[$i]=$pd_id;
		//echo   $stallC[$i]=$ct_id;

?>
 <tr >
  <td width="80" align="center"><a href="<?php //echo $productUrl; ?>"><img src="<?php echo $pd_thumbnail;

?>" border="0"></a></td>
  <td><a href="<?php echo $productUrl; ?>"  title="Click  to view product details" ><?php echo $pd_name; ?></a></td>
   <td align="right"><?php echo displayAmount($pd_price); ?></td>
 <td width="75">
<input name="txtQty[]" type="text" id="txtQty[]" size="5" value="<?php echo $ct_qty; ?>" class="box" onKeyUp="checkNumber(this);">
  <input name="hidCartId[]" type="hidden" value="<?php echo $ct_id; ?>">
  <input name="hidProductId[]" type="hidden" value="<?php echo $pd_id; ?>">
  </td>


 <!--
 <input name="txtQty" type="text" id="txtQty" size="5" value="<?php echo $ct_qty; ?>" class="box" onKeyUp="checkNumber(this);">

  <input name="hidCartId" type="hidden" value="<?php echo $ct_id; ?>">

  <input name="hidProductId" type="hidden" value="<?php echo $pd_id; ?>">
  <?php $cid=$ct_id;   ;?>

  </td>
  -->

  <td align="right"><b> <?php echo displayAmount($pd_price * $ct_qty); ?> </b></td>
  <td width="75" align="center"> <input name="btnDelete" type="button" id="btnDelete" value="Delete"

onClick="window.location.href='<?php echo $_SERVER['PHP_SELF'] . "?action=delete&cid=$ct_id"; ?>';"
class="box">

  </td>

 </tr>
 <?php

}

?>
 <tr >
  <td colspan="4" align="right"> <font face="Times New Roman, Times, serif" size="3" color="#000000">
		Sub-total</font></td>
  <td align="right"><b><?php echo displayAmount($subTotal); ?></b></td>
  <td width="75" align="center">&nbsp;</td>
 </tr>
<tr >
   <td colspan="4" align="right"><font face="Times New Roman, Times, serif" size="3"

color="#000000">Shipping </font> </td>
  <td align="right"><b><?php echo displayAmount($shopConfig['shippingCost']); ?></b></td>
  <td width="75" align="center">&nbsp;</td>
 </tr>
<tr>
   <td colspan="4" align="right"><font face="Times New Roman, Times, serif" size="5" > Estimated Order

Total</font>  </td>
  <td align="right"><font face="Trebuchet MS, Arial, Helvetica, sans-serif" size="4" ><?php echo

displayAmount($subTotal + $shopConfig['shippingCost']); ?> </font></td>
  <td width="75" align="center"><font face="Trebuchet MS, Arial, Helvetica, sans-serif" size="4" ><?php

echo displayWeight($subTotal1);


 ?> </font></td>

 </tr>
 <tr >
  <td colspan="5" align="right">&nbsp;</td>
  <td width="75" align="center">
<input name="btnUpdate" type="submit" id="btnUpdate" value="Update Cart"  class="box"></td>
 </tr>
</table>
</form>
<?php
} else {

?>
<p>&nbsp;</p><table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
 <tr>
  <td><p align="center">You shopping cart is empty</p>
   <p>If you find you are unable to add anything to your cart, please ensure that
    your internet browser has cookies enabled and that any other security software
    is not blocking your shopping session.</p></td>
 </tr>
</table>
<?php
}

$shoppingReturnUrl = isset($_SESSION['shop_return_url']) ? $_SESSION['shop_return_url'] : 'index.php';
?>
<table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
 <tr align="center">
  <td><input name="btnContinue" type="button" id="btnContinue" value="&lt;&lt; Continue Shopping"

onClick="window.location.href='product.php';" class="box"></td>
<?php
if ($numItem > 0) {
?>
  <td><input name="btnCheckout" type="button" id="btnCheckout" value="Proceed To Checkout &gt;&gt;"

onClick="window.location.href='checkout.php?step=1';" class="box"></td>
<?php
}
?>
 </tr>
</table>

</body>
</html>
