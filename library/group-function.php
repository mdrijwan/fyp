<?php
require_once 'config.php';


//Select Group From DB
$sql = "SELECT group_id,group_name,group_description,group_image 
	        FROM category_group
			ORDER BY group_id";
    $result = mysql_query($sql);
//End Select Group From DB

 

?>