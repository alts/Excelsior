<?php
class ExcelsiorRow extends ExcelsiorTag
{
	public function __construct($attrs, $children)
	{
		parent::__construct('Row', $attrs, $children);
	}

	public function __toString()
	{
		$this->message['row_number'] = $this->message['row_number']->tick();
		$this->message['column_number'] = new ExcelsiorCounter();

		return parent::__toString();
	}
}
?>