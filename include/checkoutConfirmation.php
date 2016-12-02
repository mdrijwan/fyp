<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
</head>
<body>
<?php
/*
Line 1 : Make sure this file is included instead of requested directly
Line 2 : Check if step is defined and the value is two
Line 3 : The POST request must come from this page but the value of step is one
*/
if (@!defined('WEB_ROOT')
    || !isset($_GET['step']) || (int)$_GET['step'] != 2
	|| $_SERVER['HTTP_REFERER'] != 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?step=1') {
	exit;

}
$errorMessage = '&nbsp;';
/*
 Make sure all the required field exist is $_POST and the value is not empty
 Note: txtShippingAddress2 and txtPaymentAddress2 are optional
*/
$requiredField = array('txtShippingFirstName', 'txtShippingLastName', 'txtShippingAddress1', 'txtShippingPhone', 'txtShippingState',  'txtShippingCity',  'txtShippingPostalCode','txtShippingCountry',
                       'txtPaymentFirstName', 'txtPaymentLastName', 'txtPaymentAddress1', 'txtPaymentPhone', 'txtPaymentState', 'txtPaymentCity','txtPaymentPostalCode','txtPaymentCountry','txtEmail' );

if (!checkRequiredPost($requiredField)) {
	$errorMessage = 'Input not complete';
}


$cartContent = getCartContent();

?>
<?php
$country=$_POST['txtShippingCountry'];  $country= $_POST['txtShippingCountry'];

$sql="SELECT * FROM tbl_shipmentcost WHERE sc_country='$country'";
$result=mysql_query($sql);
$row_result=mysql_num_rows($result);
$rows=mysql_fetch_array($result);
$sc_fwp=$rows['sc_fwp'];
$sc_adp=$rows['sc_adp'];
$sc_set=$rows['sc_set'];
$sc_realweight=$rows['sc_realweight'];

if(($sc_set=="NO" )&&($_POST['optPayment']!="cod")) {
	 header('Location:destination_unavailable.php');  }

	else if($_POST['optPayment']!="cod") {

	  if($sc_fwp==0.00||$sc_adp==0.00 ){
	 header('Location: destination_unavailable.php');  }
	}
?>

<center>
<table width="1150"><tr><td  background="IMGcarts.jpg"> <font color="#000000" size="+1" face="Courier New, Courier, monospace">&nbsp;Order Confirmation</td></tr></table></center>

<table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
    <tr>
        <td>Step 2 Of 3 : Confirm Order </td>
    </tr>
</table>
<p id="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?step=3" method="post" name="frmCheckout" id="frmCheckout">
<?php
if ($_POST['optPayment'] == 'paypal') {
?>
    <table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
        <tr>
            <td align="center"><strong>:: IMPORTANT NOTE :: </strong></td>
        </tr>
        <tr>
            <td><p>After you click on  &quot;Confirm Order&quot; button below,
                    you will be redirect to PayPal website. Login to your PayPal account or <font color="#FF0000">pay with your debit/credit card as a PayPal guest</font>  and complete the checkout process.
                    <br>
                    <br>
                    Email : sales@rms.com <br>
                    <img src="images/rmslogo.jpg" width="150"   />
                     </p>
                </td>
        </tr>
    </table>

<?php
}
?>
    <table width="550" border="0" align="center" cellpadding="5" cellspacing="1" >
        <tr >
            <td colspan="3" bgcolor="#FF6633">Ordered Item</td>
        </tr>
        <tr >
            <td>Item</td>
            <td>Unit Price</td>
            <td>Total (RM)</td>
        </tr>

<?php
$numItem  = count($cartContent);
	$subTotal = 0;
	$subTotal1 = 0;
	for ($i = 0; $i < $numItem; $i++) {
		extract($cartContent[$i]);
		$subTotal += $pd_price * $ct_qty;
		$subTotal1 += $pd_weight * $ct_qty;
?>
        <tr >
            <td ><?php echo "$ct_qty x $pd_name"; ?></td>
            <td align="right"><?php echo displayAmount($pd_price); ?></td>
            <td align="right"><?php echo displayAmount($ct_qty * $pd_price); ?></td>
        </tr>
        <?php
}
?>
        <tr >
            <td colspan="2" align="right">Sub-total</td>
            <td align="right"><?php echo displayAmount($subTotal); ?>

               <input name="hidSubtotal" type="hidden" id="hidSubtotal" value="<?php echo displayAmount($subTotal);  ?>">

            </td>
        </tr>

        <tr >
            <td colspan="2" align="right">Shipping Fee to Rijwan Music Store</td>
            <td align="right"><?php $shippingfeetoshop = 22; echo $shippingfeetoshop; ?>

            <input name="hidShippingfeetoshop" type="hidden" id="hidShippingfeetoshop" value="<?php echo $shippingfeetoshop;  ?>">

            </td>
        </tr>

        <tr >
            <td colspan="2" align="right">Service Charge</td>
            <td align="right"><?php $servicecharge = displayservicecharge((3/100)*displayAmount($subTotal)); echo $servicecharge; ?>

             <input name="hidServiceCharge" type="hidden" id="hidServiceCharge" value="<?php echo $servicecharge;  ?>">

            </td>
        </tr>

        <tr >
            <td colspan="2" align="right"><table width="100%" ><tr><td align="left"><?php echo displayWeight($subTotal1); ?>
            </td><td align="right">Shipping Charge</font></td></tr></table></td>
            <td align="right"><?php  $total_weight=displayTotalWeight($subTotal1);

$total_shipping_price=displaytotalshippingprice(($sc_fwp+(($sc_adp/$sc_realweight)*$total_weight)));
echo displayAmount($total_shipping_price);
?>
<input name="hidShippingAmount" type="hidden" id="hidShippingAmount" value="<?php $shippingamount1=displayAmountOnly($total_shipping_price);echo $shippingamount1  ?>">

</td>
        </tr>

        <tr >
            <td colspan="2" align="right">Total</td>
            <td align="right"><?php $shippingamount=displayAmount($total_shipping_price + $subTotal + $shippingfeetoshop + $servicecharge);  echo$shippingamount; ?>

            <input name="hidTotalAmount" type="hidden" id="hidTotalAmount" value="<?php echo $shippingamount;  ?>">

            </td>
        </tr>
    </table>

    <table width="550" border="0" align="center" cellpadding="5" cellspacing="1" >

     <tr>
            <td width="150" >Your Contact  Email</td>
            <td ><?php echo $_POST['txtEmail']; ?>
           <font color="#0000FF"> <input name="hidEmail" type="hidden" id="hidEmail" value="<?php echo $_POST['txtEmail']; ?>">
           </font></td>
        </tr>

        <tr >
            <td colspan="2" bgcolor="#FF6633"><br />Shipping Information</td>
        </tr>
        <tr>
            <td width="150">First Name</td>
            <td class="content"><?php echo $_POST['txtShippingFirstName']; ?>
                <input name="hidShippingFirstName" type="hidden" id="hidShippingFirstName" value="<?php echo $_POST['txtShippingFirstName']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Last Name</td>
            <td class="content"><?php echo $_POST['txtShippingLastName']; ?>
                <input name="hidShippingLastName" type="hidden" id="hidShippingLastName" value="<?php echo $_POST['txtShippingLastName']; ?>"></td>
        </tr>
        <!-- <tr>
            <td width="150">Nick Name</td>
            <td class="content"><?php echo $_POST['txtShippingNickName']; ?>
                <input name="hidShippingNickName" type="hidden" id="hidShippingNickName" value="<?php echo $_POST['txtShippingNickName']; ?>"></td>
        </tr> -->
        <tr>
            <td width="150" class="label">Address1</td>
            <td class="content"><?php echo $_POST['txtShippingAddress1']; ?>
                <input name="hidShippingAddress1" type="hidden" id="hidShippingAddress1" value="<?php echo $_POST['txtShippingAddress1']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Address2</td>
            <td class="content"><?php echo $_POST['txtShippingAddress2']; ?>
                <input name="hidShippingAddress2" type="hidden" id="hidShippingAddress2" value="<?php echo $_POST['txtShippingAddress2']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Phone Number</td>
            <td class="content"><?php echo $_POST['txtShippingPhone'];  ?>
                <input name="hidShippingPhone" type="hidden" id="hidShippingPhone" value="<?php echo $_POST['txtShippingPhone']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Province / State</td>
            <td class="content"><?php echo $_POST['txtShippingState']; ?> <input name="hidShippingState" type="hidden" id="hidShippingState" value="<?php echo $_POST['txtShippingState']; ?>" ></td>
        </tr>
        <tr>
            <td width="150" class="label">City</td>
            <td class="content"><?php echo $_POST['txtShippingCity']; ?>
                <input name="hidShippingCity" type="hidden" id="hidShippingCity" value="<?php echo $_POST['txtShippingCity']; ?>" ></td>
        </tr>
        <tr>
            <td width="150" class="label">Country</td>
            <td class="content"><?php echo $_POST['txtShippingCountry']; ?>
              <input name="hidShippingCountry" type="hidden" id="hidShippingCountry" value="<?php echo $_POST['txtShippingCountry']; ?>" ></td>
        </tr>
        <tr>
            <td width="150" class="label">Postal Code</td>
            <td class="content"><?php echo $_POST['txtShippingPostalCode']; ?>
                <input name="hidShippingPostalCode" type="hidden" id="hidShippingPostalCode" value="<?php echo $_POST['txtShippingPostalCode']; ?>"></td>
        </tr>
    </table>

    <table width="550" border="0" align="center" cellpadding="5" cellspacing="1" >
        <tr >
            <td colspan="2" bgcolor="#FF6633">Payment Information</td>
        </tr>
        <tr>
            <td width="150" class="label">First Name</td>
            <td class="content"><?php echo $_POST['txtPaymentFirstName']; ?>
                <input name="hidPaymentFirstName" type="hidden" id="hidPaymentFirstName" value="<?php echo $_POST['txtPaymentFirstName']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Last Name</td>
            <td class="content"><?php echo $_POST['txtPaymentLastName']; ?>
                <input name="hidPaymentLastName" type="hidden" id="hidPaymentLastName" value="<?php echo $_POST['txtPaymentLastName']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Address1</td>
            <td class="content"><?php echo $_POST['txtPaymentAddress1']; ?>
                <input name="hidPaymentAddress1" type="hidden" id="hidPaymentAddress1" value="<?php echo $_POST['txtPaymentAddress1']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Address2</td>
            <td class="content"><?php echo $_POST['txtPaymentAddress2']; ?> <input name="hidPaymentAddress2" type="hidden" id="hidPaymentAddress2" value="<?php echo $_POST['txtPaymentAddress2']; ?>">
            </td>
        </tr>
        <tr>
            <td width="150" class="label">Phone Number</td>
            <td class="content"><?php echo $_POST['txtPaymentPhone'];  ?> <input name="hidPaymentPhone" type="hidden" id="hidPaymentPhone" value="<?php echo $_POST['txtPaymentPhone']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Province / State</td>
            <td class="content"><?php echo $_POST['txtPaymentState']; ?> <input name="hidPaymentState" type="hidden" id="hidPaymentState" value="<?php echo $_POST['txtPaymentState']; ?>" ></td>
        </tr>
        <tr>
            <td width="150" class="label">City</td>
            <td class="content"><?php echo $_POST['txtPaymentCity']; ?>
                <input name="hidPaymentCity" type="hidden" id="hidPaymentCity" value="<?php echo $_POST['txtPaymentCity']; ?>"></td>
        </tr>

        <tr>
            <td width="150" class="label">Country</td>
            <td class="content"><?php echo $_POST['txtPaymentCountry']; ?>
            <input name="hidPaymentCountry" type="hidden" id="hidPaymentCountry" value="<?php echo $_POST['txtPaymentCountry']; ?>"></td>
        </tr>
        <tr>
            <td width="150" class="label">Postal Code</td>
            <td class="content"><?php echo $_POST['txtPaymentPostalCode']; ?>
                <input name="hidPaymentPostalCode" type="hidden" id="hidPaymentPostalCode" value="<?php echo $_POST['txtPaymentPostalCode']; ?>"></td>
        </tr>
    </table>

    <table width="550" border="0" align="center" cellpadding="5" cellspacing="1" class="infoTable">
      <tr>
        <td width="150" class="infoTableHeader">Payment Method </td>
        <td class="content"><?php echo $_POST['optPayment'] == 'paypal' ? 'Paypal' : 'Cash on Delivery'; ?>
          <input name="hidPaymentMethod" type="hidden" id="hidPaymentMethod" value="<?php echo $_POST['optPayment']; ?>"   />

       </tr>

       <tr>
         <td><img src="images/IMGPAYMENTCHECK.jpg"></td>
         <td><img src="images/cod.jpg" style="width: 210px;"></td>
       </tr>

    </table>
    <p>&nbsp;</p>
    <p align="center">
        <input name="btnBack" type="button" id="btnBack" value="&lt;&lt; Modify Shipping/Payment Info" onClick="window.location.href='checkout.php?step=1';" class="box">
        &nbsp;&nbsp;
        <input name="btnConfirm" type="submit" id="btnConfirm" value="Confirm Order &gt;&gt;" class="box">
</form>
<p>&nbsp;</p>

</body>
</html>
