#!/usr/bin/php
<?PHP

while (1)
{
	echo "Enter a number: ";
	$str = chop(fgets(STDIN));
	if (feof(STDIN))
		exit ("\n");
	if (filter_var($str, FILTER_VALIDATE_INT) ||
		filter_var($str, FILTER_VALIDATE_INT) === 0)
	{
		if ($str % 2 == 0)
			echo "The number $str is even\n";
		else
			echo "The number $str is odd\n";
	}
	else
		echo "'$str' is not a number\n";
}

?>
