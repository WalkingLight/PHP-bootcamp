<?PHP

include("../php/login_tools/whoami.php");

if (whoami())
{
	$login  = 'hello '.$_SESSION['loggued_on_user'];
	$test = '<a href="login.php" ><h3 class="right_login">'.$login.'</h3></a>';
	
}
else
{
	$test = '<a href="login.php" ><h3 class="right_login">Login</h3></a>';
}

?>

<html>
<head>
	<title>WTC_Shop</title>
	<link rel="stylesheet" href="css/header.css"/>
	<link rel="stylesheet" href="css/login.css">
	<link rel="icon" href="../resources/42_Logo.png" type="image/png"/>
</head>
<body>
	<div id="header">
		<a href="index.php"><div class="top_42">
			<img class="left_42" src="../resources/42_Logo.png" title="42"/>
		</div></a>
		<div class="center_header">
			<h1 class="center_name">WTC_Shop</h1>
			<a href="#" ><img class="right_basket" src="../resources/ShoppingCart.png"/></a>
			<?PHP echo $test ?>
		</div>
	</div>
	<div id="container">
		<form action="../php/login_tools/login.php" method="POST">
			 Username: <input type="text" name="login" value="" class="input"><br />
			 Pass word: <input type="password" name="passwd" value="" class="input"><br />
			<input class="button" type="submit" name="submit" value="OK">
		</form>
	</div>
</body>
</html>
