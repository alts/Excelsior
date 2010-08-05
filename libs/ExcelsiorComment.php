<?php
class ExcelsiorComment extends ExcelsiorTag
{
	public function __construct($attrs, $children)
	{
		if (count($children) === 1 && !($children[0] instanceof ExcelsiorTag))
		{
			$children = array(new ExcelsiorData($children[0]));
		}

		parent::__construct('Comment', $attrs, $children);
	}
}
?>