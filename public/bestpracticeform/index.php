<?php
        if (!isset($_REQUEST['uname'])) {          // Not a submission, so generate form
            include __DIR__ . '/../../templates/bestpracticeform/bestpracticeform.html.php';
        } else {                                                         // Submission, so process form and display results
            $uname = htmlspecialchars($_REQUEST['uname'], ENT_QUOTES, "UTF-8");
            $email = htmlspecialchars($_REQUEST['email'], ENT_QUOTES, "UTF-8");
            include __DIR__ . '/../../templates/bestpracticeform/bestpracticeresult.html.php';
	}
