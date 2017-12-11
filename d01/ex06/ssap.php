#!/usr/bin/php
<?php

function	ft_split($str)
{
	$str = preg_replace("/ +/", ' ', $str);
	return (explode(' ', $str));
}

if ($argc == 1)
	return;

$arr = ft_split($argv[1]);
for ($i = 2; $i < $argc; $i++)
	$arr = array_merge($arr, ft_split($argv[$i]));
sort($arr);
foreach ($arr as $a)
	echo "$a\n";

?>
