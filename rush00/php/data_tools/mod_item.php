<?php
function mod_item($item, $item_cat, $item_desc){
	$total = unserialize(file_get_contents("data_array", "./data_array"));
	if (!$total[$item]){
		return (FALSE);
	}
	else {
		if ($item_cat != "") {
			$total[$item]["catagory"] = $item_cat;
		}
		if ($item_desc != ""){
			$total[$item]["description"] = $item_desc;
		}
		file_put_contents("./data_array", serialize($total));
		return (TRUE);
	}
}
?>