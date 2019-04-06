<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="author" content="Kirk Sandstrom">
	  	<title>Assign2 Part 1</title> <!-- Change for each assignment -->
	  	<link rel="stylesheet" href="../../css/styles.css?v=1.0">
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
				<h1>The Game of War</h1>
        <?php
					echo($message);
        ?>

				<form action="./" method="post">
					<p><input type="submit" name="nextTurn" value="Next Turn" /></p>
				</form>

			</div>
		</main>
		<!-- Creates footer -->
		<footer>
			<p>Kirk Sandstrom, 2018</p>
		</footer>
	</body>
</html>
