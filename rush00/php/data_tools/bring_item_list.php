<?php
function bring_item_list()
{
	$total = unserialize(file_get_contents("data_array", "./data_array"));
	if (!$total) {
		return (FALSE);
	}
	return($total);
}
?>