<?php
if (!defined('WEB_ROOT')) {
	exit;
}



//Get group from database

$sql1 = "SELECT cg_id, group_id, group_name, group_description, group_image
        FROM category_group
		";

$output=mysql_query($sql1) or die(mysql_error());

?>
		<Form name ="catform" Method ="POST" Action ="">
      <select name="category_group">

		<?php

while ($row1 = mysql_fetch_assoc($output))// start while
		{
			extract($row1);

		?>
			 <option value="<?php echo $group_id; ?>"><?php echo $group_name; ?></option>

		<?php

		}

		?>
		</select>

        <INPUT TYPE = "submit" Name = "Submit" VALUE = " Select Category">

        </Form>

        <?php


//if select category button  is click then

        if ( isset( $_POST['Submit'] ) ) {

		$group_id=$_POST["category_group"];

	//select group you want to access
		$sql = "SELECT set_group
        FROM current_group WHERE set_id = 1";

		$result = mysql_query($sql);

		if (mysql_num_rows($result) == 0) {
		// put the group value in current_group
		$sql = "INSERT INTO current_group(set_id, set_group,set_date)
				VALUES (1,$group_id, NOW())";
		$result = mysql_query($sql);
	}

	else {
		// update current group  each time button click
		$sql = "UPDATE current_group
		        SET set_group = $group_id
				WHERE set_id = 1";

		$result = mysql_query($sql);


	}



		}
        ?>


<?php

// this query confirm that group want to access as been set in database searching by 1

$sql2 = "SELECT set_group
        FROM current_group WHERE set_id = 1";

$output2=mysql_query($sql2) or die(mysql_error());

$row2 = mysql_fetch_assoc($output2);
$group_id=$row2['set_group'];

// start categories table


if (isset($_GET['catId']) && (int)$_GET['catId'] >= 0) {

	$catId = (int)$_GET['catId'];
	$queryString = "&catId=$catId";


} else {



	$catId = $group_id;
	$queryString = '';
}




$rowsPerPage = 5;

$sql = "SELECT cat_id, group_id, type_name, type_description, type_image
        FROM category_type
		WHERE group_id = $catId
		ORDER BY type_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);
?>
<p>&nbsp;</p>
<form action="processCategory.php?action=addCategory" method="post"  name="frmListCategory" id="frmListCategory">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader">
   <td>Category Name</td>
   <td>Description</td>
   <td width="75">Image</td>
   <td width="75">Modify</td>
   <td width="75">Delete</td>
  </tr>
  <?php
$group_id = 0;
if (dbNumRows($result) > 0) {
	$i = 0;

	while($row = dbFetchAssoc($result)) {
		extract($row);

		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}

		$i += 1;

		if ($group_id == 0) {
			$type_name = "<a href=\"index.php?catId=$cat_id\">$cat_name</a>";
		}

		if ($type_image) {
			$type_image = WEB_ROOT . 'images/category/' . $type_image;
		} else {
			$type_image = WEB_ROOT . 'images/no-image-small.png';
		}
?>
  <tr class="<?php echo $class; ?>">
   <td><?php echo $type_name; ?></td>
   <td><?php echo nl2br($type_description); ?></td>
   <td width="75" align="center"><img src="<?php echo $type_image; ?>"></td>
   <td width="75" align="center"><a href="javascript:modifyCategory(<?php echo $group_id; ?>);">Modify</a></td>
   <td width="75" align="center"><a href="javascript:deleteCategory(<?php echo $group_id; ?>);">Delete</a></td>
  </tr>
  <?php
	} // end while


?>
  <tr>
   <td colspan="5" align="center">
   <?php
   echo $pagingLink;
   ?></td>
  </tr>
<?php

} else {
?>
  <tr>
   <td colspan="5" align="center">No Categories Yet</td>
  </tr>
  <?php
}





?>
  <tr>
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
   <td colspan="5" align="right"> <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Category" class="box" onClick="addCategory(<?php echo $catId; ?>)">
   </td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
