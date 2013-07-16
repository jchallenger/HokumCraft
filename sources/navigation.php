<!-- START OF sources/navigation.php -->
<? function PageName() {
  return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

$current_page = PageName();
?>

<center id="nav">
<div class="links">
<ul>
<center>
<?php echo $current_page ?>
<li><a class="nav_link<?php $current_page == 'index.php'      ? '_active' : NULL ?>" href="index.php"       >Home</a></li>
<li><a class="nav_link<?php $current_page == '?page=register' ? '_active' : NULL ?>" href="?page=register"  >Register</a></li>
<li><a class="nav_link<?php $current_page == '?page=download' ? '_active' : NULL ?>" href="?page=download"  >Download</a></li>
<li><a class="nav_link<?php $current_page == '?page=ranking'  ? '_active' : NULL ?>" href="?page=ranking"   >Ranking</a></li>
<li><a class="nav_link<?php $current_page == '?page=donate'   ? '_active' : NULL ?>" href="?page=donate"    >Donate</a></li>
</center>
</ul>
</div>
</center>

<!-- END OF sources/navigation.php -->