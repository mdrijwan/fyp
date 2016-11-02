

<?php
//session_start();
//$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];


require_once 'library/config.php';
require_once 'library/group-function.php';
require_once 'library/common.php';

require_once 'library/cart-functions.php';


 $_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];
$catId  = (isset($_GET['c']) && $_GET['c'] != '') ? $_GET['c'] : 0;
$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;
$edId   = (isset($_GET['e']) && $_GET['e'] != '') ? $_GET['e'] : 0;
$tdId   = (isset($_GET['t']) && $_GET['t'] != '') ? $_GET['t'] : 0;
$seId   = (isset($_GET['s']) && $_GET['s'] != '') ? $_GET['s'] : 0;
$veriuser = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : 0;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>





 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="product.php">Product</a> >> <a href="#">Product Details</a></p>
    	    </div>
    		
    
    		
    		
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
                    
                    
						<img src="<?php echo   WEB_ROOT.'images/product/'.$pd_image; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $pd_name;  ?> </h2>
					<p><?php echo $pd_spec1; ?></p>					
					<div class="price">
						<p>Price: <span>RM: <?php echo$pd_price; ?></span></p>
					</div>
					<div class="available">
						<p>Available Options :</p>
					<ul>
                    
                    
                    
                    <Form name ="form1" Method ="POST" Action ="">

                    
						
						<li>Quality:<select name="Qty">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
                            <option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
						</select></li>
                       
                    
					</ul>
					</div>
					<div class="share">
						<p>Share Product :</p>
						<ul>
					    	<li><a href="#"><img src="images/youtube.png" alt=""></a></li>
					    	<li><a href="#"><img src="images/facebook.png" alt=""></a></li>
					    	<li><a href="#"><img src="images/twitter.png" alt=""></a></li>
					    	<li><a href="#"><img src="images/linkedin.png" alt=""></a></li>
			    		</ul>
					</div>
				<div class="add-cart">
					<!--<div class="rating">
						<p>Rating:<img src="images/rating.png"><span>[3 of 5 Stars]</span></p>
					</div>-->
					<div class="button">     <input type="submit" name="Submit" class="btn-style" value="Add to Cart" />
                    </div>
               
                  
</FORM>
					<div class="clear"></div>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $pd_description; ?></p>
	    </div>
   	  </div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					   <ul>
           <?php 	 $sql1 = "SELECT cat_id,group_id,type_name,type_description,type_image 
	        FROM category_type 
			ORDER BY cat_id";
            $result1 = mysql_query($sql1);
			  while ($row1=mysql_fetch_assoc($result1,MYSQL_ASSOC)) // start while drop down
	           {
		        extract($row1);
	           ?>
          <li><a href="product.php<?php echo "?c=$cat_id";  ?>"><?php  echo $type_name; ?></a></li>
   
            <?php
		       }
            ?>
        </ul>
				</div>
 		</div>
 	</div>
	</div>
</div>
















<?php



if (!defined('WEB_ROOT')) {
	exit;
}
// current session id
	$sid = session_id();					
	$sql4 = "SELECT cart_qty
	        FROM tbl_cart
			WHERE ct_session_id = '$sid'";
				$result4  = mysql_query($sql4);	
				$row4 = mysql_fetch_assoc($result4);
				 echo $row4['cart_qty'];
				
		 // $url2   =  "cart.php". "?action=view";
		 


$sqldetails = "SELECT pd_id,cat_id, pd_name,pd_code, pd_description, pd_price, pd_qty,pd_weight, pd_image, pd_thumbnail, pd_date,pd_dimension,pd_detaildescription,pd_spec1,pd_spec2
		FROM product_list p WHERE  pd_id = '$pdId'	
		ORDER BY pd_id";
		$resultdetails     = mysql_query($sqldetails);

while ($rowdetails = mysql_fetch_assoc($resultdetails ))// start while category main
		{
			extract($rowdetails);
			
		}

		if ($pd_qty > 0) {
	
@$ItemQuantity=$_POST["Qty"]; 

// command to add to cart

if ( isset( $_POST['Submit'])&&isset($_POST["Qty"] ) ) { 
			
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
	
	if (mysql_num_rows($result) != 1) {
		// the product doesn't exist
		//header('Location: cart.php');
	} else {
		// how many of this product we
		// have in stock
		$row = mysql_fetch_assoc($result);
		$currentStock = $row['pd_qty'];
		$currentweight = $row['pd_weight'];

		if ($currentStock == 0) {
			// we no longer have this product in stock
			// show the error message
			echo ('The product you requested is no longer in //stock');
			//header('Location: cart.php');
			//exit;
		}
	
	}
	
	// check if the product is already
	// in cart table for this session
	$sql = "SELECT pd_id
	        FROM tbl_cart
			WHERE pd_id = $productId AND ct_session_id = '$sid'";
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result) == 0) {
		// put the product in cart table
		$sql = "INSERT INTO tbl_cart (pd_id, ct_qty,ct_weight, ct_session_id, ct_date)
				VALUES ($productId, 1,$currentweight, '$sid', NOW())";

		$result = mysql_query($sql);
	} else {
		// update product quantity in cart table
		$sql = "UPDATE tbl_cart 
		        SET ct_qty = ct_qty + $ItemQuantity 
				WHERE ct_session_id = '$sid' AND pd_id = $productId";	
				//This "ct_qty = ct_qty + $ItemQuantity" Add item quantity get from form to current quantity example  ct_qty = ct_qty + 1 or $ItemQuantity"	
				
		$result = mysql_query($sql);	
		
		$sql1 = "UPDATE tbl_cart 
		        SET ct_weight = ct_weight + $currentweight
				WHERE ct_session_id = '$sid' AND pd_id = $productId";		

		$result1 = mysql_query($sql1);	
	}	
	
	// an extra job for us here is to remove abandoned carts.
	// right now the best option is to call this function here
	
	
	
		$sql2 = "SELECT ct_qty,cart_qty
	        FROM tbl_cart
			WHERE ct_session_id = '$sid'";
				$result2  = mysql_query($sql2);
				

	while ($row2 = mysql_fetch_assoc($result2))// start while
		{
			extract($row2);
			
			@$cartqty=$cartqty+$ct_qty;
		
		}
		
	
		
		$sql3 = "UPDATE tbl_cart 
		        SET cart_qty = '$cartqty'
				WHERE ct_session_id = '$sid'";
				$result3 = mysql_query($sql3);
			
				
	
			
}

?>


<?php

} 

else {
	echo 'Out Of Stock';
}
?>






















</body>
</html>