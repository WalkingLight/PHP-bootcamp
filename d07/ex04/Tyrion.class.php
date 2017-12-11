<?PHP

class Tyrion
{
	public function sleepWith($person)
	{
		if ($person instanceof Jaime)
			echo "Not even if I'm drunk !\n";
		else if ($person instanceof Sansa)
			echo "Let's do this.\n";
		else if ($person instanceof Cersei)
			echo "Not even if I'm drunk !\n";
	}
}

?>
