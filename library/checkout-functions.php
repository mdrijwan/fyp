<?php
require_once 'config.php';

/*********************************************************
*                 CHECKOUT FUNCTIONS
*********************************************************/
function saveOrder()
{
	$orderId       = 0;
	$shippingCost  =  $_POST['hidShippingAmount'];
	$shippingCharge  =  $_POST['hidServiceCharge'];
		$Shippingfeetoshop  =  $_POST['hidShippingfeetoshop'];
		$SubTotal =  $_POST['hidSubtotal'];
		$TotalAmount =  $_POST['hidTotalAmount'];

// form validation (filed requirement)
	$requiredField = array('hidShippingFirstName', 'hidShippingLastName', 'hidShippingAddress1', 'hidShippingCity', 'hidShippingPostalCode','hidShippingCountry',
						   'hidPaymentFirstName', 'hidPaymentLastName', 'hidPaymentAddress1', 'hidPaymentCity', 'hidPaymentPostalCode','hidPaymentCountry','hidEmail');

	if (checkRequiredPost($requiredField)) {
	    extract($_POST);

	//Convert all customer city name lower cased
	$lowhidShippingFirstName = ucwords($hidShippingFirstName);
	$lowhidShippingLastName  = strtolower($hidShippingLastName);
	// $lowhidShippingNickName  = strtolower($hidShippingNickName);
	$lowhidPaymentFirstName  = strtolower($hidPaymentFirstName);
	$lowhidPaymentLastName   = strtolower($hidPaymentLastName);
	$lowhidShippingCity      = strtolower($hidShippingCity);
	$lowhidPaymentCity       = strtolower($hidPaymentCity);
	$lowhidShippingCountry   = strtolower($hidShippingCountry);
	$lowhidPaymentCountry    = strtolower($hidPaymentCountry);

// customer and city name are properly upper cased
	$hidShippingFirstName = ucwords($lowhidShippingFirstName);
	$hidShippingLastName  = ucfirst($lowhidShippingLastName);
	// $hidShippingNickName  = ucfirst($lowhidShippingNickName);
	$hidPaymentFirstName  = ucfirst($lowhidPaymentFirstName);
	$hidPaymentLastName   = ucfirst($lowhidPaymentLastName);
	$hidShippingCity      = ucfirst($lowhidShippingCity);
	$hidPaymentCity       = ucfirst($lowhidPaymentCity);
	$hidShippingCountry   = ucfirst($lowhidShippingCountry);
	$hidPaymentCountry    = ucfirst($lowhidPaymentCountry);

		$cartContent = getCartContent();
		$numItem     = count($cartContent);

		// save order & get order id
		$sql = "INSERT INTO tbl_order(od_date, od_last_update,od_email, od_shipping_first_name, od_shipping_last_name, od_shipping_nick_name, od_shipping_address1,
		                              od_shipping_address2, od_shipping_phone, od_shipping_state, od_shipping_city, od_shipping_postal_code,od_shipping_country, od_shipping_cost,
																	od_servicecharge,od_shippingtoshop,od_subtotal,od_totalamount, od_payment_first_name, od_payment_last_name, od_payment_address1, od_payment_address2,
									  							od_payment_phone, od_payment_state, od_payment_city, od_payment_postal_code,od_payment_country)
                VALUES (NOW(), NOW(),'$hidEmail', '$hidShippingFirstName', '$hidShippingLastName', '$hidShippingNickName', '$hidShippingAddress1',
				        											'$hidShippingAddress2', '$hidShippingPhone', '$hidShippingState', '$hidShippingCity', '$hidShippingPostalCode',
																			'$hidShippingCountry', '$shippingCost','$shippingCharge','$Shippingfeetoshop','$SubTotal','$TotalAmount',
																			'$hidPaymentFirstName', '$hidPaymentLastName', '$hidPaymentAddress1', '$hidPaymentAddress2', '$hidPaymentPhone',
																			'$hidPaymentState', '$hidPaymentCity', '$hidPaymentPostalCode','$hidPaymentCountry')";
		$result = dbQuery($sql);

		// get the order id
		$orderId = dbInsertId();

		if ($orderId) {
			// save order items
			for ($i = 0; $i < $numItem; $i++) {
				$sql = "INSERT INTO tbl_order_item(od_id, pd_id, od_qty)
						VALUES ($orderId, {$cartContent[$i]['pd_id']}, {$cartContent[$i]['ct_qty']})";
				$result = dbQuery($sql);
			}

			// update product stock
			for ($i = 0; $i < $numItem; $i++) {
				$sql = "UPDATE product_list
				        SET pd_qty = pd_qty - {$cartContent[$i]['ct_qty']}
						WHERE pd_id = {$cartContent[$i]['pd_id']}";
				$result = dbQuery($sql);
			}

			// then remove the ordered items from cart
			for ($i = 0; $i < $numItem; $i++) {
				$sql = "DELETE FROM tbl_cart
				        WHERE ct_id = {$cartContent[$i]['ct_id']}";
				$result = dbQuery($sql);
			}
		}
	}

	return $orderId;
}

function getOrder($orderId) {
	$sql = "SELECT * FROM tbl_order WHERE od_id = $orderId";
	$result = dbQuery($sql);
	$row = dbFetchRow($result);
	return $row;
}

	// Get order total amount ( total purchase + shipping cost )

function getOrderAmount($orderId)
{
	$orderAmount = 0;

	$sql = "SELECT SUM(pd_price * od_qty)
	        FROM tbl_order_item oi,  product_list p
		    WHERE oi.pd_id = p.pd_id and oi.od_id = $orderId

			UNION

			SELECT od_shipping_cost
			FROM tbl_order
			WHERE od_id = $orderId";
	$result = dbQuery($sql);

	if (dbNumRows($result) == 2) {
		$row = dbFetchRow($result);
		$totalPurchase = $row[0];

		$row = dbFetchRow($result);
		$shippingCost = $row[0];

		$sql_data = "
			SELECT od_servicecharge,od_shippingtoshop,od_totalamount,od_subtotal
			FROM tbl_order
			WHERE od_id = $orderId";

			$data=mysql_query($sql_data);
			if (mysql_num_rows($data) == 1){
			 $row_data = mysql_fetch_array($data);
		$Servicecharge = $row_data['od_servicecharge'];
		$Shippingtoshop = $row_data['od_shippingtoshop'];
		$Subtotal = $row_data['od_subtotal'];

		//$orderAmount = $totalPurchase + $shippingCost

		$orderAmount = $Subtotal + $shippingCost + $Servicecharge + $Shippingtoshop;
			}

	}

	return $orderAmount;
}

?>
