<?php

require "./pages/DonationCenter/config.php";
require "./pages/DonationCenter/connect.php";

// Determining the URL of the page:
$url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"]);

// Fetching the number and the sum of the donations:
list($number,$sum) = mysql_fetch_array(mysql_query("SELECT COUNT(*),SUM(amount) FROM dc_donations"));

// Calculating how many percent of the goal were met:
$percent = round(min(100*($sum/($goal+1)),100));

// Building a URL with Google's Chart API:
$chartURL = 'http://chart.apis.google.com/chart?chf=bg,s,f9faf7&amp;cht=p&amp;chd=t:'.$percent.',-'.(100-$percent).'&amp;chs=200x200&amp;chco=639600&amp;chp=1.57';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donation Center | Tutorialzine demo</title>

<link rel="stylesheet" type="text/css" href="./css/vstyles.css" />

</head>

<body>

<!--<div id="main">-->
    <h1>Donation Center</h1>
    <h2>Show Your Support for our Cause</h2>
    
    <!--<div class="lightSection">-->
    	<h3>Hello, dear visitor!</h3>
    	<p>This is Tutorialzine's Donation Center. It utilizes PayPal's APIs to bring you a fully fledged donation solution. It is currently in <strong>Demo Mode</strong>, which means that PayPal is bypassed and you can donate as much as you want to test the functionality. You can, however, just change a variable in the config.php file to enable real donations.</p>    
        
        <!-- The PayPal Donation Button -->
        <form action="<?php echo $payPalURL?>" method="post">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="MHM6MK95FFAXW">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>

      

    <!--</div>-->
    
    <!-- Setting the Google Chart API address as the background image of the div: -->
    
    <div class="chart" style="background:url('<?php echo $chartURL?>');">
    	Our Goal
    </div>
    
    <div class="donations">
    	<?php echo $percent?>% done
    </div>
    
    
    <div class="clear"></div>
    
    <div class="donors">
        <h3>The Donor List</h3>
        <h4>Folks Who Showed Their Support</h4>
        
        <div class="comments">
        
        <?php
			$comments = mysql_query("SELECT * FROM dc_comments ORDER BY id DESC");
			
			// Building the Donor List:
			
			if(mysql_num_rows($comments))
			{
				while($row = mysql_fetch_assoc($comments))
				{
					?>
                    
                       	<div class="entry">
                            <p class="comment">
                            <?php 
								echo nl2br($row['message']); // Converting the newlines of the comment to <br /> tags
							?>
                            <span class="tip"></span>
                            </p>
                            
                            <div class="name">
                                <?php echo $row['name']?> <a class="url" href="<?php echo $row['url']?>"><?php echo $row['url']?></a>
                            </div>
                        </div>
                    
					<?php
				}
			}
		?>
        
            
        </div> <!-- Closing the comments div -->
        
    </div> <!-- Closing the donors div -->
    
<!--</div> <!-- Closing the main div -->


</body>
</html>
