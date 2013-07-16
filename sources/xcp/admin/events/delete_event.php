<?php
if(basename($_SERVER["PHP_SELF"]) == "delete_event.php"){
	die("Error 403 - Forbidden");
} 
?>

<?php
echo "<center><p class='ucpHeader'>Delete An Event</p>";
if(!isset($_POST['del'])){
				echo "
			<form method=\"post\" action=''>
							<b>Event:</b><br/>
							<select name=\"event\"><br/>
								<option value=\"\">Select Event...</option>";
				$ge = mysql_query("SELECT * FROM `website_events` ORDER BY `id` DESC") or die(mysql_error());
				while($e = mysql_fetch_array($ge)){
					echo "
								<option value=\"".$e['id']."\">#".$e['id']." - ".$e['title']."</option>";
				}
				echo "		</select><br/><br/>
							<b>Are you sure?:</b><br/>
							<select name=\"dec\">
								<option value=\"0\">No</option>
								<option value=\"1\">Yes</option>
							</select><br/><br/>
							Please remember that this action <i>cannot</i> be undone.<br/>
							<input type=\"submit\" name=\"del\" value=\"Delete\" />
							</form><br/><a href='?page=event_manage&events=home'>Return</a>";
			}else{
				$event = mysql_real_escape_string($_POST['event']);
				$dec = mysql_real_escape_string($_POST['dec']);
				if($event == ""){
					echo "Please select an event to delete.<br/><a href='?page=event_manage&events=delete_event'>Return</a>";
				}elseif($dec == "0"){
					echo "You selected \"No\". The event was not deleted.<br/><a href='?page=event_manage&events=delete_event'>Return</a>";
				}else{
					$d = mysql_query("DELETE FROM `website_events` WHERE `id`='".$event."'") or die(mysql_error());
					echo "The event has been deleted.<br/><a href='?page=event_manage&events=home'>Return</a>";
				}
			}
			echo "</center>";
			?>
			