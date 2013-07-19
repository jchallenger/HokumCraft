<?php
session_start();


if(basename($_SERVER["PHP_SELF"]) == "config.php"){
	die("Error 403 - Forbidden");
} 

include ("./includes/MCServerStatus.php");

include ("./includes/MCQuery.php");

$host 			= "192.168.2.105"; // Host [Default: localhost]
$user 			= "minecraft"; // Database User [Default: root]
$pass 			= "tricker9132"; // Database Password [Default: root]
$database 		= "minecraft_hokumcraft"; // Database Name [Default: odinms]

$conn 			= mysql_connect($host,$user,$pass);
$db				= mysql_select_db($database, $conn) or die(mysql_error());
$userTable      = "authme";

$forum 			= ""; // Forum URL
$title 			= "Hokum - Nonsense"; // Website Title
$client 		= "http://www.minecraft.net"; // Client URL
$mssetup		= ""; // MapleStory Setup
$servername		= "HokumCraft"; // Private Server Name

$serverip		= "hokumcraft.no-ip.org"; // The server IP [Default: 127.0.0.1 / localhost]
$loginport		= 25565; // The login port [Default: 25565]

$MCServer       = new MinecraftQuery();
$MCServer->Connect($host,$loginport);

$captcha		= false; // Captcha at registering? [Default: false]
/* NOTE FOR CAPTCHA:
A Captcha code has NOT been included in this CMS.
Be sure to add the Captcha code to functions folder with the name of captcha.php.
Also be sure that the session for the captcha is called captcha_code or this will not work.*/

$announcement 	= "Welcome to HokumGaming!"; // Scrolling Text
?>