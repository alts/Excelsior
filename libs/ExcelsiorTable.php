<?php
class ExcelsiorTable extends ExcelsiorTag
{
	public function __construct($attrs, $children)
	{
		parent::__construct('Table', $attrs, $children);
	}

	public function __toString()
	{
		$this->message['row_number'] = new ExcelsiorCounter();
		return parent::__toString();
	}
}
?>