<?php
if(basename($_SERVER["PHP_SELF"]) == "edit_event.php"){
	die("Error 403 - Forbidden");
} 
?>

<?php
echo "<center>";
echo "<p class='ucpHeader'>Edit An Event</p>";
			if(isset($_GET['id'])){
				$id = mysql_real_escape_string($_GET['id']);
				$ge = mysql_query("SELECT * FROM `website_events` WHERE `id`='".$id."'") or die(mysql_error());
				$e = mysql_fetch_array($ge);
				if(!isset($_POST['edit'])){
						echo "<font size='1.5'>
			<form method=\"post\" action=''>
							<b>Title:</b><br>
							Max title length : 30<br/>
							<input type=\"text\" style='width:50%;' name=\"title\" value=\"".$e['title']."\"/><br/><br/>
							<b>Author:</b>
							".ucfirst($e['author'])."<br/><br/>
							<b>Category:</b><br/>
							<select name=\"cat\">
								<option value=\"ct_news_event_info\">Info</option>
								<option value=\"ct_news_event_lot\">Prize</option>
								<option value=\"ct_news_event_end\">End</option>
							</select><br/><br/>
							<b>Status:</b><br/>
							<select name=\"status\">
								<option value=\"Active\">Active</option>
								<option value=\"Standby\">Standby</option>
							</select><br/><br/>
							<b>Content:</b> (HTML is allowed)<br/>
							<textarea name=\"content\" style=\"height:70px;width:60%;\">".stripslashes($e['content'])."</textarea><br/><br/>
							<input type=\"submit\" name=\"edit\" value=\"Edit Event\" />
			</form>";
				}else{
					$title = mysql_real_escape_string($_POST['title']);
					$cat = mysql_real_escape_string($_POST['cat']);
					$status = mysql_real_escape_string($_POST['status']);
					$content = mysql_real_escape_string($_POST['content']);
					if($title == ""){
						echo "You must enter a title.";
					}elseif(empty($cat)){
						echo "You must select a category.";
					}elseif($content == ""){
						echo "You must enter some content.";
					}else{
						$u = mysql_query("UPDATE `website_events` SET `title`='".$title."',`type`='".$cat."',`status`='".$status."',`content`='".$content."' WHERE `id`='".$id."'") or die(mysql_error());
						echo "The event has been edited.";
					}
				}
			}else{
				echo "<b>".$servername." Events</b><br/>
						Select an event to modify:<br/><br/>";
				$ge = mysql_query("SELECT * FROM `website_events` ORDER BY `id` DESC") or die(mysql_error());
				while($e = mysql_fetch_array($ge)){
					echo "
						[".$e['date']."] <a href=\"?page=event_manage&amp;events=edit_event&amp;action=edit&amp;id=".$e['id']."\">".$e['title']."</a> [#".$e['id']."]<br/>";
				}
			}
			echo "<br/><a href='?page=event_manage&events=home'>Return</a></center>";
	?>