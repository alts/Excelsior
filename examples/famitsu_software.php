<?php
require '../Excelsior.php';

$x = new Excelsior();
echo $x->xml_begin();
echo $x->Workbook(
	$x->Worksheet(array('Name' => 'Famitsu Software Top 5'), $x->Table(
		$x->Row(
			$x->Cell($x->Data('<B>Rank</B>')),
			$x->Cell($x->Data('<B>Console</B>')),
			$x->Cell($x->Data('<B>Title</B>')),
			$x->Cell($x->Data('<B>Publisher</B>')),
			$x->Cell($x->Data('<B>Last Week Sales</B>')),
			$x->Cell($x->Data('<B>LTD Sales</B>')),
			$x->Cell($x->Data('<B>Days Since Release</B>')),
			$x->Cell($x->Data('<B>Avg. Sales per Day</B>'))
		),
		$x->Row(
			$x->Cell($x->Data(1)),
			$x->Cell($x->Data('PS3')),
			$x->Cell($x->Data('Yakuza 4: Heir to the Legend')),
			$x->Cell($x->Data('Sega')),
			$x->Cell($x->Data(395123)),
			$x->Cell($x->Data(395123)),
			$x->Cell($x->Data(4)),
			$x->Cell(array('Formula' => '=R{$r}C{$c-2} / R{$r}C{$c-1}'))
		),
		$x->Row(
			$x->Cell($x->Data(2)),
			$x->Cell($x->Data('PSP')),
			$x->Cell($x->Data('Gundam Assault Survive')),
			$x->Cell($x->Data('Namco Bandai Games')),
			$x->Cell($x->Data(96009)),
			$x->Cell($x->Data(96009)),
			$x->Cell($x->Data(4)),
			$x->Cell(array('Formula' => '=R{$r}C{$c-2} / R{$r}C{$c-1}'))
		),
		$x->Row(
			$x->Cell($x->Data(3)),
			$x->Cell($x->Data('DS')),
			$x->Cell($x->Data('Pokémon Ranger: Path of Light')),
			$x->Cell($x->Data('Pokémon')),
			$x->Cell($x->Data(48684)),
			$x->Cell($x->Data(283223)),
			$x->Cell($x->Data(16)),
			$x->Cell(array('Formula' => '=R{$r}C{$c-2} / R{$r}C{$c-1}'))
		),
		$x->Row(
			$x->Cell($x->Data(4)),
			$x->Cell($x->Data('DS')),
			$x->Cell($x->Data('Tomodachi Collection')),
			$x->Cell($x->Data('Nintendo')),
			$x->Cell($x->Data(37391)),
			$x->Cell($x->Data(3044511)),
			$x->Cell($x->Data(277)),
			$x->Cell(array('Formula' => '=R{$r}C{$c-2} / R{$r}C{$c-1}'))
		),
		$x->Row(
			$x->Cell($x->Data(5)),
			$x->Cell($x->Data('Wii')),
			$x->Cell($x->Data('New Super Mario Bros. Wii')),
			$x->Cell($x->Data('Nintendo')),
			$x->Cell($x->Data(37252)),
			$x->Cell($x->Data(3535916)),
			$x->Cell($x->Data(109)),
			$x->Cell(array('Formula' => '=R{$r}C{$c-2} / R{$r}C{$c-1}'))
		)
	))
);
?>