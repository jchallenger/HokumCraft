<?php
if(basename($_SERVER["PHP_SELF"]) == "header.php"){
	die("Error 403 - Forbidden");
} 

include('./config/config.php');
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/vstyle.css" />
<title><?php echo $title; ?></title>
</head>
<body>
<!-- MAIN WRAPPER -->
<div id="wrapper">
<!-- HEADER --->
<div id="header"><center><img src="./images/logo.png"/></center></div>
<!-- CONTENT [WRAP] -->
<div id="content">
<!-- ANNOUNCEMENT -->
<div id="topbarbg"><div id="topbar"><marquee behavior="scroll" direction="left" scrollamount="5" scrolldelay="80"><?php echo $announcement; ?></marquee></div></div>
<br/>
<!--Sidebar-->
<div id="sidebarbg">
<div id="sidebar">
<?php include("./sources/leftbar.php"); ?></div></div>
<?php
include('./sources/navigation.php');
?>
</body>
</html>