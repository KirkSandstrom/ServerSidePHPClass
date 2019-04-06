<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="author" content="Kirk Sandstrom">
	  	<title>Assign6 Part 1</title> <!-- Change for each assignment -->
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

				<h1>Welcome to War!</h1>
				<br>
				<p>In this game, the deck is shuffled and divided evenly among two players. A turn consists of each player playing the topmost card of their deck face up. The highest card wins the turn. Suits are ignored, and aces are high. The winner of the turn takes both cards played and adds them to the bottom of her deck. In the case of a tie, each player adds three cards from the top of her deck to the “pot” and then plays the next card from the top of her deck face up as a tie breaker. The winner of the tie breaker takes all cards from the “pot” and adds them to the bottom of her deck. If a tie occurs during a tie-breaker turn, the tie breaking process is simply repeated with each player adding three more cards to the “pot” and using the fourth card as a tie breaker. If a player does not have sufficient cards in her deck to meet the requirements of a tie breaker turn, she loses the game. Likewise, the first player to lose her entire deck loses the game.
				</p>
				<strong><?php echo($message); ?></strong>
				<br>

				<form action="./" method="post">
					<p><label>Deck Size (2-52): <input type="text" name="deckSize" autofocus /></label></p>
					<p><input type="submit" name="dealCards" value="Deal Cards" /></p>
				</form>
			</div>
		</main>
		<!-- Creates footer -->
		<footer>
			<p>Kirk Sandstrom, 2018</p>
		</footer>
	</body>
</html>
