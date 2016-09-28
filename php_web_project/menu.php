<header><h1>PHP Project</h1></header>

<?php

// PHP_SELF viser hvilken sti vi er på
// basename viser kun det sidste i URL'en
$curpage = basename ($_SERVER['PHP_SELF']);

?>
<ul>
<li><a href="index.php" <?php if ($curpage == 'index.php'){ echo 'class="active"';} ?>>Home</a></li>
<li><a href="page1.php" <?php if ($curpage == 'page1.php'){ echo 'class="active"';} ?>>Page1</a></li>
<li><a href="page2.php" <?php if ($curpage == 'page2.php'){ echo 'class="active"';} ?>>Page2</a></li>
<li><a href="page3.php" <?php if ($curpage == 'page3.php'){ echo 'class="active"';} ?>>Page3</a></li>
<li><a href="page4.php" <?php if ($curpage == 'page4.php'){ echo 'class="active"';} ?>>Page4</a></li>
<li style="float:right;"><a href="page5.php" <?php if ($curpage == 'page5.php'){ echo 'class="active"';} ?>>Login</a></li>
</ul>



