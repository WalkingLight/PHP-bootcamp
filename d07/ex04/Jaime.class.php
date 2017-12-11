<?PHP

class Jaime
{
	public function sleepWith($person)
	{
		if ($person instanceof Tyrion)
			echo "Not even if I'm drunk !\n";
		else if ($person instanceof Sansa)
			echo "Let's do this\n";
		else if ($person instanceof Cersei)
			echo "With plesure, but only in a tower in Winterfell, then.\n";
	}
}

?>
