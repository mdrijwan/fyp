<?php
require_once 'config.php';

/*********************************************************
*                 SHOPPING CART FUNCTIONS 
*********************************************************/
		

// make sure the product id exist
	if (isset($_GET['p']) && (int)$_GET['p'] > 0) {
		$productId = (int)$_GET['p'];
	} else {
		echo"error";
		//header('Location: index.php');
	}
	
	// does the product exist ?
	$sql = "SELECT pd_id, pd_qty,pd_weight
	        FROM product_list
			WHERE pd_id = $productId";
	$result = mysql_query($sql);
	
	if (dbNumRows($result) != 1) {
		// the product doesn't exist
		header('Location: cart.php');
	} else {
		// how many of this product we
		// have in stock
		$row = dbFetchAssoc($result);
		$currentStock = $row['pd_qty'];
		$currentweight = $row['pd_weight'];

		if ($currentStock == 0) {
			// we no longer have this product in stock
			// show the error message
			setError('The product you requested is no longer in stock');
			header('Location: cart.php');
			exit;
		}

	}		
	
	// current session id
	$sid = session_id();
	
	// check if the product is already
	// in cart table for this session
	$sql = "SELECT pd_id
	        FROM tbl_cart
			WHERE pd_id = $productId AND ct_session_id = '$sid'";
	$result = mysql_query($sql);
	
	if (dbNumRows($result) == 0) {
		// put the product in cart table
		$sql = "INSERT INTO tbl_cart (pd_id, ct_qty,ct_weight, ct_session_id, ct_date)
				VALUES ($productId, 1,$currentweight, '$sid', NOW())";
		$result = mysql_query($sql);
	} else {
		// update product quantity in cart table
		$sql = "UPDATE tbl_cart 
		        SET ct_qty = ct_qty + 1
				WHERE ct_session_id = '$sid' AND pd_id = $productId";		
				
		$result = mysql_query($sql);	
		
		$sql1 = "UPDATE tbl_cart 
		        SET ct_weight = ct_weight + $currentweight
				WHERE ct_session_id = '$sid' AND pd_id = $productId";		
				
		$result1 = mysql_query($sql1);	
	}	
	
	// an extra job for us here is to remove abandoned carts.
	// right now the best option is to call this function here
	deleteAbandonedCart();
	
	header('Location: ' . $_SESSION['shop_return_url']);
	
	?>