<?php
	echo var_dump($_REQUEST);

	echo('
			<table style="width:70%">
				<tr>
					<th>Key</th>
					<th>Value</th>
				</tr>');

	foreach ($_REQUEST as $key => $value){
		echo('<tr>');
		echo('<td>' . $key . '</td>');
		echo('<td>' . $value . '</td>');
		echo('<tr>');
	}
	echo '</table>';


	//Ask Mike about using unset($value) to clear stored value from foreach loops.
	/*
	echo var_dump($value);
	unset($value);
	echo("unset");
	echo var_dump($value);
	*/

?>