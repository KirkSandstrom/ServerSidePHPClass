<?php
  /*
  //Connect to the actual server on wcit.unh.edu
  $username = "kms2007";
  $password = "AcBagsh7";
  $dsn = "mysql:host=localhost;dbname={$username}";
  $dsn .= ";charset=utf8";
  */

  //connect to the local homestead server
  $username = "homestead";
  $password = "secret";
  $dsn = "mysql:host=192.168.10.10;dbname={$username}";
  $dsn .= ";charset=utf8";

  try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $err){
    $msg = 'Database connection error';
    include $_SERVER['DOCUMENT_ROOT'] . '/../templates/assign7/error.html.php';
    exit();
  }
?>
