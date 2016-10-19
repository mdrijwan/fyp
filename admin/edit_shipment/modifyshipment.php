

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>
<body>
<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$txtShippingCountry=$_POST['txtShippingCountry'];	
	$txtShippingComment = $_POST['txtShippingComment'];
	$txtFWP = $_POST['txtFWP'];
	$txtADP = $_POST['txtADP'];
	$txtREALWEIGHT = $_POST['txtREALWEIGHT'];
	$txtShippingAllow = $_POST['txtShippingAllow'];
	
if(isset($_POST['btnModifyUser'])==true){
	$sql   = "UPDATE tbl_shipmentcost 
	          SET sc_fwp = '$txtFWP', sc_adp = '$txtADP', sc_realweight='$txtREALWEIGHT', sc_set = '$txtShippingAllow'
			  WHERE sc_country = '$txtShippingCountry'";
dbQuery($sql);

echo '<script language="javascript">alert("Data Updated");window.location = "index.php";</script>'; mysql_close();



	
}

else header('Location: index.php');	

?>
</body>
</html>