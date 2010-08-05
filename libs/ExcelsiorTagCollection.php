<?php
class ExcelsiorTagCollection extends ExcelsiorTag
{
	public function __construct()
	{
		parent::__construct('', array(), array());
	}

	public function __toString()
	{
		foreach ($this->children as $child)
		{
			if ($child instanceof ExcelsiorTag)
			{
				$child->react($this->parent, $this->message);
			}
		}

		return implode("", $this->children);
	}
}
?>