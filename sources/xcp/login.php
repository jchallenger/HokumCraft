<?php

if(basename($_SERVER["PHP_SELF"]) == "login.php"){die("Error!");}

function sql_sanitize( $sCode ) {
	if (function_exists("mysql_real_escape_string" ) ) {		
		$sCode = mysql_real_escape_string( $sCode );		
	} else { 
		$sCode = addslashes( $sCode );				
	}
	return $sCode;							
}
if (!isset($_POST['cpuser'])) 
{
//If not isset -> set with dumy value 
$_POST['cpuser'] = "undefine"; 
}
if (!isset($_POST['cppass'])) 
{
//If not isset -> set with dumy value 
$_POST['cppass'] = NULL; 
}
if(!isset($_SESSION['id'])) {
	if(!$_POST['cpuser'] || !$_POST['cppass']){
	
		echo '
		<form method="POST"><br/>
		<img src="./images/username.png" /><br/>
		<input class="loginInput" type="text" name="cpuser" size="14" maxlength="12" /><br/>
		<img src="./images/password.png" /><br/>
		<input class="loginInput" type="password" name="cppass" size="14" maxlength="30" /><br/><br/>
		<input type="image" src="./images/loginbtn.png" name="xcplogin" /><br/>
		</form>
		';
		
	} else {
	
		$xcpu = mysql_real_escape_string($_POST['cpuser']);
		$xcpp = mysql_real_escape_string($_POST['cppass']);
		$xcps = mysql_query("SELECT * FROM `". $userTable ."` WHERE `username`='".sql_sanitize($xcpu)."'") or die(mysql_error());
		$xcpi = mysql_fetch_array($xcps);
		if($xcpi['password'] == hash('sha512',$xcpp.$xcpi['salt']) || sha1($xcpp) == $xcpi['password']) {
			$sanitizename = sql_sanitize($xcpi['username']);
			$sanitizepass = sql_sanitize($xcpi['password']);
			$selectQ = mysql_query("SELECT * FROM `". $userTable ."` WHERE `username`='".$sanitizename."' AND `password`='".$sanitizepass."'") or die(mysql_error());
			$selectF = mysql_fetch_array($selectQ);
			$_SESSION['id'] = $selectF['id'];
			$_SESSION['name'] = $selectF['username'];
			if($selectF['webadmin'] == "1") { $_SESSION['webadmin'] = $selectF['webadmin']; }
			echo "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=\"?page=index\">";
		} else {
				echo "<br />The username or password is incorrect. Please try again.<br>You will be redirected in 1 second<br />
				<meta http-equiv='refresh' content='1;url=\"?page=index\"'><br />";
		} 
	}
} else {
		echo "<br/>Welcome, <font color=\"blue\">".ucfirst($_SESSION['name'])."</font>.<br/>";
		include("cp.php");
}
?>