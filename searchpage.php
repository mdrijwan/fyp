

<?php
//session_start();
//$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];
 @$getpostSearch=$_POST['searchDB'];


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





<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>Rijwan Music Store | Search</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
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
				<a href="index.php"><img src="images/rmslogo.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form method="post" action="searchpage.php" name="searchform"  id="searchform">
				    	<input type="text" name="searchDB" value="Search for Products by Name or Keyword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Product Name or Keyword';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
							<strong class="opencart"> </strong>
								<span class="cart_title">Cart</span>
									<span class="no_product">(empty)</span>
							</a>
						</div>
			      </div>
	    <div class="languages" title="language">
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
			<div class="currency" title="currency">
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
      <li><a href="product.php"><?php echo $group_name ?></a>
        <ul>
           <?php 	 $sql1 = "SELECT cat_id,group_id,type_name,type_description,type_image
	        FROM category_type WHERE group_id = $group_id
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
      </li>
      <?php
		}
    ?>
    </ul>


  </li>
  <!--<li><a href="products.html">Top Brands</a>
    <ul>
      <li><a href="products.html">Brand Name 1</a></li>
      <li><a href="products.html">Brand Name 2</a></li>
      <li><a href="products.html">Brand Name 3</a></li>
      <li><a href="#">Brand Name 4</a></li>
      <li><a href="#">Brand Name 5</a></li>
      <li><a href="#">Brand Name 6</a></li>
      <li><a href="#">Brand Name 7</a></li>
      <li><a href="#">Brand Name 8</a></li>
      <li><a href="#">Brand Name 9</a></li>
      <li><a href="#">Brand Name 10</a></li>
    </ul>
  </li>-->

  <li><a href="about.php">About</a></li>
   <li><a href="orderstatus.php">Order Status</a></li>
  <li><a href="faq.php">FAQS</a></li>
  <li><a href="contact.php">Contact</a> </li>
  <div class="clear"></div>
</ul>
</div>
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group"></div>
			<div class="section group"></div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider --><!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>
</div>
 <div class="main">
    <div class="content">
    	<div class="content_top">

	      <div class="section group">

 <?php
$productsPerRow = 4;
$productsPerPage = 5;


	$sql='SELECT pd_id,cat_id,pd_name,pd_description, pd_price,pd_image,pd_thumbnail,pd_thumbnail_L,pd_qty ,pd_code,pd_spec1,pd_spec2
	        FROM product_list p WHERE  pd_name  LIKE "%'.$getpostSearch.'%"
			';




$result     = mysql_query(getPagingQuery($sql, $productsPerPage));
$pagingLink = getPagingLink($sql, $productsPerPage, "p=$getpostSearch");
$numProduct = dbNumRows($result);

// the product images are arranged in a table. to make sure
// each image gets equal space set the cell width here

 ?>

<?php
if ($numProduct > 0 ) {

	$i = 0;


while ($row = mysql_fetch_assoc($result))// start while category main
		{
			extract($row);


			if ($i % $productsPerRow == 0)
	          {
?>


<?php	      }//End Total Row to Display Div Grid
?>               <div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php<?php echo "?c=$cat_id&&p=$pd_id";  ?>"><img src="<?php echo   WEB_ROOT . 'images/product/' .$pd_image; ?>" alt="" /></a>
					 <h2><?php echo $pd_name; ?></h2>
					 <p> <?php echo $pd_spec1; ?></p>
					 <p><span class="strike"><?php echo $pd_price; ?></span><span class="price"><?php echo $pd_price; ?></span></p>
					  <div class="button"><span><img src="images/cart.jpg" alt="" /><a href="details.php<?php echo "?c=$cat_id&&p=$pd_id";  ?>" class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="details.php<?php echo "?c=$cat_id&&p=$pd_id";  ?>" class="details">Details</a></span></div>	</div>
<?php
    $i += 1;

		}
		if ($i % $productsPerRow > 0)
		     {
?>

<?php
		     }

}

else {

	echo "No Product in this category";
}
?>



            </div>

            <div class="content_bottom">
    		<div class="heading">
    		<h3>Products</h3>
    		</div>

    		<div class="page-no">

    			<p>Result Pages:<ul>
    				<li><?php echo $pagingLink; ?></li>

    				</ul></p>
    		</div>
    		<div class="clear"></div>
    	</div>



    </div>
 </div>
</div>
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
							<li><font color="#CCCCCC">+60-123-456789</font></li>
							<li><font color="#CCCCCC">+00-123-000000</font></li>
                            <li><font color="#CCCCCC">sales@musicalholicone.com</font></li>
						</ul>

				</div>
			</div>
			<div class="copy_right">
				<p>Compant Name © All rights Reseverd | Musical Shopaholic   </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
	 		};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
							  <script defer src="js/jquery.flexslider.js"></script>
							  <script type="text/javascript">
								$(function(){
								  SyntaxHighlighter.all();
								});
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>
</body>
</html>
