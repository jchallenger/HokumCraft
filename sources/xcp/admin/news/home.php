<?php
if(basename($_SERVER["PHP_SELF"]) == "home.php"){
	die("Error 403 - Forbidden");
} 
?>

<center>
<p class="ucpHeader">News Manager</p>
<br/>

<a href="?page=news_manage&notice=add_notice">Add Notice</a><br/><br/>
<a href="?page=news_manage&notice=edit_notice">Edit Notice</a><br/><br/>
<a href="?page=news_manage&notice=delete_notice">Delete Notice</a><br/><br/>
</center>