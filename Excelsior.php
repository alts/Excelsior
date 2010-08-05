<?php
/**
 * Base Excelsior class.
 *
 * PHP version 5 only
 *
 * Copyright 2010, Stephen Altamirano (http://evilrobotstuff.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2010, Stephen Altamirano (http://evilrobotstuff.com)
 * @package       excelsior
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Include remaining classes
 */
require 'libs/ExcelsiorCounter.php';
require 'libs/ExcelsiorTag.php';
require 'libs/ExcelsiorCell.php';
require 'libs/ExcelsiorComment.php';
require 'libs/ExcelsiorData.php';
require 'libs/ExcelsiorRow.php';
require 'libs/ExcelsiorTable.php';
require 'libs/ExcelsiorTagCollection.php';
require 'libs/ExcelsiorWorkbook.php';

class Excelsior
{
	public function xml_begin()
	{
		echo '<?xml version="1.0"?>';
	}

	public function Workbook()
	{
		$args = func_get_args();
		list($attrs, $children) = $this->split_arguments($args);
		return new ExcelsiorWorkbook($attrs, $children);
	}

	public function Table()
	{
		$args = func_get_args();
		list($attrs, $children) = $this->split_arguments($args);
		return new ExcelsiorTable($attrs, $children);
	}

	public function Row()
	{
		$args = func_get_args();
		list($attrs, $children) = $this->split_arguments($args);
		return new ExcelsiorRow($attrs, $children);
	}

	public function Cell()
	{
		$args = func_get_args();
		list($attrs, $children) = $this->split_arguments($args);
		return new ExcelsiorCell($attrs, $children);
	}

	public function Comment()
	{
		$args = func_get_args();
		list($attrs, $children) = $this->split_arguments($args);
		return new ExcelsiorComment($attrs, $children);
	}

	public function Data($data)
	{
		return new ExcelsiorData($data);
	}

	public function __call($name, $args)
	{
		list($attrs, $children) = $this->split_arguments($args);
		return $this->node($name, $attrs, $children);
	}

	private function node($name, $attrs, $children)
	{
		return new ExcelsiorTag($name, $attrs, $children);
	}

	private function split_arguments($args)
	{
		$attrs = array();
		$children = array();
		if (!empty($args))
		{
			if (is_array($args[0]))
			{
				$attrs = $args[0];
				$children = array_slice($args, 1);
			}
			else
			{
				$children = $args;
			}
		}

		return array($attrs, $children);
	}
}
?>