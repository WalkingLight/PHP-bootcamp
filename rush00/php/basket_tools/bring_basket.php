<?php
function bring_basket($bool, $login)
{
	if ($bool == "TRUE") {
		$total = unserialize(file_get_contents("actual_basket", "./basket/$login/actual_basket"));
		if (!$total)
			return (FALSE);
		else {
			return ($total);
		}
	}
	else {
		$total = unserialize(file_get_contents("temp_basket", "./basket/$login/temp_basket"));
		if (!$total)
			return (FALSE);
		else {
			return ($total);
		}
	}
}
?>