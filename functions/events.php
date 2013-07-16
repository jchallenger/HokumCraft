<?php 
if(@$_GET['id']){
	$id = mysql_real_escape_string($_GET['id']);
	$page = mysql_real_escape_string($_GET['page']);
	$ge = mysql_query("SELECT * FROM `website_news` WHERE `id`='".$id."'") or die(mysql_error());
	$e = mysql_fetch_array($ge);
	echo "<center>";
	
	echo "<div id='naetext'><img src='./images/news/".$e['type'].".gif'><br/>";
	echo "[".$e['date']."] <b>".stripslashes($e['title'])."</b><br/>";
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
	echo "<b>Event Status: ".$status."</b>
			<br /><br />";
	echo nl2br(stripslashes($e['content']))."
			<br /><br />";
	echo "</b> - Posted by <b>".$e['author']."</b><br />";
	echo "Views: <b>".$e['views']."</b><br />
				<a href=\"?page=index\">Return Home</a></div>";
				
		echo "</center>";
	$av = mysql_query("UPDATE `website_events` SET `views` = views + 1 WHERE `id`='".$id."'") or die(mysql_error());
}else{
	$ge = mysql_query("SELECT * FROM `website_events` ORDER BY `id` DESC") or die(mysql_error());

	$rows = mysql_num_rows($ge);

	if ($rows < 1) {
		echo "<br/>There are currently no events.<br/>";
	}


	while($e = mysql_fetch_array($ge)){
	$title = $e['title'];
	$maxlength = 30;
		echo "<img src='./images/news/".$e['type'].".gif'> [".$e['date']."] <a href=\"?page=events&id=".$e['id']."\">";
		if(strlen($title) > $maxlength){
			echo stripslashes(shortTitle($title));
		}else{
			echo stripslashes($title);
		}
		echo "</a> - <b>".$e['views']."</b> views<br/>";
		echo "
		</td>
	</tr>";
	}
}

?>