<?php
	//define constants for size of table
	define("XSIZE",10);
	define("YSIZE",10);
	
	//start table
	echo('
			<table style="width:70%" id="multiplicationTable">
				<caption>A ' . XSIZE . 'x' . YSIZE . ' multiplication table with a range of 0 through ' . XSIZE * YSIZE . '.</caption>
				<tr>
		');

	//insert blank table header above y-axis labels for spacing reasons.
	echo('<th class="x-label"></th>');

	//create table headers/labels for x-axis
	for($x = 0; $x <= XSIZE; $x++){
		echo('<th class="x-label">' . $x . '</th>');
	}

	//close first table row (for labels)
	echo('</tr>');

	//create table cells
	for($y = 0; $y <= YSIZE; $y++){
		//create labels for y-axis
		echo('<tr>
			<th class="y-label">' . $y . '</th>');
		//create multiplication data cells
		for($x = 0; $x <= XSIZE; $x++){
			echo('<td>' . $y * $x . '</td>');
		}
		echo('</tr>');
	}
	echo '</table>';
?>