<?PHP

class NightsWatch implements IFighter
{
	private $people = array();

	public function recruit($name)
	{
		$this->people[] = $name;
	}

	public function fight()
	{
		foreach ($this->people as $name)
			if (method_exists(get_class($name), 'fight'))
				$name->fight();
	}
}

?>
