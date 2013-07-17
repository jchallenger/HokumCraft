<!-- START OF sources/navigation.php -->
<?php
function PageName() {
  return substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["REQUEST_URI"],"/")+1);
}

$current_page   = PageName();
?>
<center>
<?php echo  $current_page == 'index.php'      ? '_active' : NULL ?> 
<br/>
</center>


<center id="nav">
<div class="links">
<ul>
<center>
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