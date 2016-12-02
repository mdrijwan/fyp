<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$parentId = (isset($_GET['parentId']) && $_GET['parentId'] > 0) ? $_GET['parentId'] : 0;
?>

<?php

//Get group from database

$sql1 = "SELECT cg_id, group_id, group_name, group_description, group_image
        FROM category_group
		";

$output=mysql_query($sql1) or die(mysql_error());

?>



<form action="processCategory.php?action=add" method="post" enctype="multipart/form-data" name="frmCategory" id="frmCategory">
 <p align="center" class="formTitle">Add Category</p>





 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">

   <tr><td width="150" > <select name="category_group">

		<?php
while ($row1 = mysql_fetch_assoc($output))// start while
		{
			extract($row1);
		?>
			 <option value="<?php echo $group_id; ?>"><?php echo $group_name; ?></option>
		<?php
		}
		?>
		</select></td> <td> Select Group</td></tr>


  <tr>
   <td width="150">Category Name(Hint: Drop Down)</td>
   <td > <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="50"></td>
  </tr>



  <tr><td >Description</td>  <td width="150" ><textarea name="mtxDescription" cols="50" rows="4" class="box" id="mtxDescription"></textarea></td>


  </tr>
  <tr>
   <td width="150">Image</td>
   <td > <input name="fleImage" type="file" id="fleImage" class="box">
    <input name="hidParentId" type="hidden" id="hidParentId" value="<?php echo $parentId; ?>"></td>
  </tr>
 </table>
 <p align="center">
  <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Category" onClick="checkCategoryForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php?catId=<?php echo $parentId; ?>';" class="box">
 </p>
</form>
