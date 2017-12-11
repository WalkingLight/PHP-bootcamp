<?PHP

function error()
{
	echo "ERROR\n";
	exit();
}

if ($_POST["submit"] !== "OK")
	error();
if (!$_POST["login"] || !$_POST["passwd"])
	error();

if (file_exists("../private/passwd"))
	$file = unserialize(file_get_contents("../private/passwd"));
$login_count = 0;
foreach ($file as $key => $value)
{
	if ($value["login"] === $_POST["login"])
		error();
	if ($key > $login_count)
		$login_count = $key;
}
$file[$login_count + 1]["login"] = $_POST["login"];
$file[$login_count + 1]["passwd"] = hash("whirlpool", $_POST["passwd"]);
@mkdir ("../private/");
file_put_contents("../private/passwd", serialize($file));
echo "OK\n";

?>
