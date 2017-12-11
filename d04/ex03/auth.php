<?PHP

function auth($login, $passwd)
{
	$file_serialized = @file_get_contents("../private/passwd");
	if (!$file_serialized)
		return false;
	$file = unserialize($file_serialized);
	$hash = hash("whirlpool", $passwd);
	foreach ($file as $key)
		if ($key["login"] === $login && $key["passwd"] === $hash)
			return true;
	return false;
}

?>
