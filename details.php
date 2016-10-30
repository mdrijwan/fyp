<?php
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






if (!defined('WEB_ROOT')) {
	exit;
}



$sqldetails = "SELECT pd_id,cat_id, pd_name,pd_code, pd_description, pd_price, pd_qty,pd_weight, pd_image, pd_thumbnail, pd_date,pd_dimension,pd_detaildescription,pd_spec1,pd_spec2
		FROM product_list p WHERE  pd_id = '$pdId'
		ORDER BY pd_id";
		$resultdetails     = mysql_query($sqldetails);

while ($rowdetails = mysql_fetch_assoc($resultdetails ))// start while category main
		{
			extract($rowdetails);

		}

//Get Session ID and Show How many Item Add to Cart

 $sid = session_id();
	$sql4 = "SELECT cart_qty
	        FROM tbl_cart
			WHERE ct_session_id = '$sid'";
				$result4  = mysql_query($sql4);
				$row4 = mysql_fetch_assoc($result4);


?>




<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
  <title>Rijwan Music Store | Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="header_top">
			<div class="logo">
				<a href="#"><img src="images/rmslogo.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">

			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php?action=view" title="View my shopping cart" rel="nofollow">
							<strong class="opencart"> </strong>
								<span class="cart_title">Cart</span>
									<span class="no_product">(<?php if ($row4['cart_qty']>0)echo  @$row4['cart_qty']; else echo "Empty";?>)</span>
							</a>
						</div>
			      </div>
	     <div class="languages">
	    	<div id="language" class="wrapper-dropdown" tabindex="1">EN
						<strong class="opencart"> </strong>
						<ul class="dropdown languges">
							 <li>
							 	<a href="#" title="Français">
									<span><img src="images/gb.png" alt="en" width="26" height="26"></span><span class="lang">English</span>
								</a>
							 </li>

				   </ul>
		     </div>
		     <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});
				}
			}

			$(function() {

				var dd = new DropDown( $('#language') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
		 </div>
			<div class="currency">
					<div id="currency" class="wrapper-dropdown" tabindex="1">RM
						<strong class="opencart"> </strong>
						<ul class="dropdown">
							<li><a href="#"><span>RM</span>MYR</a></li>
							<li><a href="#"><span>€</span>Euro</a></li>
						</ul>
					</div>
					 <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});
				}
			}

			$(function() {

				var dd = new DropDown( $('#currency') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
   </div>
			<div class="clear"></div>
	   </div>
	 <div class="clear"></div>
   </div>
	<div class="menu">
	  <ul id="dc_mega-menu-orange" class="dc_mm-orange">
		 <li><a href="index.php">Home</a></li>
    <li><a href="product.php">Products</a>

    <ul>
         <?php
		while ($row = dbFetchAssoc($result))// start while category main

		{
			extract($row); // this eliminate  hold variable for database data example $group_id=$row["group_id"];
	//Display all group name fetch from database<ul>

		?>
      <li><a href="index.php"><?php echo $group_name ?></a>
        <ul>
           <?php 	 $sql1 = "SELECT cat_id,type_id,type_name,type_description,type_image
	        FROM category_type WHERE type_id = $group_id
			ORDER BY cat_id";
            $result1 = mysql_query($sql1);
			  while ($row1=mysql_fetch_assoc($result1,MYSQL_ASSOC)) // start while drop down
	           {
		        extract($row1);
	           ?>
          <li><a href="index.php<?php echo "?c=$cat_id";  ?>"><?php  echo $type_name; ?></a></li>

            <?php
		       }
            ?>
        </ul>
      </li>
      <?php
		}
    ?>

    </ul>
  </li>
 <li><a href="about.php">About</a></li>
  <li><a href="orderstatus.php">Order Status</a></li>
  <li><a href="faq.php">FAQS</a></li>
  <li><a href="contact.php">Contact</a> </li>
  <div class="clear"></div>
</ul>
</div>
 </div>




 <?php include"productdetails.php" ?>




  <div class="footer">
   	  <div class="wrapper">
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Follow Us</h4>
						<div class="social-icons">

					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							    <!--  <li class="googleplus"><a href="#" target="_blank"> </a></li>-->
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
                                  <br> <br> <br> <br>
						     </ul>
   	 					</div>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why us</h4>
						<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="faq.php">Customer Service</a></li>

						<li><a href="contact.php"><span>Contact Us</span></a></li>

						</ul>


				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Order</h4>
						<ul>

							<li><a href="cart.php?action=view">View Cart</a></li>

							<li><a href="orderstatus.php">Track My Order</a></li>
							<li><a href="faq.php">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
              <li><font color="#CCCCCC">+60-113-9866690</font></li>
							<li><font color="#CCCCCC">+60-123-000000</font></li>
                            <li><font color="#CCCCCC">sales@rms.com</font></li>
						</ul>

				</div>
			</div>
			<div class="copy_right">
				<p>Rijwan Music Store © All rights Reseverd | RMS   </p>
		   </div>
     </div>
    </div>
</body>
</html>
