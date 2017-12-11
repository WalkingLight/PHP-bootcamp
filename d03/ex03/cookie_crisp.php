<?PHP

if (isset($_GET["action"]) && isset($_GET["name"]))
{
	if ($_GET["action"] === "set" && isset($_GET["value"]))
		setcookie($_GET["name"], $_GET["value"], time() + 3600);
	else if ($_GET["action"] === "get")
		echo $_COOKIE[$_GET["name"]]."\n";
	else if ($_GET["action"] === "del")
		setcookie($_GET["name"]);
}

?>
