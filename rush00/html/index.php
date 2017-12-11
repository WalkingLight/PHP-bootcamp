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
	<link rel="stylesheet" href="css/index.css">
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
		<div>
			<a href="#" class="img_link"><img src="../resources/raspberrypi.png"/>
			<h3>Raspberry Pi</h3>The Raspberry Pi is a tiny and affordable computer that you can use to learn programming through fun, practical projects<br/><br/>R200.00</a>
		</div>
		<div>
			<a href="#" class="img_link"><img src="../resources/pocketchip.png"/>
			<h3>Pocket chip</h3>Don't Just Play the Game, Change the Game. 1000s of free games with built-in game making tools and it fits in Your Pocket.<br/><br/>R700.00</a>
		</div>
		<div>
			<a href="#" class="img_link"><img src="../resources/audrino.png"/>
			<h3>Arduino</h3>Open-source electronic prototyping platform enabling users to create interactive electronic objects.<br/><br/>R100.00</a>
		</div>
	</div>
</body>
</html>
