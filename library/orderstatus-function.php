

<?php
//session_start();
//$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];

require_once 'library/config.php';
require_once 'library/group-function.php';
require_once 'library/common.php';
require_once 'library/cart-functions.php';
require_once 'library/cart-functions.php';


 $_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];
$catId  = (isset($_GET['c']) && $_GET['c'] != '') ? $_GET['c'] : 0;
$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;
$edId   = (isset($_GET['e']) && $_GET['e'] != '') ? $_GET['e'] : 0;
$tdId   = (isset($_GET['t']) && $_GET['t'] != '') ? $_GET['t'] : 0;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Rijwan Music Store: Order Status</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" media="screen" type="text/css" href="styles/content_styles.css" />

<link rel="stylesheet" href="styles/layout.css" type="text/css" />






<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.timers.1.2.js"></script>
<script type="text/javascript" src="scripts/jquery.galleryview.2.1.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.galleryview.setup.js"></script>
</head>
<body id="top">

<!------------------TWITTER------------------------>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<!------------------FACEBOOK------------------------------->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="wrapper col0">
  <div id="topline">
    <p>Tel: +6012-905-8590 | Mail: info@everblazingcreation.com</p>
    <ul>
      <li><a href="#">Order Status</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Condition</a></li>
        <li><a href="contactform.php">Contact us</a></li>
      <li class="last"><a href="index.php">Home</a></li>





    </ul>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <img src="content_image/diomand5.png" /><h1><a href="index.php"><strong>E</strong><font color="#0033FF">verbazing</font> <strong>C</strong><font color="#0033FF">reation</font></a></h1>
      <p><font size="-6">YpccEtech</font></p>
    </div>
    <div class="fl_right">





   <?php $url2   =  "cart.php". "?action=view";


    ?>


     <a href="<?php echo $url2;?>"><img src="images/demo/SCartimage1.jpg" alt="" /> <font color="#0000FF">


        </font></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.php" >Home</a></li>
       <!--Start Category  Group List -->

        <?php

		while ($row = dbFetchAssoc($result))// start while category main

		{
			extract($row); // this eliminate  hold variable for database data example $group_id=$row["group_id"];
	//Display all group name fetch from database

			 echo'<li><a href="">';

       echo $group_name;

		//Drop down  group name fetch from database
				 $sql1 = "SELECT cat_id,group_id,type_name,type_description,type_image
	        FROM category_type WHERE group_id = $group_id
			ORDER BY cat_id";
    $result1 = mysql_query($sql1);

		      echo '</a>';
			 // Create drop down menu for group
			echo'<ul>';

	   while ($row1=mysql_fetch_assoc($result1,MYSQL_ASSOC)) // start while drop down
	   {
		   extract($row1);

         $url   = $_SERVER['PHP_SELF'] . "?c=$cat_id";

	 ?>
      <a href="<?php echo $url;?>">
	  <li>
      <?php

		// echo'<a href="http://www.google.com">Click Me</a>';}

	 //echo $url;



	  $type_name = '&nbsp; &nbsp; &raquo;&nbsp;' . $type_name;
       echo $type_name;
	   //echo $cat_id;
	   $group_id= $group_id;


//if($group_id==2){ echo'<a href="http://www.google.com">Click Me</a>';}
		// if($group_id==1){ echo"cat1";}
		// if($group_id==1){ echo"cat2";}

	      echo "</li>";

		  echo '</a>';

} // End while drop down
//End Drop down  group name fetch from database

           echo '</ul>';
		   // End: reate drop down menu for group
			   echo "</li>";
	 //End:display all group name fetch from database
               }// End while category main
			   ?>

      </ul>






    </div>
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
<?php


if ($catId) {
	require_once 'include/productList.php';}
	else if ($pdId) {
	require_once 'include/productDetail.php';}

	 else if ($edId){
		 ?>
		 <h2> VIDEO - SCIENCE AND ENGINEERING PROJECT</h2>

		 <?php

		 require_once 'include/entertainmentvideo_list.php';    }


	else if ($tdId){
		?>
		 <h2> TECHNOLOGY - NEWS</h2>

      <p>
        <?php
		require_once 'include/tech_news.php';}

	else {  //START BODY ELSE AND END BELOW


  ?>
        <!--START BODY ELSE--><form action="userorderstatus.php" method="post" name="frmStatus" id="frmStatus" onSubmit="return checkShippingAndPaymentInfo();">
 <table width="550" border="0" align="center" cellpadding="5" cellspacing="1" >
<tr>
            <td width="250px"  >Invoice ID /Order ID</td>
            <td class="content"><input name="txtOrderID" type="text" class="box" id="txtOrderID" size="30"  maxlength="5" />
            </td>
             </tr>
            <td width="250px"  >Your Last Name</td>
            <td class="content"><input name="txtLastName" type="text" class="box" id="txtLastName" size="30"  maxlength="5" />
            </td>


        </tr>
    </table>

    <p align="center">
        <input class="box" name="btnStep1" type="submit" id="btnstatur" value="Proceed &gt;&gt;">
    </p>
</form>

<!--End Form Status------------------------------->























    </div>
    <div class="column">
      <ul class="latestnews">
     <li>

<div id="widgetmain" style="text-align:left;overflow-y:auto;overflow-x:hidden;width:300px;background-color:#FFF9E0; border:1px solid #333333;"><div id="rsswidget" style="height:280px;"><iframe src="http://us1.rssfeedwidget.com/getrss.php?time=1389670851994&amp;x=http%3A%2F%2Frss.cnn.com%2Frss%2Fedition_technology.rss&amp;w=300&amp;h=280&amp;bc=333333&amp;bw=1&amp;bgc=FFF9E0&amp;m=20&amp;it=true&amp;t=Technology News Today&amp;tc=28332A&amp;ts=15&amp;tb=CCFFDB&amp;il=true&amp;lc=1A59A1&amp;ls=14&amp;lb=false&amp;id=false&amp;dc=333333&amp;ds=14&amp;idt=true&amp;dtc=284F2D&amp;dts=12" border="0" hspace="0" vspace="0" frameborder="no" marginwidth="0" marginheight="0" style="border:0; padding:0; margin:0; width:300px; height:280px;" id="rssOutput">Reading RSS Feed ...</iframe></div><div style="text-align:right;margin-bottom:0;border-top:1px solid #333333;" id="widgetbottom"><span style="font-size:70%"><a href="http://www.rssfeedwidget.com">rss feed widget</a>&nbsp;</span><br></div></div>

</li>

       <li>

       <script type="text/javascript"><!--
google_ad_client = "ca-pub-0590632107969484";
/* Item */
google_ad_slot = "5007738130";
google_ad_width = 300;
google_ad_height = 200;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</li>


       <!-- <li><img src="images/demo/100x100.gif" alt="" />
          <p><strong><a href="#">Indonectetus facilis leo.</a></strong> Nullamlacus dui ipsum cons eque loborttis non euis que morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque.</p>
        </li>


        <li class="last"><img src="images/demo/100x100.gif" alt="" />
          <p><strong><a href="#">Indonectetus facilis leo.</a></strong> Nullamlacus dui ipsum cons eque loborttis non euis que morbi penas dapibulum orna. Urnaultrices quis curabitur phasellentesque.</p>
        </li>
        -->
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>

<!-- ####################################################################################################### -->

<div class="wrapper">
  <div id="adblock">
  <!--  <div class="fl_left"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />-->
  </div>
  <div id="hpage_cats">
    <div class="fl_left">


      <?php
while ($row110 = mysql_fetch_assoc($result110))// start
		{
			extract($row110);

		 $url10   = $_SERVER['PHP_SELF'] . "?e=$vd_id";
       ?>
       <a href="<?php echo $url10 ;?>">
       <?php

		}

?>

<h2>VIDEO - SCIENCE AND ENGINEERING PROJECT &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="<?php echo $url10 ;?>">Learn More...</a></strong></p>
      <p>What you need to know about system design, innovat- ion and invention, electronics devices, design your own robot, hardware and software(DIY).<br /> <br /><b><font color="#000000"> Keep up to date</font></b> with all the lastest video on everblazing creation website.</p>
    </div>
    <div class="fl_right">


      <?php
while ($row112 = mysql_fetch_assoc($result112))// start
		{
			extract($row112);

		 $url12 = $_SERVER['PHP_SELF'] . "?t=$nw_id";
       ?>
       <a href="<?php echo $url12 ;?>">
       <?php

		}

?>


      <h2>  TECHNOLOGY - NEWS&raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong> <a href="<?php echo $url12 ;?>">Weekly News Update.</a></strong></p>
      <p>Keep update with us as we will continue providing you weekly science and techonology news update related to "who says","how it happen" and lot's more .</p>
    </div>
    <br class="clear" />


<!--
    <div class="fl_left">










      <h2><a href="#">INOVATION-SCIENCE AND ENGINEERING &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
      <p>Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.</p>
    </div>

    <div class="fl_right">
      <h2><a href="#">WHO SAYS &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="#">Indonectetus facilis leo.</a></strong></p>
      <p>Morbitincidunt maurisque eros molest nunc anteget sed vel lacus mus semper. Anterdumnullam interdum eros dui urna consequam ac nisl nullam ligula vestassa. Condimentumfelis et amet tellent quisquet a leo lacus nec augue accumsan sagittislaorem dolor sum at urna.</p>
    </div>

    ####################################################################################################### -->
    <br class="clear" />
  </div>
</div>

 <?php

      } ?> <!-- END  BODY ELSE-->

<!-- END  BODY ELSE-->
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="hpage_latest">
        <h2>ADVERTISE WITH US</h2>
        <ul>
          <li >

          <img src="images/demo/190x130.gif" alt="" />
             <br />
        <p ><a href="contactform.php"><b>Contact us today</b></a> as we invites new partnerships for brand advertisement and lot's more.


            <!--<p class="readmore"><a href="#">Continue Reading &raquo;</a></p>-->
          </li>
          <li><img src="images/demo/190x130.gif" alt="" />
            </li>
          <li class="last"><img src="images/demo/190x130.gif" alt="" />

          </li>
        </ul>
        <br class="clear" />
      </div>
    </div>
    <div class="column">
      <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>


 <!--Facebook like page------------------------------------------------------------------->
     <div class="holder"> <div class="fb-like" data-href="http://www.everblazingcreation.com/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div></div>
  <!--------------------------------------------------------------------------------------->





    </div>
    <br class="clear" />
  </div>

</div>
<!-- ####################################################################################################### -->

<div class="wrapper">

<!-- ########footer 1######### -->
  <div id="footer">

    <div class="footbox">

      <h2>Features Brand</h2>
      <ul>
        <li><a href="#"><img src="images/brand_images/freescale1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox">
      <h2><br /></h2>
      <ul>
        <li><a href="#"><img src="images/brand_images/IBM1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox">
      <h2><br /></h2>
      <ul>
        <li><a href="#"><img src="images/brand_images/Intel-AMD-Nvidia1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox">
      <h2><br /></h2>
      <ul>
        <li><a href="#"><img src="images/brand_images/microchip1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox last">
      <h2><br /></h2>
      <ul>
        <li><a href="#"><a href="#"><img src="images/brand_images/texas_instrument1.jpg" /></a></li>

        <!--<li class="last"><a href="#">Praesent et eros</a></li>-->
      </ul>
    </div>
    <br class="clear" />
  </div>


 <!-- ########footer 2######### -->


    <div id="footer">

    <div class="footbox">


      <ul>
        <li><a href="#"><img src="images/brand_images/acer1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox">

      <ul>
        <li><a href="#"><img src="images/brand_images/toshiba1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox">

      <ul>
        <li><a href="#"><img src="images/brand_images/hp1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox">

      <ul>
        <li><a href="#"><img src="images/brand_images/nokia1.jpg" /></a></li>

      </ul>
    </div>
    <div class="footbox last">

      <ul>
        <li><a href="#"><a href="#"><img src="images/brand_images/samsung1.jpg" /></a></li>

        <!--<li class="last"><a href="#">Praesent et eros</a></li>-->
      </ul>
    </div>
    <br class="clear" />
  </div>










</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="socialise">
    <ul>















      <li><center><a href="https://www.facebook.com/Everblazing.Creation"><img src="images/facebook.gif" alt="" /><span>Follow us @ Facebook
     </span></a></center></li>

      <!--<li><a href="#"><img src="images/rss.gif" alt="" /><span>FeedBurner</span></a></li>-->






      <li class="last"><a href="https://twitter.com/everblazing_cr"><img src="images/twitter.gif" alt="" /><span>Twitter</span></a>
        <a href="https://twitter.com/everblazing_cr" class="twitter-follow-button" data-show-count="false">Follow @everblazing_cr</a>


      </li>
    </ul>
    <div id="newsletter">
      <h2>NewsLetter Sign Up !</h2>
      <p>Please enter your Email and Name to join.</p>
      <form action="#" method="post">
        <fieldset>
          <legend>Digital Newsletter</legend>
          <div class="fl_left">
            <input type="text" value="Enter name here&hellip;"  onfocus="this.value=(this.value=='Enter name here&hellip;')? '' : this.value ;" />
            <input type="text" value="Enter email address&hellip;"  onfocus="this.value=(this.value=='Enter email address&hellip;')? '' : this.value ;" />
          </div>
          <div class="fl_right">
            <input type="submit" name="newsletter_go" id="newsletter_go" value="&raquo;" />
          </div>
        </fieldset>
      </form>
      <p>To unsubsribe please <a href="#">click here &raquo;</a>.</p>
    </div>
    <br class="clear" />
  </div>
</div>

<!-- ####################################################################################################### -->





<div class="wrapper col8">
  <div id="copyright">



    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">YpccEtech</a></p>




 <p class="fl_right">Thanks to <a href="" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>
</div>


</body>
</html>
