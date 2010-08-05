<?php
class ExcelsiorAttributes
{
	/**
	 * Mapping of attributes to namespaces
	 * @var array
	 * @access protected
	 */
	protected static $attributes = array(
		'ArrayRange'			=> 'ss',
		'Author'				=> 'ss',
		'AutoFitHeight'			=> 'ss',
		'Caption'				=> 'c',
		'DefaultColumnWidth'	=> 'ss',
		'DefaultRowHeight'		=> 'ss',
		'ExpandedColumnCount'	=> 'ss',
		'ExpandedRowCount'		=> 'ss',
		'Formula'				=> 'ss',
		'FullColumns'			=> 'x',
		'FullRows'				=> 'x',
		'HRef'					=> 'ss',
		'HRefScreenTip'			=> 'x',
		'Height'				=> 'ss',
		'Hidden'				=> 'ss',
		'Index'					=> 'ss',
		'LeftCell'				=> 'ss',
		'MergeAcross'			=> 'ss',
		'MergeDown'				=> 'ss',
		'Name'					=> 'ss',
		'PasteFormula'			=> 'c',
		'Protected'				=> 'ss',
		'RightToLeft'			=> 'ss',
		'ShowAlways'			=> 'ss',
		'Span'					=> 'ss',
		'StyleID'				=> 'ss',
		'Ticked'				=> 'x',
		'TopCell'				=> 'ss',
		'Type'					=> 'ss'
	);

	public static function translate($attr)
	{
		if (isset(self::$attributes[$attr]))
		{
			return self::$attributes[$attr] . ':' . $attr;
		}

		return $attr;
	}
}
?>