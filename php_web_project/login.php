<?php
session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: page5.php");
	}

require 'database.php';

//Hvis email og password er udfyldt
if (!empty($_POST['email']) && !empty($_POST['password'])):
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$message = '';
	
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
		
		$_SESSION['user_id'] = $results['id'];
		header('Location: page5.php');
	}else{
		$message = 'Sorry, email and password do not match';
		}
	
endif;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php include ("menu.php");?>


<h1>Login</h1>
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
    <?php endif; ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

<input type="text" placeholder="Enter your email" name="email">
<input type="password" placeholder="and password" name="password">
<input class="submit" type="submit">
</form>
<p style="text-align:center;">Not a user yet? <a href="register.php">register here</a></p>

</body>
</html>