<?php
if(basename($_SERVER["PHP_SELF"]) == "delete_notice.php"){
	die("Error 403 - Forbidden");
} 
?>

<?php
echo "<center><p class='ucpHeader'>Delete A News Article</p>";

			if(!isset($_POST['del'])){
				echo "
			<form method=\"post\" action=''>
							<b>Article:</b><br/>
							<select name=\"art\">
								<option value=\"\">Select Article...</option>";
				$gn = mysql_query("SELECT * FROM `web_news` ORDER BY `id` DESC") or die(mysql_error());
				while($n = mysql_fetch_array($gn)){
					echo "
								<option value=\"".$n['id']."\">#".$n['id']." - ".$n['title']."</option>";
				}
				echo "
							</select><br/><br/>
							<b>Are you sure?:</b><br/>
							<select name=\"dec\">
								<option value=\"0\">No</option>
								<option value=\"1\">Yes</option>
							</select><br/><br/>
							Please remember that this action <i>cannot</i> be undone.<br/>
							<input type=\"submit\" name=\"del\" value=\"Delete\" />
							<br/><br/><a href='?page=news_manage&notice=home'>Return</a>
			</form>";
			}else{
				$art = mysql_real_escape_string($_POST['art']);
				$dec = mysql_real_escape_string($_POST['dec']);
				if($art == ""){
					echo "Please select a news article to delete.<br/>";
				}elseif($dec == "0"){
					echo "The news article was not deleted.<br/>";
				}else{
					$d = mysql_query("DELETE FROM `web_news` WHERE `id`='".$art."'") or die(mysql_error());
					echo "The news article has been deleted.<br/>";
				}
				echo "<br/><a href='?page=news_manage&notice=edit_notice'>Return</a>";
			}
		echo "</center>";
?>