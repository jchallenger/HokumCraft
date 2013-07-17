<?php

/* Database config */

$db_host		= 'localhost';
$db_user		= 'minecraft';
$db_pass		= 'tricker9132';
$db_database	= 'minecraft_hokumcraft';

/* End config */


$link = @mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_set_charset('utf8');
mysql_select_db($db_database,$link);

?>