<?php
try{
    include __DIR__ . '/../../includes/DatabaseConnection.php';
    include __DIR__ . '/../../classes/DatabaseTable.php';

    $commentsTable = new DatabaseTable($pdo, 'comments', 'id');

    $commentsTable->delete($_POST['id']);

    header('location: CommentsController.php');
} catch (PDOException $e){
  $title = 'An error has occured';

  $output = 'Unable to connect to the database server: ' .
  $e->getMessage() . ' in ' .
  $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';
?>
