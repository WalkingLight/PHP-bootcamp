#!/usr/bin/php
<?php

function	ft_is_sort($arr)
{
	for ($i = 1; isset($arr[$i]); $i++)
	{
		if ($arr[$i] < $arr[$i - 1])
			return (false);
	}
	return (true);
}

?>
