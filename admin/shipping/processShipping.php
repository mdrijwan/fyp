<?php
require_once '../../../library/config.php';
require_once '../../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addShippingCountry();
		break;
		
	case 'modify' :
		modifyShippingCountry();
		break;
		
	case 'delete' :
		deleteShiipingCountry();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addUser()
{
    $userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the username is taken
	$sql = "SELECT user_name
	        FROM tbl_user
			WHERE user_name = '$userName'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('Username already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO tbl_user (user_name, user_password, user_regdate)
		          VALUES ('$userName', PASSWORD('$password'), NOW())";
	
		dbQuery($sql);
		header('Location: index.php');	
	}
}

/*
	Modify a user
*/
function modifyUser()
{
	$txtShippingCountry   =$_POST['txtShippingCountry'];	
	$txtShippingComment = $_POST['txtShippingComment'];
	$txtFWP = $_POST['txtFWP'];
	$txtADP = $_POST['txtADP'];
	$txtREALWEIGH = $_POST['txtREALWEIGH'];
	$txtShippingAllow = $_POST['txtShippingAllow'];
	
	$sql   = "UPDATE tbl_user 
	          SET sc_fwp = '$txtFWP', sc_adp = '$txtADP', sc_realweight='$txtREALWEIGH', sc_set = '$txtShippingAllow',
			  WHERE sc_country = $txtShippingCountry";

	dbQuery($sql);
	header('Location: index.php');	

}

/*
	Remove a user
*/
function deleteUser()
{
	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_user 
	        WHERE user_id = $userId";
	dbQuery($sql);
	
	header('Location: index.php');
}
?>