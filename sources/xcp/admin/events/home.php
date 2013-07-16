<?php
if(basename($_SERVER["PHP_SELF"]) == "home.php"){
	die("Error 403 - Forbidden");
} 
?>
<center>
<p class="ucpHeader">Event Manager</p>
<br/>

<a href="?page=event_manage&events=add_event">Add Events</a><br/><br/>
<a href="?page=event_manage&events=edit_event">Edit Events</a><br/><br/>
<a href="?page=event_manage&events=delete_event">Delete Events</a><br/><br/>
</center>