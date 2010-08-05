<?php
class ExcelsiorData extends ExcelsiorTag
{
	protected $data = null;

	public function __construct($data)
	{
		$this->data = $data;

		parent::__construct('Data', array(), array());
	}

	public function __toString()
	{
		$this->attrs['Type'] = $this->data_type();
		$this->children = array($this->data);

		if ($this->parent instanceof ExcelsiorComment)
		{
			unset($this->attrs['Type']);
		}

		return parent::__toString();
	}

	protected function data_type()
	{
		$type = 'Error';
		if ($this->data !== null)
		{
			// TODO: Boolean and Datetime types
			if (is_numeric($this->data))
			{
				$type = 'Number';
			}
			else if (is_string($this->data))
			{
				$type = 'String';

				// Ugly namespace juggling. Better way?
				$this->attrs['xmlns'] = 'http://www.w3.org/TR/REC-html40';
				$this->name = 'ss:Data';
			}
		}

		return $type;
	}
}
?>