<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width"> 
		<meta name="author" content="Kirk Sandstrom">
	  	<title>Assign2 Part 3</title> <!-- Change for each assignment -->
	  	<link rel="stylesheet" href="../../css/stylesA2P3.css?v=1.0">
	</head>
	<body>
		<!-- Creates header -->
		<header> 
			<div class="container">
				<div id="branding">
					<a href= "../../index.html"><h1>Kirk's <span id="it604">IT604</span> HomePage</h1></a>
				</div>
			</div>
		</header>
		<!-- Main assignment content goes here -->
		<main>
			<div class="container"> 
				<?php
					echo('
							<table id="requestTable" style="width:70%">
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
				?>

				<div>
   					<a href="http://validator.w3.org/check?uri=referer">Validate HTML</a><br />
				</div>
			</div>
		</main>
		<!-- Creates footer -->
		<footer> 
			<p>Kirk Sandstrom, 2018</p>
		</footer>
	</body>
</html>