<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_fyp = "localhost";
$database_fyp = "rijwan_fyp";
$username_fyp = "root";
$password_fyp = "";
$fyp = mysql_pconnect($hostname_fyp, $username_fyp, $password_fyp) or trigger_error(mysql_error(),E_USER_ERROR);
?>
