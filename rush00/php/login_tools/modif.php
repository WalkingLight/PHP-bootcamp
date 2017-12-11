<?php
if ($_POST["submit"] != "OK")
	header("location: ../index.html");
if (file_get_contents("./private/passwd") == FALSE)
	header("location: ../index.html");
if (file_get_contents("./private/passwd") == "NULL"){
	header("location: ../index.html");}
$_total = unserialize(file_get_contents("./private/passwd", "./private/passwd"));
if (!$_total[$_POST["login"]]){
	header("location: ../index.html");}
if ($_total[$_POST["login"]]["passwd"] != hash("whirlpool", $_POST["oldpw"]))
	header("location: ../index.html");
if ($_POST["newpw"] =="")
	header("location: ../index.html");
$_total[$_POST["login"]]["passwd"] = hash("whirlpool", $_POST["newpw"]);
file_put_contents("./private/passwd", serialize($_total));
header("location: ../index.html");
?>