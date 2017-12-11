<?php
#include("../basket_tools/merge_basket.php");
#include("../basket_tools/clear_basket.php");

header("location: ../../html/index.php");
if (auth($_POST["login"], $_POST["passwd"]) == TRUE){
	#merge_basket($_SESSION["login"], $_POST["login"]);
	#clear_basket(whoami(), $_SESSION["login"]);
	session_start();
	$_SESSION["loggued_on_user"] = $_POST["login"];
	header("location: ../../html/index.php");
}
else{
	header("location: ../../html/index.php");
}
?>