<?php



$orderId = $_POST['txtOrderID'];

$gettxtFirstName=$_POST['txtFirstName'];

//convert text field to lower case
$lowgettxtFirstName=strtolower($gettxtFirstName);
//convert first character text field to uper case as per database arrangement
$txtFirstName = ucfirst($lowgettxtFirstName);





if(($orderId =="")||($txtFirstName==""))
{echo '<script language="javascript">alert("Form field is empty. Please try again.")</script>;';
echo '<script language="javascript">window.location = "orderstatus.php";</script>';

}

if (!is_numeric($orderId))
{echo '<script language="javascript">alert("Form field must be numeric e.g.1234. Please try again.")</script>;';
echo '<script language="javascript">window.location = "orderstatus.php";</script>';
}


// get ordered items
$sql1 = "SELECT pd_name, pd_price, od_qty,od_id
	    FROM tbl_order_item oi, product_list p
		WHERE oi.pd_id = p.pd_id and oi.od_id = $orderId
		ORDER BY od_id ASC";
		$result = dbQuery($sql1);

$check_user_orderid = mysql_query("SELECT * FROM tbl_order WHERE od_id = '$orderId'") or die(mysql_error());


$check_user_firstname = mysql_query("SELECT od_payment_first_name FROM tbl_order WHERE od_id = '$orderId'") or die(mysql_error());


if((mysql_num_rows($check_user_orderid ) == 0)||(mysql_num_rows($check_user_firstname ) == 0))
{echo '<script language="javascript">alert("payment first name/order ID does not exist. Please try again.")</script>;';
echo '<script language="javascript">window.location = "orderstatus.php";</script>';
}


else{

$get_user_orderID = mysql_fetch_array($check_user_orderid);
$order=$get_user_orderID['od_id'];

$get_user_orderFirstname = mysql_fetch_array($check_user_firstname);

$orderPaymentFirstName=$get_user_orderFirstname['od_payment_first_name'];



if(($order != $orderId)||($orderPaymentFirstName != $txtFirstName)){
	echo '<script language="javascript">alert("This order ID and payment first name does not match.Please try again.")</script>;';


	echo
'<script language="javascript">window.location = "orderstatus.php";</script>';} else{


$orderedItem = array();
while ($row = dbFetchAssoc($result)) {
	$orderedItem[] = $row;
}


// get order information
$sql = "SELECT od_date, od_last_update, od_status, od_shipping_first_name, od_shipping_last_name, od_shipping_address1,
               od_shipping_address2, od_shipping_phone, od_shipping_state, od_shipping_city, od_shipping_postal_code, od_shipping_cost,od_servicecharge,od_shippingtoshop,od_subtotal,od_totalamount,
			   od_payment_first_name, od_payment_last_name, od_payment_address1, od_payment_address2, od_payment_phone,
			   od_payment_state, od_payment_city , od_payment_postal_code,
			   od_memo
	    FROM tbl_order
		WHERE od_id = $orderId";

$result1 = dbQuery($sql);
extract(dbFetchAssoc($result1));

$orderStatus = "$od_status";
$servicecharge = "$od_servicecharge";
$shippingtoshop = "$od_shippingtoshop";
}
}



?>
<p>&nbsp;</p>
<form action="" method="get" name="frmOrder" id="frmOrder">
   Track Your Order


    <table width="550" border="2" bordercolor="#0066FF"  align="center" cellpadding="5" cellspacing="1" class="detailTable">
        <tr>
            <td colspan="2" align="center" id="infoTableHeader"  bgcolor="#CCCCCC">Order Detail</td>
        </tr>
        <tr>
            <td width="150" class="label">Order Number</td>
            <td class="content"><?php echo $orderId; ?></td>
        </tr>
        <tr>
            <td width="150" class="label">Order Date</td>
            <td class="content"><?php echo $od_date; ?></td>
        </tr>
        <tr>
            <td width="150" class="label">Last Update</td>
            <td class="content"><?php echo $od_last_update; ?></td>
        </tr>
        <tr>
            <td class="label">Status</td>
            <td class="content"> <?php echo $orderStatus; ?></td>
        </tr>
    </table>
</form>
<p>&nbsp;</p>
<table width="550" border="2"  bordercolor="#0066FF" align="center" cellpadding="5" cellspacing="1" >
    <tr>
        <td colspan="3" bgcolor="#CCCCCC" align="center">Ordered Item</td>
    </tr>
    <tr align="center" class="label">
        <td>Item</td>
        <td>Unit Price</td>
        <td>Total</td>
    </tr>
    <?php
$numItem  = count($orderedItem);
$subTotal = 0;
for ($i = 0; $i < $numItem; $i++) {
	extract($orderedItem[$i]);
	$subTotal += $pd_price * $od_qty;
?>
    <tr >
        <td><?php echo "$od_qty X $pd_name"; ?></td>
        <td align="right"><?php echo displayAmount($pd_price); ?></td>
        <td align="right"><?php echo displayAmount($od_qty * $pd_price); ?></td>
    </tr>
    <?php
}
?>
    <tr >
        <td colspan="2" align="right">Sub-total</td>
        <td align="right"><?php echo displayAmount($subTotal); ?></td>
    </tr>






    <tr >
        <td colspan="2" align="right">Shipping</td>
        <td align="right"><?php echo displayAmount($od_shipping_cost); ?></td>
    </tr>
















    <tr >
            <td colspan="2" align="right">Shipping Fee to Rijwan Music Store</td>
            <td align="right"><?php $shippingfeetoshop = 25; echo $shippingfeetoshop; ?>

            <input name="hidShippingfeetoshop" type="hidden" id="hidShippingfeetoshop" value="<?php echo $shippingfeetoshop;  ?>">


            </td>
        </tr>

        <tr >
            <td colspan="2" align="right">Service Charge</td>
            <td align="right"><?php $servicecharge = displayservicecharge((5/100)*displayAmount($subTotal)); echo $servicecharge; ?>


             <input name="hidServiceCharge" type="hidden" id="hidServiceCharge" value="<?php echo $servicecharge;  ?>">

            </td>
        </tr>























    <tr >
        <td colspan="2" align="right">Total</td>
        <td align="right"><?php echo displayAmount($od_shipping_cost + $subTotal+$servicecharge+$shippingtoshop); ?></td>
    </tr>
</table>
<p>&nbsp;</p>


  </body>
