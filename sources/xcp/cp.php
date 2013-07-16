<?php
if(basename($_SERVER["PHP_SELF"]) == "cp.php"){die("Error!");}

if(isset($_SESSION['id'])){
	echo "
	<a href='?page=charfix'><img src='./images/charfix.png' /></a>
	<br/>
	<a href='?page=accsettings'><img src='./images/accsettings.png' /></a>
	";
	if(isset($_SESSION['webadmin'])){
		echo "<br/><br/>
		<a href='?page=news_manage'><img src='./images/managenews.png' /></a>
		<br/>
		<a href='?page=event_manage'><img src='./images/manageevents.png' /></a>
		";
	}
	echo "<br/><br/><a href='?page=logout'><img src='./images/logoutbtn.png' /></a><br/>";
} else {
	echo "You are not logged in.";
}
?>