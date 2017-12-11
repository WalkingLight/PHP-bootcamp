<?php
function clear_basket($bool, $login)
{
	if ($bool == "TRUE") {
		$total = unserialize(file_get_contents("actual_basket", "./basket/$login/actual_basket"));
		if (!$total)
			return (FALSE);
		else {
			file_put_contents("./basket/$login/temp_basket", "");
			return (TRUE);
		}
	}
	else {
		$total = unserialize(file_get_contents("temp_basket", "./basket/$login/temp_basket"));
		if (!$total)
			return (FALSE);
		else {
			file_put_contents("./basket/$login/temp_basket", "");
			return (TRUE);
		}
	}
}
?>
<?php
clear_basket(whoami(), $_SESSION["login"]);
header("location: ../cart.html");
?>
