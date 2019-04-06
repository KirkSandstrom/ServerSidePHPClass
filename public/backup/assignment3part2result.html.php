<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width"> 
		<meta name="author" content="Kirk Sandstrom">
	  	<title>Assign3 Part 2</title> <!-- Change for each assignment -->
	  	<link rel="stylesheet" href="./css/styles.css?v=1.0">
	</head>
	<body>
		<!-- Creates header -->
		<header> 
			<div class="container">
				<div id="branding">
					<a href= "./index.html"><h1>Kirk's <span id="it604">IT604</span> HomePage</h1></a>
				</div>
			</div>
		</header>
		<!-- Main assignment content goes here -->
		<main>
			<div class="container">

			<?php
				//$input = htmlspecialchars($_REQUEST['input'], ENT_QUOTES, "UTF-8");
				$input = $_REQUEST['input'];
				$noPunct = '';
				$noSpaces = '';

				for( $i = 0; $i < strlen($input); $i++){

					if(ctype_alnum(substr($input, $i, 1)) || substr($input, $i, 1) == ' '){

						$noPunct .= substr($input, $i, 1);
					}
				}

				$upperCased = ucwords($noPunct);
				$noSpaces = str_replace(' ','',$upperCased);

				echo('1st line: ' . htmlspecialchars($input, ENT_QUOTES, "UTF-8"));
				echo('<br>');
				echo('2nd line: ' . htmlspecialchars($upperCased, ENT_QUOTES, "UTF-8"));
				echo('<br>');
				echo('3rd line: ' . htmlspecialchars($noSpaces, ENT_QUOTES, "UTF-8"));
				echo('<br>');
			?>

			</div>
		</main>
		<!-- Creates footer -->
		<footer> 
			<p>Kirk Sandstrom, 2018</p>
		</footer>
	</body>
</html>