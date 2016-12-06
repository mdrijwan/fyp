
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
require_once 'database.php';
$touser=$_SESSION['username'];
$password = $_POST['oldpassword'];
$newpassword= $_POST['newpassword'];
$newpassword_main="W".$newpassword;
$submit= $_POST['set'];
$set="1";
$sql="SELECT * FROM biometrics_table WHERE username='$touser'";
$output=mysql_query($sql);
$rows=mysql_fetch_array($output);
if (isset($submit)) {
$sql="SELECT * FROM biometrics_table WHERE username='$touser'";
$output=mysql_query($sql);
$row_result=mysql_num_rows($output);
$rows=mysql_fetch_array($output);
$p_set=$rows['set_secure'];


if($row_result !=1){echo '<script language="javascript">alert("Your old password is invalid");window.location = "password_change.php";</script>'; mysql_close();
}


if($p_set ==1){echo '<script language="javascript">alert("You can only reset your online security password once, please contact the bank for any changes regarding your  onlinesecurity access code");window.location = "password_change.php";</script>'; mysql_close();
}


if(($row_result)==1){
$result1 = mysql_query("UPDATE biometrics_table SET onlinepass='$newpassword_main' WHERE username='$touser'") 
or die(mysql_error()); 

$result2 = mysql_query("UPDATE biometrics_table SET set_secure='$set' WHERE username='$touser'") 
or die(mysql_error());   
mysql_close();

echo '<script language="javascript">document.write("Your password has been changed please click ");var str = "here";document.write(str.link("password_change.php")); document.write(" to return to password reset or close window");</script>';

echo "<br />";
echo "<br />";

echo'Your transaction security code  is:  '.$newpassword_main;

}
}
?>
</body>
</html>