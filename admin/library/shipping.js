// JavaScript Document
function checkEditShippingForm()
{

	
	with (window.document.frmEditShipping) {
		if (isEmpty(txtShippingCountry, 'Enter Country')) {
			return;
		} else if (isEmpty(txtFWP, 'Enter Fix Weight Amount')) {
			return;
			
			} else if (isEmpty(txtADP, 'Enter Amount Added to weight per kilogram')) {
			return;
			
			} else if (isEmpty(txtREALWEIGH, 'Enter Defaul Weight Example (0.5)')) {
			return;
			
			} else if (isEmpty(txtShippingAllow, 'Choose Yes/No')) {
			return;
		} else {
			submit();
		}
	}
}


function addUser()
{
	window.location.href = 'index.php?view=add';
}

