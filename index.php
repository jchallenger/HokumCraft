<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html>
<head>
<?php    include('includes/header.php');    ?>
</head>

<body>
<div id="sitebg"> </div>
<!-- MAIN WRAPPER -->
<div id="wrapper">
<!-- CONTENT [WRAP] -->
<div id="content">
    <!-- SIDEBAR -->
    <div id="sidebar">
        <?php include("./sources/leftbar.php"); ?>
    </div>
    <!-- ANNOUNCEMENT -->
    <div id="topbarbg">
    <div id="topbar">
        <marquee behavior="scroll" direction="left" scrollamount="5" scrolldelay="80">
        <?php echo $MCServer->GetInfo()['HostName']; ?>
        </marquee>
    </div>
    </div>
    <!-- PAGE -->
    <div id="main">

    <?php
    $getpage = isset($_GET['page']) ? $_GET['page'] : "";

        switch($getpage){
            case NULL:
                include("pages/home.php");
                break;
            case "ThankYou":
                include("pages/DonationCenter/thankyou.php");
                break;
            case "commands":
                include("pages/commands.php");
                break;
            case "register":
                include("pages/register.php");
                break;
            case "download":
                include("pages/download.php");
                break;
            case "dynmap":
                include("pages/dynmap.php");
                break;
            case "community":
                include("pages/community.php");
                break;
            case "ranking":
                include("pages/ranking.php");
                break;
            case "donate":
                include("pages/DonationCenter/donate.php");
                break;
            case "logout";
                include("sources/xcp/logout.php");
                break;
            case "charfix";
                include("sources/xcp/user/charfix.php");
                break;
            case "accsettings";
                include("sources/xcp/user/account.php");
                break;
            case "news_manage";
                include("sources/xcp/admin/news/index.php");
                break;
            case "event_manage";
                include("sources/xcp/admin/events/index.php");
                break;
            case "news";
                include("pages/news.php");
                break;
            case "events";
                include("pages/events.php");
                break;
            case "chat";
                include("pages/chat.php");
                break;  
            default:
                include("pages/home.php");
            break;
            }
    ?>

    </div>

</div>
<?php
include('includes/footer.php');
?>

</div>
</body>
</html>