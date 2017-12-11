<?php
function add_item($item, $item_cat, $item_desc){
	$total = unserialize(file_get_contents("data_array", "./data_array"));
	if ($total[$item]){
		return (FALSE);
	}
	else{
		$total[$item] = array(
			"item" => $item,
			"description" => $item_desc,
			"catagory" => $item_cat
		);
		file_put_contents("./data_array", serialize($total));
		return (TRUE);
	}
}
?>