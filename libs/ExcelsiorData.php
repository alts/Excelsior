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
			}
		}

		return $type;
	}
}
?>