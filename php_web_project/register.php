<?php
session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: page5.php");
	}
require 'database.php';

$message = '';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (!empty($_POST[$email]) && !empty($_POST['password'])):
 //indsæt ny bruger i databasen
 //at sætte parametre sikrer mod sql injektioner
 $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
 $stmt = $conn->prepare($sql);
 
 //Password_hash sikrer at koden bliver sværere at læse
 $stmt->bindParam(':email', $_POST['email']);
 $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
 
 //Denne if giver true eller false om brugeren har indsat brugernavn og password korrekt
 if( $stmt->execute() ):
 	$message = 'Succesfully created new user';
	else:
	$message = 'Sorry there must have been an issue creating your account';
	endif;
 
endif;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrer</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php 
include ("menu.php");
?>

<h1>Registrer</h1>
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
    <?php endif; ?>
    <!--The $_SERVER["PHP_SELF"] henviser til samme side som man er på
    htmlspecialchars() function, sikrer at hackere ikke kan bruge tegn-->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<input type="text" placeholder="Enter your email" name="email">
<input type="password" placeholder="and password" name="password">
<input type="password" placeholder="confirm password" name="confirm_password">

<input class="submit" type="submit">
</form>
<p style="text-align:center;">Already a user? <a href="login.php">login here</a></p>




</body>
</html>