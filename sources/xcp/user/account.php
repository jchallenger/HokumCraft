<center>
<p class="ucpHeader">Account Settings</p>

<?php
if(isset($_SESSION['id'])) {
	if(!isset($_POST['modify'])){
		$query = mysql_query("SELECT * FROM `".$userTable."` WHERE `id`='".$_SESSION['id']."'") or die(mysql_error());
		$row = mysql_fetch_array($query);
		?>
		<center>
		<table cellspacing=1 cellpadding=5>
		<tr><td class=listtitle colspan=2><center><span class='title2'></span></center></td></tr>
		<?php
		echo "
		<form method=\"POST\">
		<tr><td class=list align=left>Username:</td><td class=list> ".$row['username']."<br></td></tr>
		<tr><td class=list align=left>Current Password:</td><td class=list> <input type=\"password\" name=\"current\" maxlength=\"12\"><br></td></tr>
		<tr><td class=list align=left>New Password:</td><td class=list> <input type=\"password\" name=\"password\" maxlength=\"12\"><br></td></tr>
		<tr><td class=list align=left>Confirm Password:</td><td class=list> <input type=\"password\" name=\"cpassword\" maxlength=\"12\"><br></td></tr>
		<tr><td class=list align=left>E-mail:</td><td class=list> <input type=\"text\" name=\"email\" value=\"".$row['email']."\"><br></td></tr>
		<tr><td class=listtitle align=left colspan=2><center><input type=\"submit\" name=\"modify\" value=\"Modify\"></form></td></tr></center>";
	} else {
		$u = mysql_query("SELECT * FROM `".$userTable."` WHERE `id`='".$_SESSION['id']."'") or die(mysql_error());
		$user = mysql_fetch_array($u);
		$current = mysql_real_escape_string($_POST['current']);
		$pass = mysql_real_escape_string($_POST['password']);
		$cpass = mysql_real_escape_string($_POST['cpassword']);
		$email = mysql_real_escape_string($_POST['email']);
		$birth = mysql_real_escape_string($_POST['birth']);		
		if($current) {
			if($user['password'] == hash('sha512',$current.$user['salt']) || sha1($current) == $user['password']) {
				if($pass != $cpass) {
					echo "Passwords do not match!";
				} else {
					if(strlen($pass) < 6) {
						echo "Your password must be between 6 and 12 characters!";
					} elseif(strlen($pass) > 12) {
						echo "Your password must be between 6 and 12 characters!";
					} else {
						$u = mysql_query("UPDATE `".$userTable."` SET `password`='".sha1($pass)."',`salt`=NULL WHERE `name`='".$user['name']."'") or die(mysql_error());
						echo "Your changes have been saved.";
					}
				}
			} else {
				echo "Your current password is wrong!";
			}
		} elseif($email == "") {
			echo "Please supply an e-mail!";
		} else {
			$u = mysql_query("UPDATE `".$userTable."` SET `email`='".$email."',`birthday`='".$birth."' WHERE `name`='".$user['name']."'") or die(mysql_error());
			echo "Your changes have succesfully been saved to the database!";
		}
	}
	echo "</fieldset>";
} else {
	echo "You are not logged in.";
}
echo "</td></tr></table>";
?>

