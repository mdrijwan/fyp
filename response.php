<?php require_once('Connections/fyp.php'); ?>
<?php require_once('Connections/fyp.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO contact (name, email, mobile, message) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['message'], "text"));

  mysql_select_db($database_fyp, $fyp);
  $Result1 = mysql_query($insertSQL, $fyp) or die(mysql_error());
}

mysql_select_db($database_fyp, $fyp);
$query_Recordset1 = "SELECT * FROM contact";
$Recordset1 = mysql_query($query_Recordset1, $fyp) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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
<!DOCTYPE HTML>
<head>
<title>Rijwan Music Store | Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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
				<a href="index.html"><img src="images/rmslogo.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
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
	     <div class="languages">
	    	<div id="language" class="wrapper-dropdown" tabindex="1">EN
						<strong class="opencart"> </strong>
						<ul class="dropdown languges">
							 <li>
							 	<a href="#" title="English">
									<span><img src="images/gb.png" alt="en" width="26" height="26"></span><span class="lang">English</span>
								</a>
							 </li>
               <li>
                 <a href="#" title="Français">
                   <span><img src="images/au.png" alt="fr" width="26" height="26"></span><span class="lang">Français</span>
                 </a>
               </li>
           <li>
             <a href="#" title="Español">
               <span><img src="images/bm.png" alt="es" width="26" height="26"></span><span class="lang">Español</span>
             </a>
           </li>
               <li>
                 <a href="#" title="Deutsch">
                   <span><img src="images/ck.png" alt="de" width="26" height="26"></span><span class="lang">Deutsch</span>
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
							<li><a href="#"><span>$</span>US Dollar</a></li>
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
           <?php 	 $sql1 = "SELECT cat_id,group_id,type_name,type_description,type_image
	        FROM category_type WHERE group_id = $group_id
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
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
  			</div>
  				<img src="images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
                  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                    <h1>Contact Us</h1>
                    <p>&nbsp;</p>
                    <table align="center">
                      <tr valign="baseline">
                        <td width="55" align="right" nowrap>Name:</td>
                        <td width="281"><input type="text" name="name" value="<?php echo $row_Recordset1['name']; ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Email:</td>
                        <td><input type="text" name="email" value="<?php echo $row_Recordset1['email']; ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td nowrap align="right">Mobile:</td>
                        <td><input type="text" name="mobile" value="<?php echo $row_Recordset1['mobile']; ?>" size="32"></td>
                      </tr>
                      <tr valign="baseline">
                        <td height="129" align="right" nowrap>Message:</td>
                        <td><textarea name="message" cols="40" rows="10"><?php echo $row_Recordset1['message']; ?></textarea></td>
                      </tr>
                      <tr valign="baseline">
                        <td height="24" align="right" nowrap>&nbsp;</td>
                        <td><input type="submit" value="Submit"></td>
                      </tr>
                    </table>
                    <input type="hidden" name="MM_insert" value="form1">
                  </form>
                  <p>&nbsp;</p>
                </div>
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h2>Find Us Here</h2>
					    	  <div class="map">
							   	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4025.41535784084!2d101.5973035910397!3d3.1528819430453403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4edf2f32cba3%3A0x70bf63e3cb62fba!2sPalm+Spring+%40Damansara!5e0!3m2!1sen!2s!4v1477645090087" width="320" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
							  </div>
      				</div>
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>Block E, Palm Spring Condominium</p>
						   		<p>Jalan PJU 3/29, Section 13</p>
                  <p>Kota Damansara, PJ</p>
						   		<p>Selangor, Malaysia</p>
				   		<p>Phone: 60-113-9866690</p>
				   		<p>Fax: 60-123-456789</p>
				 	 	<p>Email: <span>info@rms.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
			      </div>
		  </div>
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
</body>
</html><?php
mysql_free_result($Recordset1);
?>
