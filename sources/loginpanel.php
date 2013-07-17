<?php
if(basename($_SERVER["PHP_SELF"]) == "loginpanel.php"){
	die("Error 403 - Forbidden");
} 
?>
<h3> Panel </h3>
<?php
include('xcp/login.php');
?>
<img src="./images/divider.png" style="margin: 40px 0;">