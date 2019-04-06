<?php
	if(!isset($_REQUEST['guess'])){ //Not a submission, so generate form
		$winningNumber = rand(1,50);
		$remainingGuess = 5;
		$guessTracker = '<p>You have ' . $remainingGuess . ' remaining guesses.</p><br>';

		$instructions = '<p>Welcome to the Guessing Game! In this game you will have 5 chances to guess a random integer between 1 and 50. You will be given hints along the way based on how close you are to winning. Good luck!</p><br>';

		include __DIR__ . '/../../../templates/A4/A4P2/assignment4part2form.html.php';
		exit();
	}
	else{ // Submission, so process form and display results
		$remainingGuess = htmlspecialchars($_REQUEST['remainingGuess'], ENT_QUOTES, "UTF-8");
		$winningNumber = htmlspecialchars($_REQUEST['winningNumber'], ENT_QUOTES, "UTF-8");
		$guess = htmlspecialchars($_REQUEST['guess'], ENT_QUOTES, "UTF-8");
		$instructions = '';
		$guessTracker = '';

		$remainingGuess--;
		if($remainingGuess >= 1){

			if($guess < 1 || $guess > 50){
				$remainingGuess++;
				$instructions = '<p>Please enter a number between 1 and 50.</p><br>';
			}
			else{
				if($guess == $winningNumber){
				include __DIR__ . '/../../../templates/A4/A4P2/assignment4part2win.html.php';
				exit();
				}
				else if($winningNumber - 5 <= $guess && $guess <= $winningNumber + 5){
					$instructions = '<p>Getting Hot.</p><br>';
				}
				else if($winningNumber - 10 <= $guess && $guess <= $winningNumber + 10){
					$instructions = '<p>Getting Warm.</p><br>';
				}
				else if($winningNumber - 15 <= $guess && $guess <= $winningNumber + 15){
					$instructions = '<p>Getting Cool.</p><br>';
				}
				else{
					$instructions = '<p>Totally Cold.</p><br>';
				}
			}

			$guessTracker = '<p>You have ' . $remainingGuess . ' remaining guesses.</p><br>';

			include __DIR__ . '/../../../templates/A4/A4P2/assignment4part2form.html.php';
			exit();
		}
		else if($remainingGuess == 0 && $guess == $winningNumber)
		{
			include __DIR__ . '/../../../templates/A4/A4P2/assignment4part2win.html.php';
			exit();
		}
		else{
			include __DIR__ . '/../../../templates/A4/A4P2/assignment4part2lose.html.php';
			exit();
		}
	}
?>