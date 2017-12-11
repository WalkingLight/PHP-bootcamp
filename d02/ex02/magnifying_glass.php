#!/usr/bin/php
<?php

function check($line)
{
	$regex = "/<a[^>]*title=\"(.*)\".*>/";
	if (($val = preg_match_all($regex, $line, $regs)) === 1)
	{
		$tab = explode($regs[1][0], $line);
		$line = implode(strtoupper($regs[1][0]), $tab);
	}
	$regex = "/<a [^>]*>([^<]*).*<\/a>/";
	if (($val = preg_match_all($regex, $line, $regs)) === 1)
	{
		$tab = explode($regs[1][0], $line);
		$line = implode(strtoupper($regs[1][0]), $tab);
	}
	$regex = "/<a [^>]*>[^<]*<.*title=\"(.*)\".*<\/a>/";
	if (($val = preg_match_all($regex, $line, $regs)) == 1)
	{
		$tab = explode($regs[1][0], $line);
		$line = implode(strtoupper($regs[1][0]), $tab);
	}
	echo $line;
}

if ($argc < 2)
	return;
if (($fd = fopen($argv[1], 'r')) == NULL)
	return;
while ($line = fgets($fd))
	check($line);
fclose($fd);

?>
