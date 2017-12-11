#!/usr/bin/php
<?php

if ($argc == 1)
	return;
$arr = trim($argv[1]);
$arr = preg_replace('/\s+/', ' ', $arr);
$arr = preg_replace('/\t+/', ' ', $arr);
echo "$arr\n";

?>
