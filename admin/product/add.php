<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

$categoryList = buildCategoryOptions($catId);
?> 
<p>&nbsp;</p>
<form action="processProduct.php?action=addProduct" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr><td colspan="2" id="entryTableHeader">Add Product</td></tr>
  <tr> 
   <td width="150" class="label">Category</td>
   <td class="content"> <select name="cboCategory" id="cboCategory" class="box">
     <option value="" selected>-- Choose Category --</option>
<?php
	echo $categoryList;
?>	 
    </select></td>
  </tr>
  <tr> 
   <td width="150" class="label">Product Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="50" maxlength="100"></td>
  </tr>
  
  
    <tr> 
   <td width="150" class="label">Product Code</td>
   <td class="content"> <input name="txtCode" type="text" class="box" id="txtCode" size="50" maxlength="100"></td>
  </tr>
  
  <tr> 
   <td width="150" class="label">Description</td>
   <td class="content"> <textarea name="txtDescription" cols="70" rows="10" class="box" id="txtDescription"></textarea></td>
  </tr>
  <tr> 
   <td width="150" class="label">Price</td>
   <td class="content"><input name="txtPrice" type="text" id="txtPrice" size="10" maxlength="7" class="box" onKeyUp="checkNumber(this);"> &nbsp;</td>
  </tr>
  <tr> 
   <td width="150" class="label">Weight in kg</td>
   <td class="content"><input name="weight" type="text" id="weight" size="10" maxlength="7" class="box" onKeyUp="checkNumber(this);"> </td>
  </tr>
  <tr> 
   <td width="150" class="label">Qty In Stock</td>
   <td class="content"><input name="txtQty" type="text" id="txtQty" size="10" maxlength="10" class="box" onKeyUp="checkNumber(this);"> </td>
  
  </tr>
  
  
  
   <tr> 
   <td width="150" class="label">Seller Company Name</td>
   <td class="content"> <input name="txtcompanyname" type="text" class="box" id="txtcompanyname" size="50"></td>
  </tr>
  
  <tr> 
   <td width="150" class="label">Image</td>
   <td class="content"> <input name="fleImage" type="file" id="fleImage" class="box"> 
    </td>


  <tr> 
   <td width="150" class="label">Dimension</td>
   <td class="content"> <input name="txtdimension" type="text" class="box" id="txtdimension" size="50"></td>
  </tr>
   
   

  
    <tr> 
   <td width="150" class="label">System Specification(1)</td>
   <td class="content"> <input name="txtspec1" type="text" class="box" id="txtspec1" size="50"></td>
  </tr>
  
  
  <tr> 
   <td width="150" class="label">System Specification(2)</td>
   <td class="content"> <input name="txtspec2" type="text" class="box" id="txtspec2" size="50"></td>
  </tr>
  
   

 
  
  

   
  </tr>
  
  
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Product" onClick="checkAddProductForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
