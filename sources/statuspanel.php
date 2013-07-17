<?php
if(basename($_SERVER["PHP_SELF"]) == "statuspanel.php"){
	die("Error 403 - Forbidden");
} 

$countaccs 		= mysql_query("SELECT * FROM authme");
$countbanned 	= mysql_query("SELECT * FROM authme where banned = 1");
$accounts 		= mysql_num_rows($countaccs);
//$banned 		= mysql_num_rows($countbanned);
?>
<h3> Server Status </h3>
<?php
	if (!$MCServer->GetInfo()['Online']) 
	{ echo "<h4 style='color: #ff0000;'> Offline </h4>"; } else { echo "<h4 style='color: #00ff00;'> Online </h4>"; }
?>
<table class="sidebarlist" cellspacing="0">

<tr><td align=left>&nbsp;Version:</td>			<td align=right><font color="#208925">  <?php echo $MCServer->GetInfo()['Version']; ?></font></td></tr>
<tr><td align=left>&nbsp;Players Online:</td>	<td align=right><font color="#208925">  <?php echo $MCServer->GetInfo()['Players']; ?>/<?php echo $MCServer->GetInfo()['MaxPlayers']; ?></font></td></tr>
<tr><td align=left>&nbsp;Total Players:</td>	<td align=right><font color="#208925">  <?php echo $accounts; ?></font></td></tr>

</table>

<a href ="?page=commands">Command Book</a>
