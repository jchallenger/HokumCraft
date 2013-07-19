<?php 
echo '<br/><br/><img src="images/newstitle.png" alt="News" border="0" /><br/>';

echo '<center>';

if(isset($_GET['id'])){
	$id = mysql_real_escape_string($_GET['id']);
	$gn = mysql_query("SELECT * FROM `web_news` WHERE `id`='".$id."'") or die(mysql_error());
	$n = mysql_fetch_array($gn);
	echo "<img src=\"images/news/".$n['type'].".gif\" alt='".$n['type']."' /><br/>";
				echo "[".$n['date']."] <b>".stripslashes($n['title'])."</b><br/><br/>";
				echo nl2br(stripslashes($n['content']))."
				<br /><br />";
	echo "Posted by <b>".ucfirst($n['author'])."</b><br/>";
	echo "		
				Views: <b>".$n['views']."</b><br />
				<a href=\"?page=index\">Return Home</a>";

	$av = mysql_query("UPDATE `web_news` SET `views` = views + 1 WHERE `id`='".$id."'") or die(mysql_error());
	echo "
			</td>
			<td align=\"right\" valign=\"top\"  class='nebcolor' style=\"padding: 4px;\">";
	echo "
			</td>
		</tr>";
}else{
	$gn = mysql_query("SELECT * FROM `web_news` ORDER BY `id` DESC") or die(mysql_error());

	$rows = mysql_num_rows($gn);

	if ($rows < 1) {
		echo "
		<tr>
			<td colspan=\"3\">There are currently no news. Check back later.</td>
		</tr>
		";
	}

	while($n = mysql_fetch_array($gn)){
	$title = $n['title'];
	$maxlength = 40;
echo "
	
	<tr>
		<td>
				<img src=\"images/news/".$n['type'].".gif\" alt='".$n['type']."' />
						</td>
		<td>
		<div align=\"left\" valign=\"left\" style=\"margin-left: -35px;\">
				[".$n['date']."]
				
				 <a href=\"?page=news&id=".$n['id']."\">";
		if(strlen($title) > $maxlength){
			echo stripslashes(substr($title, 0, 40));
		}else{
			echo stripslashes($title);
		}
		echo "</a>
		</div></td>
		<td align=\"right\" style=\"padding: 4px;\">
				<b>".$n['views']."</b> views";
		echo "
		</td>";
	}
}
echo "
      </tbody>
</table>
";
?>