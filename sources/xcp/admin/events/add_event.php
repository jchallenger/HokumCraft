<?php
if(basename($_SERVER["PHP_SELF"]) == "add_event.php"){
	die("Error 403 - Forbidden");
} 

if(isset($_SESSION['id'])){
	if(isset($_SESSION['admin'])){

echo "<center><p class='ucpHeader'>Add An Event</p>";
				if(!isset($_POST['add'])){
					echo "<font size='1.5'>
			<form method=\"post\" action=''>
							<b>Title:</b><br>
							Max title length : 30<br/>
							<input type=\"text\" style='width:50%;' name=\"title\" /><br/><br/>
							<b>Author:</b>
							".ucfirst($_SESSION['name'])."<br/><br/>
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
							<textarea name=\"content\" style=\"height:70px;width:60%;\"></textarea><br/><br/>
							<input type=\"submit\" name=\"add\" value=\"Add Event\" /><br/><a href='?page=event_manage&events=home'>Return</a>
			</form></center>";
				}else{
					$title = mysql_real_escape_string($_POST['title']);
					$date = date("m.d");
					$cat = mysql_real_escape_string($_POST['cat']);
					$status = mysql_real_escape_string($_POST['status']);
					$content = mysql_real_escape_string($_POST['content']);
					if($title == ""){
						echo "You must enter a title.<br/><a href='?page=event_manage&events=add_event'>Return</a>";
					}elseif($cat == ""){
						echo "You must select a category.<br/><a href='?page=event_manage&events=add_event'>Return</a>";
					}elseif($content == ""){
						echo "You must enter some content.<br/><a href='?page=event_manage&events=add_event'>Return</a>";
					}else{
						$i = mysql_query("INSERT INTO `website_events` (`title`,`author`,`date`,`type`,`status`,`content`) VALUES ('".$title."','".$_SESSION['name']."','".$date."','".$cat."','".$status."','".$content."')") or die(mysql_error());
						echo "<br/><br/>Your event has been posted.<br/><a href='?page=event_manage&events=home'>Return</a>";
					}
				}
				
				}
				}
				
				?>