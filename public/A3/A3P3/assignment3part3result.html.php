<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width"> 
		<meta name="author" content="Kirk Sandstrom">
	  	<title>Assign3 Part 3</title> <!-- Change for each assignment -->
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

				<a href="./assignment3part3.html">Back to Form</a><br>

				<?php
					//strings
					$wordIn = $_REQUEST['wordIn']; //The string entered in the form
					$wordOut = ''; //The string to be reversed and compared to the original string
					$wordInNoPunct = ''; //The original string with punctuation removed
					$noPunct = ''; //The string reversed, with puncutation removed

					//booleans
					$hasSpaces = FALSE; //Set to TRUE if the string contains spaces
					$hasCharacters = FALSE; //Set to TRUE if the string contains chars other than spaces or alpha-numeric chars


					//echo($hasSpaces);
					//echo('<br>');
					//echo($hasCharacters);

					echo("Original String: " . $wordIn);
					echo('<br>');

					for($i = strlen($wordIn); $i >= 0; $i--){
						$curChar = substr($wordIn, $i, 1);

						//Check for spaces
						if($curChar == ' '){
							$hasSpaces = TRUE;
						}
						//Check for non-alpha-numeric characters
						if(!ctype_alnum($curChar) && $curChar != ' ' && $i != strlen($wordIn)){
							$hasCharacters = TRUE;
						}

						//append the current character to the resulting $wordOut string
						$wordOut .= $curChar;

						//Create a string and reversed string with no punctuation or spaces

						if(ctype_alnum($curChar) && $curChar != ' '){

							//echo("da fook?");

							$wordInNoPunct = substr_replace($wordInNoPunct, $curChar, 0, 0);

							$noPunct .= substr($wordIn, $i, 1);
						}
					}

					echo("Reversed String: " . $wordOut);
					echo('<br>');

					if($hasCharacters == TRUE && strcasecmp($wordInNoPunct, $noPunct) == 0){
						echo("Result: The string is a phrase palindrome when spaces and punctuation are ignored");
					}
					else if($hasSpaces == TRUE && strcasecmp($wordIn, $wordOut) == 0){
						echo("Result: The string is a phrase palindrome taking spaces into account.");
					}
					else if($hasSpaces == TRUE && strcasecmp(str_replace(' ','',$wordIn), str_replace(' ','',$wordOut)) == 0){
						echo("Result: The string is a phrase palindrome when spaces are ignored.");
					}
					else if(strcasecmp($wordIn, $wordOut) == 0){
						echo("Result: The string is a one word palindrome.");
					}
					else{
						echo("Result: The string is not a palindrome.");
					}
				?>
			</div>
		</main>
		<!-- Creates footer -->
		<footer> 
			<p>Kirk Sandstrom, 2018</p>
		</footer>
	</body>
</html>