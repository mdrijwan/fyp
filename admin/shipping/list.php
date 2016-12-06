<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT ship_id, sc_name_country, sc_country, sc_fwp,sc_adp,sc_realweight,sc_set,sc_comment
        FROM tbl_shipmentcost
		ORDER BY ship_id";
$result = dbQuery($sql);

?> 
<p>&nbsp;</p>
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>S/N</td>
   <td width="120">CAC</td>
   <td width="120">Countries</td>
   
   <td width="70">FWP</td>
   <td width="70">AWP</td>
    <td width="70">RW</td>
    <td width="70">AS</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $ship_id; ?></td>
   <td width="120" align="center"><?php echo $sc_name_country; ?></td>
   <td width="120" align="center"><?php echo $sc_country; ?></td>
    <td width="120" align="center"><?php echo $sc_fwp; ?></td>
    <td width="120" align="center"><?php echo $sc_adp; ?></td>
       <td width="120" align="center"><?php echo $sc_realweight; ?></td>
          <td width="120" align="center"><?php echo $sc_set; ?></td>
         
   
  
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
 </td>
   
  
  </tr>
 </table>
 <p>&nbsp;</p>
</form>