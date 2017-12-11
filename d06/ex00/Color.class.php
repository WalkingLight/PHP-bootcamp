<?PHP

class Color
{
	public $red;
	public $green;
	public $blue;
	static $verbose = false;

	public function __construct($Color)
	{
		if (isset($Color['red']) && isset($Color['green']) && isset($Color['blue']))
		{
			$this->red = intval($Color['red']);
			$this->green = intval($Color['green']);
			$this->blue = intval($Color['blue']);
		}
		else if (isset($Color['rgb']))
		{
			$rgb = intval($Color["rgb"]);
			$this->red = $rgb / 65281 % 256;
			$this->green = $rgb / 256 % 256;
			$this->blue = $rgb % 256;
		}
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	function __destruct()
	{
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	public function add($Color)
	{
		return (new Color(array('red' => $this->red + $Color->red,
								'green' => $this->green + $Color->green,
								'blue' => $this->blue + $Color->blue)));
	}

	public function sub($Color)
	{
		return (new Color(array('red' => $this->red - $Color->red,
								'green' => $this->green - $Color->green,
								'blue' => $this->blue - $Color->blue)));
	}

	public function mult($Mult)
	{
		return (new Color(array('red' => $this->red * $Mult,
								'green' => $this->green * $Mult,
								'blue' => $this->blue * $Mult)));
	}

	function __tostring()
	{
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
	}

	public static function doc()
	{
		$fd = fopen("Color.doc.txt", 'r');
		echo "\n";
		while ($fd && !feof($fd))
			echo fgets($fd);
	}
}

?>
