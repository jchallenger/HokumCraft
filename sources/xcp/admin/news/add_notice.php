<?php
if(basename($_SERVER["PHP_SELF"]) == "add_notice.php"){
	die("Error 403 - Forbidden");
} 
?>

<?php
echo "<center><p class='ucpHeader'>Add A News Article</p>";
				if(!isset($_POST['add'])){
					echo "<font size='1.5'>
			<form method=\"post\" action=''>
							<b>Title:</b><br>
							Max title length : 30<br>
							<input type=\"text\" style='width:50%;' name=\"title\" /><br><br>

							<b>Author:</b><br>
							".ucfirst($_SESSION['name'])."<br><br>
					
							<b>Category:</b><br>					
							<select name=\"cat\">
								<option value=\"ct_news_notice_notice\">Notice</option>
								<option value=\"ct_news_gameup\">Game Up</option>
							</select><br><br>
							
							<b>Content:</b> (HTML is allowed)<br>
						
							<textarea name=\"content\" style=\"height:120px;width:80%;\"></textarea><br><br>				
							<input type=\"submit\" name=\"add\" value=\"Add News Article\" />
							</form>";
				}else{
					$title = mysql_real_escape_string($_POST['title']);
					$author = $_SESSION['name'];
					$date = date("m.d");
					$cat = mysql_real_escape_string($_POST['cat']);
					$content = mysql_real_escape_string($_POST['content']);
					if($title == ""){
						echo "You must enter a title.";
					}elseif(empty($cat)){
						echo "You must select a category.";
					}elseif($content == ""){
						echo "You must enter some content.";
					}else{
						$i = mysql_query("INSERT INTO `web_news` (`title`,`author`,`type`,`date`,`content`) VALUES ('".$title."','".$author."','".$cat."','".$date."','".$content."')") or die(mysql_error());
						echo "Your news article has been posted.";
					}
				}
				echo "<br/><a href='?page=news_manage&notice=home'>Return</a>";
				echo "</center>";
?>