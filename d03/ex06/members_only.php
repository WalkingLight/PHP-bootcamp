<?PHP

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

if ($user === 'zaz' && $pass === 'Ilovemylittleponey')
{
	header('Content-Type: text/html');
	$file = base64_encode(file_get_contents("../img/42.png"));
	echo "<html><body>\nHello Zaz<br />\n<img src='data:image;base64,$file'>\n</body></html>";
}
else
{
	header("HTTP/1.0 401 Unauthorised");
	header("Date: Tue, 26 Mar 2013 09:42:42 GMT");
	header("WWW-Authenticate: Basic realm=''Member area''");
	header_remove("Authentication problem. Ignoring this.");
	echo "<html><body>That area is accessable for members only</body></html>";
}
?>
