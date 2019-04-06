<?php
        if (!isset($_REQUEST['input'])) {          // Not a submission, so generate form
        	$values ='';
        	$valArray = array();
            include __DIR__ . '/../../../templates/A4/A4P1/assignment4part1form.html.php';
            exit();
        } else {                                                         // Submission, so process form and display results
            $input = htmlspecialchars($_REQUEST['input'], ENT_QUOTES, "UTF-8");
            $values = htmlspecialchars($_REQUEST['values'], ENT_QUOTES, "UTF-8");
            $values .= " " . $input;
            $valArray = explode(" ", $values);

            if($input != 0 && !is_null($input)){
           		include __DIR__ . '/../../../templates/A4/A4P1/assignment4part1form.html.php';
           		exit();
        	}
        	else{
        		//variables
					$sum = 0;
					$count = 0;
					$average = 0;
					$maximum = 0;
					$minimum = 0;
					$positiveEvenCount = 0;

					foreach ($valArray as $key => $value){
						//ignore 0
						if($value != 0 && !is_null($value)){

							//protect against HTML injection
							$safeValue = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

							//add value to sum
							$sum += $safeValue;

							//find maximum
							if($count == 0){
								$maximum = $safeValue;
							}
							else if($safeValue > $maximum){
								$maximum = $safeValue;
							}

							//find minimum
							if($count == 0){
								$minimum = $safeValue;
							}
							else if($safeValue < $minimum){
								$minimum = $safeValue;
							}

							//find positive even count
							if($safeValue > 0 && $safeValue % 2 == 0){
								$positiveEvenCount += 1;
							}

							//iterate count
							$count += 1;
						}
					}
        		include __DIR__ . '/../../../templates/A4/A4P1/assignment4part1results.html.php';
        		exit();
        	}
	}
