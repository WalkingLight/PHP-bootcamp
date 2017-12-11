#!/usr/bin/php
<?php

if ($argc == 1)
	return;
$arr = explode(' ', preg_replace("/ +/", ' ', $argv[1]));
for ($i = 1; $i < count($arr); $i++)
	echo "$arr[$i] ";
echo "$arr[0]\n";

?>
