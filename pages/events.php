<?php 

echo '
<br/><br/><img src="images/eventtitle.png" alt="Events" border="0" /><br/>';
	
if(@$_GET['id']){
	$id = mysql_real_escape_string($_GET['id']);
	$ge = mysql_query("SELECT * FROM `web_events` WHERE `id`='".sql_sanitize($id)."'") or die(mysql_error());
	$e = mysql_fetch_array($ge);
	echo "<center>
			<img src=\"images/news/".$e['type'].".gif\" alt='' /><br/>";
	echo "[".$e['date']."] <b>".stripslashes($e['title'])."</b>";
	if($e['status'] == "Active"){
		$status = "
			<font color=\"green\">Active</font>";
	}elseif($e['status'] == "Standby"){
		$status = "
			<font color=\"orange\">Standby</font>";
	}elseif($e['status'] == "Ended"){
		$status = "
			<font color=\"red\">Ended</font>";
	}
	echo "<br/>
			<b>Event Status: ".$status."</b>
			<br /><br />";
	echo nl2br(stripslashes($e['content']));
	echo "<br /><br />Posted by <b>".ucfirst($e['author'])."</b><br />";
	echo "Views: <b>".$e['views']."</b><br />
				<a href=\"?page=index\">Return Home</a>";
	$av = mysql_query("UPDATE `web_events` SET `views` = views + 1 WHERE `id`='".sql_sanitize($id)."'") or die(mysql_error());
}else{
	$ge = mysql_query("SELECT * FROM `web_events` ORDER BY `id` DESC") or die(mysql_error());

	$rows = mysql_num_rows($ge);

	if ($rows < 1) {
		echo "
		<tr>
			<td colspan=\"3\">There are currently no events. Check back later.</td>
		</tr>
		";
	}


	while($e = mysql_fetch_array($ge)){
	$title = $e['title'];
	$maxlength = 40;
		echo "
	<tr>
		<td>
			<img src=\"images/news/".$e['type'].".gif\" alt='' />
		</td>
		<td>
		<div align=\"left\" valign=\"left\" style=\"margin-left: -35px;\">
			[".$e['date']."]  
			<a href=\"?page=events&id=".$e['id']."\">";
		if(strlen($title) > $maxlength){
			echo stripslashes(substr($title, 0, 40));
		}else{
			echo stripslashes($title);
		}
		echo "</a>
		</div></td>
		<td align=\"right\" style=\"padding: 4px;\">
			<b>".$e['views']."</b> views";
		echo "
		</td>
	</tr>";
	}
}
echo '
	<tr>
		<td height="4" />
	</tr></div>
	</div>
</table>';

?>