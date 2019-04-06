<?php
function loadTemplate($templateFileName, $variables =[])
{
  extract($variables);

  ob_start();
  include __DIR__ . '/../../templates/assign9/' . $templateFileName;

  return ob_get_clean();
}

try{
  include __DIR__ . '/../../includes/assign9/DatabaseConnection.php';
  include __DIR__ . '/../../classes/assign9/DatabaseTable.php';

  $commentsTable = new DatabaseTable($pdo, 'comments', 'id');
  $usersTable = new DatabaseTable($pdo, 'users', 'id');

  //if no route variable is set use 'comments/home'
  $route = $_GET['route'] ?? 'comments/home';

  if($route == strtolower($route)) {
    if($route === 'comments/list'){
      include __DIR__ . '/../../controllers/CommentsController.php';
      $controller = new CommentsController($commentsTable, $usersTable);
      $page = $controller->list();
    }
    elseif($route === 'comments/home'){
      include __DIR__ . '/../../controllers/CommentsController.php';
      $controller = new CommentsController($commentsTable, $usersTable);
      $page = $controller->home();
    }
    elseif($route === 'comments/edit'){
      include __DIR__ . '/../../controllers/CommentsController.php';
      $controller = new CommentsController($commentsTable, $usersTable);
      $page = $controller->edit();
    }
    elseif($route === 'comments/delete'){
      include __DIR__ . '/../../controllers/CommentsController.php';
      $controller = new CommentsController($commentsTable, $usersTable);
      $page = $controller->delete();
    } //user stuff starts here
    elseif($route === 'users/list'){
      include __DIR__ . '/../../controllers/UsersController.php';
      $controller = new UsersController($usersTable, $commentsTable);
      $page = $controller->list();
    }
    elseif($route === 'users/edit'){
      include __DIR__ . '/../../controllers/UsersController.php';
      $controller = new UsersController($usersTable, $commentsTable);
      $page = $controller->edit();
    }
    elseif($route === 'users/delete'){
      include __DIR__ . '/../../controllers/UsersController.php';
      $controller = new UsersController($usersTable, $commentsTable);
      $page = $controller->delete();
    }
  }
  else {
    http_response_code(301);
    header('location: index.php?route=' . strtolower($route));
  }

  $title = $page['title'];

  if(isset($page['variables'])){
    $output = loadTemplate($page['template'], $page['variables']);
  }
  else {
    $output = loadTemplate($page['template']);
  }
}
catch(PDOException $e){
  $title = 'An error has occured';

  $output = 'Database error: ' . $e->getMessage() . ' in '
    . $e->getFiles() . ':' . $e->getLine();
}

include __DIR__ . '/../../templates/assign9/layout.html.php';
