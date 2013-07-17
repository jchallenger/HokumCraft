<?php
if(isset($_GET['id'])){
	$id = mysql_real_escape_string($_GET['id']);
	$gn = mysql_query("SELECT * FROM `web_news` WHERE `id`='".$id."'") or die(mysql_error());
	$n = mysql_fetch_array($gn);
	echo "<center>";
	echo "<div id='naetext'>
				<img src=\"./images/news/".$n['type'].".gif\" /><br/>
				[".$n['date']."]<br/><b>".stripslashes($n['title'])."</b><br /><br />";
	echo nl2br(stripslashes($n['content']))."
				<br /><br />"; 
	echo "<br/> - Posted by  <b>".$n['author']."</b><br/>";
	echo "		
				Views: <b>".$n['views']."</b><br />
				<a href=\"?page=index\">Return Home</a></div>";
	echo "</center>";
	$av = mysql_query("UPDATE `web_news` SET `views` = views + 1 WHERE `id`='".$id."'") or die(mysql_error());

}else{
	$gn = mysql_query("SELECT * FROM `web_news` ORDER BY `id` DESC") or die(mysql_error());

	$rows = mysql_num_rows($gn);

	if ($rows < 1) {
		echo "<br/>There is currently no news.<br/>";
	}
	while($n = mysql_fetch_array($gn)){
	$title = $n['title'];
	$maxlength = 30;
	echo "<div id='maincontent'><img src='./images/news/".$n['type'].".gif'>";

	echo " [".$n['date']."]";

	echo " <a href=\"?page=news&id=".$n['id']."\">";
		if(strlen($title) > $maxlength){
			echo stripslashes(shortTitle($title));
            
		}else{
        //CHANGE COLOR HERE FOR NEWS
            echo "<font color=white>";
			echo stripslashes($title);
            echo "</font>";
		}
	echo "</a> - <b>".$n['views']." </b> views</div>";
/*
echo "
	
	<tr>
		<td>
				<img src=\"./images/news.png\" alt='".$n['type']."' />
						</td>
		<td>
		<div align=\"left\" valign=\"left\" style=\"margin-left: -35px;\">
				[".$n['date']."]
				
				 <a href=\"?page=news&id=".$n['id']."\">";
		if(strlen($title) > $maxlength){
			echo stripslashes(shortTitle($title));
		}else{
			echo stripslashes($title);
		}
		echo "</a>
		</div></td>
		<td align=\"right\" style=\"padding: 4px;\">
				<b>".$n['views']."</b> views";
		echo "
			</td>";
*/
	}
}
?>