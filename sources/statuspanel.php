<?php
if(basename($_SERVER["PHP_SELF"]) == "statuspanel.php"){
	die("Error 403 - Forbidden");
} 

$countaccs 		= mysql_query("SELECT * FROM accounts");
$countchars 	= mysql_query("SELECT * FROM characters");
$countbanned 	= mysql_query("SELECT * FROM accounts where banned = 1");
$accounts 		= mysql_num_rows($countaccs);
$chars 			= mysql_num_rows($countchars);
$banned 		= mysql_num_rows($countbanned);
?>
<img src="./images/status.png"><br/>
<?php
 
	if (!$MCServer->online) 
	{ echo "<img src='./images/offline.png'><br/><br/>"; } else { echo "<img src='./images/online.png'><br/><br/>"; }
?>
<table class="sidebarlist" cellspacing="0">

<tr><td align=left>&nbsp;Version:</td><td>	        <font color="#208925">  <?php echo $version; ?></font></td></tr>
<tr><td align=left>&nbsp;Players Online:</td><td>	<font color="#208925">  <?php echo $MCServer->online_players; ?>/<?php echo $MCServer->max_players; ?></font></td></tr>
<tr><td align=left>&nbsp;Total Players:</td><td> 	<font color="#208925">  <?php echo $accounts; ?></font></td></tr>
<tr><td align=left>&nbsp;Banned:</td><td> 			<font color="#208925">  <?php echo $banned; ?></font></td></tr>

</table>

<a href ="?page=commands">Command Book</a>