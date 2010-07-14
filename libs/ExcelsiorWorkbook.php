<?php
/**
 * Outermost Excel XML Tag
 *
 * @package excelsior
 */
class ExcelsiorWorkbook extends ExcelsiorTag
{
	public function __construct($attrs, $children)
	{
		parent::__construct('Workbook', $attrs, $children);
	}

	public function __toString()
	{
		$this->attrs = array_merge($this->attrs, array(
			'xmlns'		 => 'urn:schemas-microsoft-com:office:spreadsheet',
			'xmlns:o'	 => 'urn:schemas-microsoft-com:office:office',
			'xmlns:x'	 => 'urn:schemas-microsoft-com:office:excel',
			'xmlns:ss'	 => 'urn:schemas-microsoft-com:office:spreadsheet',
			'xmlns:html' => 'http://www.w3.org/TR/REC-html40'
		));

		return parent::__toString();
	}
}
?>