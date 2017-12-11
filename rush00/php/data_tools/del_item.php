<?php
function del_item($item){
	$total = unserialize(file_get_contents("data_array", "./data_array"));
	if (!$total[$item]) {
		return (FALSE);
	}
	else{
		unset($total[$item]);
	}
	file_put_contents("./data_array", serialize($total));
	return (TRUE);
}
?>