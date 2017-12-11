<?PHP

function error()
{
	echo "ERROR\n";
	exit();
}

if ($_POST["submit"] !== "OK")
	error();
if (!$_POST["login"] || !$_POST["newpw"] || !$_POST["oldpw"])
	error();

if (!($file_serialized = file_get_contents("../private/passwd")))
	error();
$file = unserialize($file_serialized);
$found = -1;
foreach ($file as $key => $value)
{
	if ($value["login"] === $_POST["login"])
	{
		$found = $key;
		break;
	}
}
if ($found == -1 || $file[$found]["passwd"] !== hash("whirlpool", $_POST["oldpw"]))
	error();
$file[$found]["passwd"] = hash("whirlpool", $_POST["newpw"]);
file_put_contents("../private/passwd", serialize($file));
echo "OK\n";

?>
