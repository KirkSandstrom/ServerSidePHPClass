<?php
try{
  include __DIR__ . '/../../includes/DatabaseConnection.php';
  include __DIR__ . '/../../classes/DatabaseTable.php';

  $jokesTable = new DatabaseTable($pdo, 'joke', 'id');

  if(isset($_POST['comment'])){
    $comment = $_POST['joke'];
    $comment['']
  }
}
?>
