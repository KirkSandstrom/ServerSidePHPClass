<?php
  function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
  }

  function addFeedBack($pdo, $fname_Contributer, $lname_Contributer, $uname_Contributer, $email_Contributer, $fname_Recipient, $lname_Recipient, $uname_Recipient, $email_Recipient, $feedback_Message){
    $query = 'INSERT INTO `feedback` (`fname_contributer`, `lname_contributer`,
      `uname_contributer`, `email_contributer`, `fname_recipient`,
      `lname_recipient`, `uname_recipient`, `email_recipient`, `feedback_message`, `time_added`)
      VALUES (:fname_contributer, :lname_contributer, :uname_contributer,
      :email_contributer, :fname_recipient, :lname_recipient, :uname_recipient,
      :email_recipient, :feedback_message, CURDATE())';

      $parameters = [':fname_contributer' => $fname_Contributer, ':lname_contributer' => $lname_Contributer, ':uname_contributer' => $uname_Contributer,
      ':email_contributer' => $email_Contributer,
      ':fname_recipient' => $fname_Recipient, ':lname_recipient' => $lname_Recipient, ':uname_recipient' => $uname_Recipient,
      ':email_recipient' => $email_Recipient, ':feedback_message' => $feedback_Message,];

      query($pdo, $query, $parameters);
  }

  function deleteFeedBack($pdo, $id){
    $parameters = [':id' => $id];

    query($pdo, 'DELETE FROM `feedback`
    WHERE `id` = :id', $parameters);
  }
 ?>
