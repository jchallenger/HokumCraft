<p class="mainHeader">Register<br/>
<img src="./images/linefade.png"></p>
<center>
<?php

if(!isset($_SESSION['id'])) {
if (!@$_POST["register"] == 1) {
?>
<form action="?page=register" method="POST">
Username:<br/>
<input type="text" name="cusername" maxlength="12" /><br/>
Password:<br/>
<input type="password" name="cpassword" maxlength="30" /><br/>
Repeat Password:<br/>
<input type="password" name="cpassword2" maxlength="30" /><br/>
E-Mail:<br/>
<input type="text" name="cemail" maxlength="50" /><br/><br/>
<br/>
<?php if($captcha == true) {?>
<img src="functions/captcha.php" alt="Captcha" /><br/>
<input class="fieldlong" type="text" name="ccaptcha" /><br/>
<?php } ?>
<input type="submit" class="submit" name="submit" value=" Register"/><br/>
<input type="hidden" name="register" value="1" />
<?php
} else {
	$username 	= mysql_real_escape_string($_POST['cusername']);
	$pass 		= mysql_real_escape_string($_POST['cpassword']);
	$pass2 		= mysql_real_escape_string($_POST['cpassword2']);
	$email 		= mysql_real_escape_string($_POST['cemail']);
	if($captcha == true) {	$captcha = mysql_real_escape_string($_POST['captcha']); }
		
	//$usersafe = stripslashes($username);
	$query = "SELECT `id` FROM `authme` WHERE `username`='".$username."' OR `email`='".$email."' LIMIT 1";
	$checka = mysql_query($query);
	$rows = mysql_num_rows($checka);
	
	if($rows > 0) {
	die("Username or e-mail is already used."); 
	}
	
	if($username & $pass & $pass2 & $email & $dobd & $dobm & $doby)	{
	if($pass == $pass2) {
		if(strstr($email, "@")){
            if(strlen($username) > 3 & strlen($username) < 13) {
                if(strlen($pass) > 3 & strlen($pass) < 13) {
                    if($captcha == true & $captcha != $_SESSION['captcha_code']) { die("Incorrect Captcha."); }
                    $safeuser	= sql_sanitize($username);
                    $safepw		= sql_sanitize($pass);
                    $safemail	= sql_sanitize($email);
                    $safedobf	= sql_sanitize($doby)."-".sql_sanitize($dobm)."-".sql_sanitize($dobd);
                    $ip			= "/".$_SERVER['REMOTE_ADDR'];
                    $addUserQ = "INSERT INTO authme (`username`, `password`, `ip`, `email`) VALUES ('".$safeuser."', '".hash("sha1", $safepw)."', '".$ip."', '".$safemail."')";
                    $addUser  = mysql_query($addUserQ) or die(mysql_error());
                    echo "You have successfully registered to $servername!<br/><a href='?page=home'>Return</a>";
                } else {
                    echo "Password has to be between 4 and 12 characters.<br/><a href='?page=register'>Return</a>";
                }
            } else {
                echo "Username has to be between 4 and 12 characters.<br/><a href='?page=register'>Return</a>";
            }
		} else {
			echo "Invalid E-Mail.<br/><a href='?page=register'>Return</a>";
		}
	} else {
	echo "Passwords doesn't match.<br/><a href='?page=register'>Return</a>";
	}
	} else {
	echo "Please fill out all forms.<br/><a href='?page=register'>Return</a>";
	}
}
} else {
echo "You are already registered.";
}
?>