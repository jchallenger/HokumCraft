<?php
if(basename($_SERVER["PHP_SELF"]) == "edit_notice.php"){
	die("Error 403 - Forbidden");
} 
?>

<?php
echo "<center><p class='ucpHeader'>Edit A News Article</p>";
			if(isset($_GET['id'])){
				$id = mysql_real_escape_string($_GET['id']);
				$gn = mysql_query("SELECT * FROM `website_news` WHERE `id`='".$id."'") or die(mysql_error());
				$n = mysql_fetch_array($gn);
				if(!isset($_POST['edit'])){
					echo "<font size='1.5'>
							<form method=\"post\" action=''>
				
							<b>Title:</b><br/>
							<input type=\"text\" style='width:50%;' name=\"title\" value=\"".$n['title']."\" /><br/><br/>
						
							<b>Author:</b><br/>
							".$n['author']."<br/><br/>
							
							<b>Category:</b><br/>
							<select name=\"cat\">
								<option value=\"ct_news_notice_notice\">Notice</option>
								<option value=\"ct_news_gameup\">Game Up</option>
							</select><br/><br/>
							
							<b>Content:</b> <i>(HTML is allowed)</i><br/>
							<textarea name=\"content\" style=\"height:70px;width:60%;\">".stripslashes($n['content'])."</textarea><br/><br/>
							
							<input type=\"submit\" name=\"edit\" value=\"Edit News Article\" />
			</form><br/><a href='?page=news_manage&notice=home'>Return</a>";
				}else{
					$title = mysql_real_escape_string($_POST['title']);
					$cat = mysql_real_escape_string($_POST['cat']);
					$content = mysql_real_escape_string($_POST['content']);
					if($title == ""){
						echo "You must enter a title.<br/><a href='?page=news_manage&notice=edit_notice'>Return</a>";
					}elseif(empty($cat)){
						echo "You must select a category.<br/><a href='?page=news_manage&notice=edit_notice'>Return</a>";
					}elseif($content == ""){
						echo "You must enter some content.<br/><a href='?page=news_manage&notice=edit_notice'>Return</a>";
					}else{
						$u = mysql_query("UPDATE `website_news` SET `title`='".$title."',`type`='".$cat."',`content`='".$content."' WHERE `id`='".$id."'") or die(mysql_error());
						echo "The news article has been updated.<br/><a href='?page=news_manage&notice=home'>Return</a>";
					}
				}
			}else{
				echo "<b>".$servername." News Articles</b><br/>";
				echo "Select a News Article to modify:<br/><br/>";
				$gn = mysql_query("SELECT * FROM `website_news` ORDER BY `id` DESC") or die(mysql_error());
				while($n = mysql_fetch_array($gn)){
					echo "[".$n['date']."] <a href=\"?page=news_manage&amp;notice=edit_notice&amp;action=edit&amp;id=".$n['id']."\">".$n['title']."</a> [#".$n['id']."]<br/>";
				}
				echo "<br/><a href='?page=news_manage&notice==home'>Return</a>";
			}
			echo "</center>";
?>