<?PHP

class Matrix
{
	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const RX = "Ox ROTATION";
	const RY = "Oy ROTATION";
	const RZ = "Oz ROTATION";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";

	protected $matrix = array();
	private $_preset;
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_fov;
	private $_ratio;
	private $_near;
	private $_far;

	static $verbose = false;

	public function __construct($arr = null)
	{
		if (isset($arr))
		{
			if (isset($arr['preset']))
				$this->_preset = $arr['preset'];
			if (isset($arr['scale']))
				$this->_scale = $arr['scale'];
			if (isset($arr['angle']))
				$this->_angle = $arr['angle'];
			if (isset($arr['vtc']))
				$this->_vtc = $arr['vtc'];
			if (isset($arr['fov']))
				$this->_fov = $arr['fov'];
			if (isset($arr['ratio']))
				$this->_ratio = $arr['ratio'];
			if (isset($arr['near']))
				$this->_near = $arr['near'];
			if (isset($arr['far']))
				$this->_far = $arr['far'];
			$this->check();
			$this->createMatrix();
			if (Self::$verbose)
				if ($this->_preset == Self::IDENTITY)
					echo "Matrix $this->_preset instance constructed\n";
				else
					echo "Matix $this->_preset preset instance constructed\n";
			$this->dispatch();
		}
	}

	function __destruct()
	{
		if (Self::$verbose)
			echo "Matrix instance destructed\n";
	}

	function __tostring()
	{
		$tmp = "M | vtcX | vtcY | vtcZ | vtx0\n";
		$tmp .= "-----------------------------\n";
		$tmp .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "w | %0.2f | %0.2f | %0.2f | %0.2f";
		return (vsprintf($tmp, array($this->matrix[0], $this->matrix[1], $this->matrix[2], $this->matrix[3], $this->matrix[4], $this->matrix[5], $this->matrix[6], $this->matrix[7], $this->matrix[8], $this->matrix[9], $this->matrix[10], $this->matrix[11], $this->matrix[12],$this->matrix[13], $this->matrix[14], $this->matrix[15])));
	}

	public static function doc()
	{
		$fd = fopen("Matrix.doc.txt", 'r');
		echo "\n";
		while ($fd && !feof($fd))
			echo fgets($fd);
	}

	private function check()
	{
		if (empty($this->_preset))
			return "error";
		if ($this->_preset == Self::SCALE && empty($this->_scale))
			return "error";
		if (($this->_preset == Self::RX || $this->_preset == Self::RY || $this->_preset == Self::RZ) && empty($this->_angle))
			return "error";
		if ($this->_preset == Self::TRANSLATION && empty($this->_vtc))
			return "error";
		if ($this->_preset == Self::PROJECTION && (empty($this->fov) || empty($this->_radio) || empty($this->_near) || empty($this->_far)))
			return "error";
	}

	private function createMatrix()
	{
		for ($i = 0; $i < 16; $i++)
			$this->matrix[$i] = 0;
	}

	private function dispatch()
	{
		switch ($this->_preset)
		{
			case (Self::IDENTITY):
				$this->identity(1);
				break;
			case (Self::TRANSLATION):
				$this->translation();
				break;
			case (Self::SCALE):
				$this->identity($ths->_scale);
				break;
			case (Self::RX):
				$this->rotation_x();
				break;
			case (Self::RY):
				$this->rotation_y();
				break;
			case (Self::RZ):
				$this->rotation_z();
				break;
			case (Self::PROJECTION):
				$this->projection();
				break;
		}
	}

	private function identity($scale)
	{
		$this->matrix[0] = $scale;
		$this->matrix[5] = $scale;
		$this->matrix[10] = $scale;
		$this->matrix[15] = 1;
	}

	private function translation()
	{
		$this->identity(1);
		$this->matrix[3] = $this->_vtc->getX();
		$this->matrix[7] = $this->_vtc->getY();
		$this->maatrix[11] = $this->_vtc->getZ();
	}

	private function rotation_x()
	{
		$this->identity(1);
		$this->matrix[0] = 1;
		$this->matrix[5] = cos($this->_angle);
		$this->matrix[6] = -sin($this->_angle);
		$this->matrix[9] = sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}

	private function rotation_y()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[2] = sin($this->_angle);
		$this->matrix[5] = 1;
		$this->matrix[8] = -sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}

	private function rotation_z()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[1] = -sin($this->_angle);
		$this->matrix[4] = sin($this->_angle);
		$this->matrix[5] = cos($this->_angle);
		$this->matrix[10] = 1;
	}

	private function projection()
	{
		$this->identity(1);
		$this->matrix[5] = 1 / tan(0.5 * deg2rad($this->_fov));
		$this->matrix[0] = $this->matrix[5] / $this->_ratio;
		$this->matrix[10] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
		$this->matrix[14] = -1;
		$this->matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
		$this->matrix[15] = 0;
	}

	public function mult(Matrix $rhs)
	{
		$tmp = array();
		for ($i = 0; $i < 16; $i += 4)
		{
			for ($j = 0; $j < 4; $j++)
			{
				$tmp[$i + $j] = 0;
				$tmp[$i + $j] += $this->matrix[$i + 0] * $rhs->matrix[$j + 0];
				$tmp[$i + $j] += $this->matrix[$i + 1] * $rhs->matrix[$j + 4];
				$tmp[$i + $j] += $this->matrix[$i + 2] * $rhs->matrix[$j + 8];
				$tmp[$i + $j] += $this->matrix[$i + 3] * $rhs->matrix[$j + 12];
			}
		}
		$ret = new Matrix();
		$ret->Matrix = $tmp;
		return $ret;
	}

	public function transformVertex(Vertex $vtx)
	{
		$tmp = array();
		$tmp['x'] = ($vtx->getX() * $this->matrix[0]) +
					($vtx->getY() * $this->matrix[1]) +
					($vtx->getZ() * $this->matrix[2]) +
					($vtx->getW() * $this->matrix[3]);
		$tmp['Y'] = ($vtx->getX() * $this->matrix[4]) +
					($vtx->getY() * $this->matrix[5]) +
					($vtx->getZ() * $this->matrix[6]) +
					($vtx->getW() * $this->matrix[7]);
		$tmp['x'] = ($vtx->getX() * $this->matrix[8]) +
					($vtx->getY() * $this->matrix[9]) +
					($vtx->getZ() * $this->matrix[10]) +
					($vtx->getW() * $this->matrix[11]);
		$tmp['x'] = ($vtx->getX() * $this->matrix[12]) +
					($vtx->getY() * $this->matrix[13]) +
					($vtx->getZ() * $this->matrix[14]) +
					($vtx->getW() * $this->matrix[15]);
		$tmp['color'] = $vtx->getColor();
		$ret = new Vertex($tmp);
		return $ret;
	}
}

?>
