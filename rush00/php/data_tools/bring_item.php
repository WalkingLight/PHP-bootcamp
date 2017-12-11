<?php
function bring_item($item)
{
	$total = unserialize(file_get_contents("data_array", "./data_array"));
	if (!$total[$item]) {
		return (FALSE);
	}
	return($total[$item]);
}
?>