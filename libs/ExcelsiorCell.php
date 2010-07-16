<?php
class ExcelsiorCell extends ExcelsiorTag
{
	public function __construct($attrs, $children)
	{
		if (count($children) === 1 && !($children[0] instanceof ExcelsiorTag))
		{
			$children = array(new ExcelsiorData($children[0]));
		}

		parent::__construct('Cell', $attrs, $children);
	}

	public function __toString()
	{
		$this->message['column_number'] = $this->message['column_number']
			->tick();

		if (isset($this->attrs['Formula']))
		{
			$this->formula_replace();
		}

		return parent::__toString();
	}

	protected function formula_replace()
	{
		$this->attrs['Formula'] = preg_replace_callback(
			array('/R{([^}]+)}/', '/C{([^}]+)}/'),
			array($this, 'ieval'),
			$this->attrs['Formula']
		);
	}

	public function ieval($matches)
	{
		$r = $this->message['row_number'];
		$c = $this->message['column_number'];
		eval('$result = '.$matches[1].';');

		return str_replace('{'.$matches[1].'}', $result, $matches[0]);
	}
}
?>