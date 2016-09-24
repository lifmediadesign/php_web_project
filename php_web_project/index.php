<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Web Project</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php include ("menu.php");?>


<?php
// man bruger htmlentities() hvis man skal bruge tegn som ikke understøttes af php eks. <> (kan også beskytte imod andre laver koder i kommentar sporet)
$str = "a<b>c";
echo htmlentities($str);
?>
<br>
<?php
//hvis favorit == rød, så vis "Your favorite color is red!"
$favcolor = "green";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;
    case "blue":
        echo "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
?>

<?php include ("footer.php");?>
</body>
</html>