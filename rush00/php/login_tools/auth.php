<?php
function auth($login, $passwd)
{
	if (file_get_contents("./private/passwd") == FALSE)
		return ("FALSE\n");
	if (file_get_contents("./private/passwd") == "NULL") {
		return ("FALSE\n");
	}
	$_total = unserialize(file_get_contents("./private/passwd", "./private/passwd"));
	if (!$_total[$login]) {
		return ("FALSE\n");
	}
	if ($_total[$login][$passwd] != hash("whirlpool", $passwd))
		return ("FALSE\n");
	return ("TRUE\n");
}
?>