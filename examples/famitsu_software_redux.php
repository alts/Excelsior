<?php
require '../Excelsior.php';

// get data from db or something. It might look like this
$data = array(
	(object) array(
		'console'				=> 'PS3',
		'title'					=> 'Yakuza 4: Heir to the Legend',
		'publisher'				=> 'Sega',
		'week_sales'			=> 395123,
		'ltd_sales'				=> 395123,
		'days_since_release'	=> 4
	),
	(object) array(
		'console'				=> 'PSP',
		'title'					=> 'Gundam Assault Survive',
		'publisher'				=> 'Namco Bandai Games',
		'week_sales'			=> 96009,
		'ltd_sales'				=> 96009,
		'days_since_release'	=> 4
	),
	(object) array(
		'console'				=> 'DS',
		'title'					=> 'Pokemon Ranger: Path of Light',
		'publisher'				=> 'Pokemon',
		'week_sales'			=> 48684,
		'ltd_sales'				=> 283223,
		'days_since_release'	=> 16
	),
	(object) array(
		'console'				=> 'DS',
		'title'					=> 'Tomodachi Collection',
		'publisher'				=> 'Nintendo',
		'week_sales'			=> 37391,
		'ltd_sales'				=> 3044511,
		'days_since_release'	=> 277
	),
	(object) array(
		'console'				=> 'Wii',
		'title'					=> 'New Super Mario Bros. Wii',
		'publisher'				=> 'Nintendo',
		'week_sales'			=> 37252,
		'ltd_sales'				=> 3535916,
		'days_since_release'	=> 109
	)
);

$x = new Excelsior();
echo $x->xml_begin();
$workbook = $x->Workbook(
	$x->Worksheet(
		array('Name' => 'Famitsu Software Top 5'),
		$table = $x->Table(
			$x->Row(
				$x->Cell($x->Data('<B>Rank</B>')),
				$x->Cell($x->Data('<B>Console</B>')),
				$x->Cell($x->Data('<B>Title</B>')),
				$x->Cell($x->Data('<B>Publisher</B>')),
				$x->Cell($x->Data('<B>Last Week Sales</B>')),
				$x->Cell($x->Data('<B>LTD Sales</B>')),
				$x->Cell($x->Data('<B>Days Since Release</B>')),
				$x->Cell($x->Data('<B>Avg. Sales per Day</B>'))
			)
		)
	)
);

$children = array();
foreach ($data as $index => $rowlike)
{
	$children[] = $x->Row(
		$x->Cell($index),
		$x->Cell($rowlike->console),
		$x->Cell($rowlike->title),
		$x->Cell($rowlike->publisher),
		$x->Cell($rowlike->week_sales),
		$x->Cell($rowlike->ltd_sales),
		$x->Cell($rowlike->days_since_release),
		$x->Cell(array('Formula' => '=R{$r}C{$c-2} / R{$r}C{$c-1}'))
	);
}

$table->append_children($children);

echo $workbook;

?>