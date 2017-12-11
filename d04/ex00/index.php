<?PHP

session_start();
if ($_GET["submit"] == "OK" &&
	$_GET["login"] !== "" && $_GET["passwd"] !== "")
{
	$_SESSION["login"] = $_GET["login"];
	$_SESSION["passwd"] = $_GET["passwd"];
}
if ($_SESSION["login"] === NULL)
	$login = "";
else
	$login = $_SESSION["login"];
if ($_SESSION["passwd"] === NULL)
	$passwd = "";
else
	$passwd = $_SESSION["passwd"];

?>
<html><body>
<form>
	Username: <input name="login" value="<?PHP echo $login ?>" type="text"/>
	<br />
	Password: <input name="passwd" value="<?PHP echo $passwd ?>" type="password"/>
	<input type="submit" name="submit" value="OK"/>
</form>
</body></html>
