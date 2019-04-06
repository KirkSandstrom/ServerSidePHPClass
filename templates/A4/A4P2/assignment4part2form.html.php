<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width"> 
		<meta name="author" content="Kirk Sandstrom">
	  	<title>Assign4 Part 2</title> <!-- Change for each assignment -->
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

				<?php echo($instructions); ?>
				<?php echo($guessTracker); ?>

				<form action="./" method="post">
					<p><input type="hidden" name="winningNumber" value="<?php echo $winningNumber ?>"/></p>
					<p><input type="hidden" name="remainingGuess" value="<?php echo $remainingGuess ?>"/></p>
		            <p><label>Your Guess: <input type="text" name="guess" autofocus /></label></p>
		            <p><input type="submit" value="Go" /></p>
        		</form>
			</div>
		</main>
		<!-- Creates footer -->
		<footer> 
			<p>Kirk Sandstrom, 2018</p>
		</footer>
	</body>
</html>