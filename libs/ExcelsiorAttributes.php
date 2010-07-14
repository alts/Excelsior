<?php
class ExcelsiorAttributes
{
	/**
	 * Mapping of attributes to namespaces
	 * @var array
	 * @access protected
	 */
	protected static $attributes = array(
		'Name'					=> 'ss',
		'Protected'				=> 'ss',
		'RightToLeft'			=> 'ss',
		'DefaultColumnWidth'	=> 'ss',
		'DefaultRowHeight'		=> 'ss',
		'ExpandedColumnCount'	=> 'ss',
		'ExpandedRowCount'		=> 'ss',
		'LeftCell'				=> 'ss',
		'StyleID'				=> 'ss',
		'TopCell'				=> 'ss',
		'FullColumns'			=> 'x',
		'FullRows'				=> 'x',
		'Caption'				=> 'c',
		'AutoFitHeight'			=> 'ss',
		'Height'				=> 'ss',
		'Hidden'				=> 'ss',
		'Index'					=> 'ss',
		'Span'					=> 'ss',
		'PasteFormula'			=> 'c',
		'ArrayRange'			=> 'ss',
		'Formula'				=> 'ss',
		'HRef'					=> 'ss',
		'MergeAcross'			=> 'ss',
		'MergeDown'				=> 'ss',
		'HRefScreenTip'			=> 'x',
		'Type'					=> 'ss',
		'Ticked'				=> 'x'
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