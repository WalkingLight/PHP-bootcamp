<?php
function merge_basket($login, $login2){
	$total = unserialize(file_get_contents("temp_basket", "./basket/$login/temp_basket"));
	if (!$total){
		return (FALSE);
	}
	else{
		file_put_contents("./basket/$login2/actual_basket", serialize($total), FILE_APPEND);
		return(TRUE);
	}
}
?>