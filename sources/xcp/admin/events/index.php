<?php
if(isset($_SESSION['id'])){
	if(isset($_SESSION['webadmin'])){
?>
<?php
$curpage = isset($_GET['events']) ? $_GET['events'] : "";

	switch($curpage){
		case NULL:
			include("home.php");
			break;
		case "home":
			include("home.php");
			break;
		case "add_event":
			include("add_event.php");
			break;
		case "edit_event":
			include("edit_event.php");
			break;
		case "delete_event":
			include("delete_event.php");
			break;
		default:
			include("home.php");
		break;
		}
?>
<?php
} else { echo "<center>You are not allowed to manage events.</center>"; }
} else { echo "<center>You are not allowed to manage events.</center>"; }
?>
