<?php
/** 
 * Convert number of seconds into hours, minutes and seconds 
 * and return an array containing those values 
 * 
 * @param integer $inputSeconds Number of seconds to parse 
 * @return array 
 */ 

function secondsToTime($inputSeconds) {

    $secondsInAMinute = 60;
    $secondsInAnHour  = 60 * $secondsInAMinute;
    $secondsInADay    = 24 * $secondsInAnHour;

    // extract days
    $days = floor($inputSeconds / $secondsInADay);

    // extract hours
    $hourSeconds = $inputSeconds % $secondsInADay;
    $hours = floor($hourSeconds / $secondsInAnHour);

    // extract minutes
    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = floor($minuteSeconds / $secondsInAMinute);

    // extract the remaining seconds
    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = ceil($remainingSeconds);

    // return the final array
    $obj = array(
        'd' => (int) $days,
        'h' => (int) $hours,
        'm' => (int) $minutes,
        's' => (int) $seconds,
    );
    return $obj;
}
?>

<center>


<?php
if(isset($_SESSION['id'])) {
	echo "<p class='ucpHeader'>Your Stats</p>";
		$name = $_SESSION['name'];
		$g = mysql_query("SELECT * FROM `Stats_Player` WHERE `player`='".$name."'") or die(mysql_error());
		$u = mysql_fetch_array($g);
		
		echo "
		<table>
		<tr><td class=list align=left>Time Played:</td>		<td class=list align=right> ".secondsToTime($u['playtime'])['d']." days, ".secondsToTime($u['playtime'])['h']." hours, ".secondsToTime($u['playtime'])['m']."mins and ".secondsToTime($u['playtime'])['s']." seconds.<br></td></tr>
		<tr><td class=list align=left>Exp Gained:</td>		<td class=list align=right> ".$u['xpgained']."<br></td></tr>
		<tr><td class=list align=left>Damage Taken:</td>	<td class=list align=right> ".$u['damagetaken']."<br></td></tr>
		</table>
		";
	
	echo "<p class='ucpHeader'>Your Skills</p>";
		$usr 	= mysql_query("SELECT * FROM `mcmmo_users` WHERE `user`='".$name."'") or die(mysql_error());
		$usrF 	= mysql_fetch_array($usr);
		
		$q 		= mysql_query("SELECT * FROM `mcmmo_skills` WHERE `user_id`='".$usrF['id']."'") or die(mysql_error());
		$mcmmo 	= mysql_fetch_array($q);
		
		echo "
		<table>
		<tr><td class=list align=left>Mining:</td>			<td class=list align=right> ".$mcmmo['mining']."<br></td></tr>
		<tr><td class=list align=left>Wood Cutting:</td>	<td class=list align=right> ".$mcmmo['woodcutting']."<br></td></tr>
		<tr><td class=list align=left>Excavation:</td>		<td class=list align=right> ".$mcmmo['excavation']."<br></td></tr>
		<tr><td class=list align=left>Swords:</td>			<td class=list align=right> ".$mcmmo['swords']."<br></td></tr>
		<tr><td class=list align=left>Archery:</td>			<td class=list align=right> ".$mcmmo['archery']."<br></td></tr>
		<tr><td class=list align=left>Axes:</td>			<td class=list align=right> ".$mcmmo['axes']."<br></td></tr>
		<tr><td class=list align=left>Unarmed:</td>			<td class=list align=right> ".$mcmmo['unarmed']."<br></td></tr>
		<tr><td class=list align=left>Herbalism:</td>		<td class=list align=right> ".$mcmmo['herbalism']."<br></td></tr>
		<tr><td class=list align=left>Acrobatics:</td>		<td class=list align=right> ".$mcmmo['acrobatics']."<br></td></tr>
		</table>
		";
	}
?>
</center>
