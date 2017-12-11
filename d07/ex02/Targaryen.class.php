<?PHP

class Targaryen
{
	public function getBurned()
	{
		if ($this->resistsFire())
			return "emerges naked but unharmed";
		else
			return "Burns alive";
	}

	public function resistsFire()
	{
		return False;
	}
}	

?>
