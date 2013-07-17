
<?php
if(basename($_SERVER["PHP_SELF"]) == "MCheader.php"){
	die("Error 403 - Forbidden");
} 

include('./config/config.php');
?>
<!-- START OF MCHeader.php -->

<!-- HEADER --->

<link rel="stylesheet" type="text/css" href="./css/vstyle.css" />
<title><?php echo $title; ?></title>
<div id="header"><center><img src="./images/MClogo.png"/></center></div>
<!-- NAVIGATION --->
<?php include('./sources/navigation.php'); ?>    
<!-- END OF MCHeader.php -->