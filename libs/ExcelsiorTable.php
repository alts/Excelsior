<?php
class ExcelsiorTable extends ExcelsiorTag
{
	public function __construct($attrs, $children)
	{
		parent::__construct('Table', $attrs, $children);
	}

	public function __toString()
	{
		$max_row_length = $this->attrs['ExpandedColumnCount'] = 0;
		foreach ($this->children as $row)
		{
			if ($max_row_length < $row->child_count())
			{
				$this->attrs['ExpandedColumnCount'] = $row->child_count();
			}
		}

		$this->attrs['ExpandedRowCount'] = count($this->children);
		$this->attrs['FullRows'] = $this->attrs['FullColumns'] = 1;

		$this->message['row_number'] = new ExcelsiorCounter();

		return parent::__toString();
	}
}
?>