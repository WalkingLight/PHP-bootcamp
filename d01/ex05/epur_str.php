#!/usr/bin/php
<?php

if ($argc != 2)
	return;
$arr = array_filter(explode(" ", $argv[1]));
if (count($arr) > 0)
	echo implode(" ", $arr)."\n";

?>
