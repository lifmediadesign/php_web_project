<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){
	
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$user = NULL;
	if( count($results) > 0){
			$user = $results;
		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Page 5</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php include ("menu.php");?>

<?php if( !empty($user) ):?>
<br><h2>Hi, <?= $user['email']; ?> You are logged in!</h2>
<div class="page5"></div>
<a href="logout.php">Logout</a>
<?php else: ?>

<h1>Please login</h1>
<a href="login.php">Login</a><p>or</p>
<a href="register.php">Register</a>

<?php endif; ?>
<?php include ("footer.php");?>
</body>
</html>