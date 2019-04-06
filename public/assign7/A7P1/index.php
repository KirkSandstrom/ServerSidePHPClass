<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/../includes/assign7/pdoConnect.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/../includes/assign7/databaseFunctions.php';

  //a form on the page has been submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $output = "This is a test!!!";

    $keys = array_keys($_POST);
    $buttonID = $keys[0];

    if($buttonID == 'addFeedBack'){
      //call the add feedback stuff
      addFeedBack($pdo, 'kirk', 'sandstrom', 'ksandstrom', 'ksandstrom@email.com', 'billy', 'kenny', 'bkenny', 'bkenny@email.com', 'I did\'nt end up adding a form so this is my default test message :/');

      $sql = "SELECT * FROM feedback";
      $results = query($pdo, $sql);
    }
    else{
      $actionChar = substr($buttonID, 0, 1);  //the character that determines the action to be taken, edit or delete.
      $fID = substr($buttonID, 1); //the id of the feedback to be acted on

      if($actionChar == 'e'){
        //call the edit stuff

        $sql = "SELECT * FROM feedback";
        $results = query($pdo, $sql);
      }
      elseif ($actionChar == 'd') {
        //call the delete stuff
        deleteFeedBack($pdo, $fID);

        $sql = "SELECT * FROM feedback";
        $results = query($pdo, $sql);
      }
    }
    ob_start();

    include __DIR__ . '/../../../templates/assign7/feedback.html.php';

    $output = ob_get_clean();
  }
  else{
    try{
      $sql = "SELECT * FROM feedback";
      foreach($pdo->query($sql) as $row){
        $id = htmlspecialchars($row['id'], ENT_QUOTES, "UTF-8");
        $fname_Contributer = htmlspecialchars($row['fname_contributer'], ENT_QUOTES, "UTF-8");
        $lname_Contributer = htmlspecialchars($row['lname_contributer'], ENT_QUOTES, "UTF-8");
        $uname_Contributer = htmlspecialchars($row['uname_contributer'], ENT_QUOTES, "UTF-8");
        $email_Contributer = htmlspecialchars($row['email_contributer'], ENT_QUOTES, "UTF-8");
        $fname_Recipient = htmlspecialchars($row['fname_recipient'], ENT_QUOTES, "UTF-8");
        $lname_Recipient = htmlspecialchars($row['lname_recipient'], ENT_QUOTES, "UTF-8");
        $uname_Recipient = htmlspecialchars($row['uname_recipient'], ENT_QUOTES, "UTF-8");
        $email_Recipient = htmlspecialchars($row['email_recipient'], ENT_QUOTES, "UTF-8");
        $feedback_Message = htmlspecialchars($row['feedback_message'], ENT_QUOTES, "UTF-8");
        $time_Added = htmlspecialchars($row['time_added'], ENT_QUOTES, "UTF-8");

        $results[] = array($id, $fname_Contributer, $lname_Contributer, $uname_Contributer, $email_Contributer, $fname_Recipient, $lname_Recipient, $uname_Recipient, $email_Recipient, $feedback_Message, $time_Added);
      }

      ob_start();

      include __DIR__ . '/../../../templates/assign7/feedback.html.php';

      $output = ob_get_clean();
    }
    catch(PDOException $err){
      $output = '<strong>Database access error</strong>';
    }
  }

  include __DIR__ . '/../../../templates/assign7/layout.html.php';

  //set $pdo to null to terminate database connection
  if(!is_null($pdo)){
    $pdo = null;
  }
 ?>
