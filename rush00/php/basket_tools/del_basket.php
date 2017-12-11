<?php
function del_basket($item, $bool, $login)
{
	if ($bool == "TRUE") {
		$total = unserialize(file_get_contents("actual_basket", "./basket/$login/actual_basket"));
		if (!$total[$item])
			return (FALSE);
		else{
			unset($total[$item]);
			file_put_contents("./basket/$login/actual_basket", serialize($total));
			return (TRUE);
		}
	}
	else{
		$total = unserialize(file_get_contents("temp_basket", "./basket/$login/temp_basket"));
		if (!$total[$item])
			return (FALSE);
		else{
			unset($total[$item]);
			file_put_contents("./basket/$login/temp_basket", serialize($total));
			return (TRUE);
		}
	}
}
?>
<?php
del_basket($_POST["item"], whoami(), $_SESSION["login"]);
header("location: ../cart.html");
?>
