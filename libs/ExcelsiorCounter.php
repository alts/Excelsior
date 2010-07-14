<?php
class ExcelsiorCounter
{
	private $value = 1;

	public function tick()
	{
		return $this->value++;
	}
}
?>