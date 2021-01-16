<?php session_start();?>

<nav>
	<a href="/egames/Controller/logout.php" class="log" style="<?php if(isset($_SESSION['logged'])){echo "display: inline-block";}else{echo "display: none";}?>">Logout</a>
	<a href="/egames/View/login.php" class="log" style="<?php if(isset($_SESSION['logged'])){echo "display: none";}else{echo "display: inline-block";}?>">Login</a>
	<div style="clear:both"></div>
</nav>
