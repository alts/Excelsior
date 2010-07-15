<?php
require 'ExcelsiorAttributes.php';

class ExcelsiorTag
{
	protected $attrs = array();
	protected $children = array();
	protected $name = null;
	protected $message = array();

	public function __construct($name, $attrs, $children)
	{
		$this->name = $name;
		$this->attrs = $attrs;
		$this->children = $children;
	}

	public function child_count()
	{
		return count($this->children);
	}

	public function __toString()
	{
		foreach ($this->children as $child)
		{
			if ($child instanceof ExcelsiorTag)
			{
				$child->react($this->message);
			}
		}

		return sprintf(
			"\n<%s%s>%s</%s>",
			$this->name,
			$this->write_attributes(),
			implode("", $this->children),
			$this->name
		);
	}

	public function append_children($children)
	{
		$this->children = array_merge(
			$this->children,
			$children
		);
	}

	protected function write_attributes()
	{
		$result = '';
		foreach ($this->attrs as $key => $val)
		{
			$result .= sprintf(
				' %s="%s"',
				ExcelsiorAttributes::translate($key),
				str_replace('"', '\"', $val)
			);
		}

		return $result;
	}

	protected function react($message)
	{
		$this->message = $message;
	}
}
?>