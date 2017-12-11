<?php
if ($_POST["submit"] != "OK")
	header("location: ../index.html");
if (file_exists("./private/passwd") == FALSE){
	mkdir("./private");
	file_put_contents("./private/passwd", "NULL");
}
if (file_get_contents("./private/passwd") == "NULL"){
    $arr = array(
		"login" => $_POST["login"],
		"passwd" => hash("whirlpool", $_POST["passwd"])
    );
	$_total = array(
		$_POST["login"] => $arr
    );
	file_put_contents("./private/passwd", serialize($_total));
}
else {
	$_total = unserialize(file_get_contents("./private/passwd", "./private/passwd"));
	if (!$_total[$_POST["login"]]){
      $arr = array(
        "login" => $_POST["login"],
        "passwd" => hash("whirlpool", $_POST["passwd"])
      );
      $_total[$_POST["login"]] = $arr;
      file_put_contents("./private/passwd", serialize($_total));
	}
}
header("location: ../index.html");
?>