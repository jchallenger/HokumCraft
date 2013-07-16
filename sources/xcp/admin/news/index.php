<?php
if(isset($_SESSION['id'])){
	if(isset($_SESSION['webadmin'])){
?>
<?php
$curpage = isset($_GET['notice']) ? $_GET['notice'] : "";

	switch($curpage){
		case NULL:
			include("home.php");
			break;
		case "home":
			include("home.php");
			break;
		case "add_notice":
			include("add_notice.php");
			break;
		case "edit_notice":
			include("edit_notice.php");
			break;
		case "delete_notice":
			include("delete_notice.php");
			break;
		default:
			include("home.php");
		break;
		}
?>
<?php
} else { echo "<center>You are not allowed to manage news.</center>"; }
} else { echo "<center>You are not allowed to manage news.</center>"; }
?>