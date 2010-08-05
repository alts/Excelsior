<?php
require 'ExcelsiorAttributes.php';

class ExcelsiorTag
{
	protected $attrs = array();
	protected $children = array();
	protected $message = array();
	protected $name = null;
	protected $parent = null;


	public function __construct($name, $attrs, $children)
	{
		$this->name = $name;
		$this->attrs = $attrs;
		$this->children = $children;
	}

	public function child_count()
	{
		$base = 0;
		foreach ($this->children as $child)
		{
			if ($child instanceof ExcelsiorTagCollection)
			{
				$base += $child->child_count();
			}
			else
			{
				$base += 1;
			}
		}

		return $base;
	}

	public function __toString()
	{
		foreach ($this->children as $child)
		{
			if ($child instanceof ExcelsiorTag)
			{
				$child->react($this, $this->message);
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

	protected function react($parent, $message)
	{
		$this->parent = $parent;
		$this->message = $message;
	}
}
?>