<?php
  class UsersController{
    private $usersTable;
    private $commentsTable;

    public function __construct(DatabaseTable $usersTable, DatabaseTable $commentsTable){
      $this->commentsTable = $commentsTable;
      $this->usersTable = $usersTable;
    }

    public function list(){
      $result = $this->usersTable->findAll();

      $users = [];

      foreach($result as $user){
        //$selectedUser =
        //$this->usersTable->findById($user['id']);

        $users[] = [
          'id' => $user['id'],
          'time_added' => $user['time_added'],
          'fname' => $user['fname'],
          'lname' => $user['lname'],
          'uname' => $user['uname'],
          'email' => $user['email']
        ];
      }

      $title = 'Users List';

      $totalUsers = $this->usersTable->total();

      return ['template' => 'users.html.php',
        'title' => $title,
        'variables' => [
          'totalUsers' => $totalUsers,
          'users' => $users
        ]
      ];
    }

    public function home(){
      $title = 'IT604 Assignment9';

      return ['template' => 'home.html.php', 'title' => $title];
    }

    public function delete(){
      $title = 'IT604 Assignment9';

      $this->usersTable->delete($_POST['id']);

      //header('location: comments.php');

      return ['template' => 'home.html.php', 'title' => $title];
    }

    public function edit(){
      if(isset($_POST['user'])) {

        $user = $_POST['user'];
        $user['time_added'] = new DateTime();
        $user['id'] = 1; //Change this probably**********************************8

        $this->usersTable->save($user);

        header('location: users.php');
      }
      else {
        if(isset($_GET['id'])){
          $user = $this->usersTable->findById($_GET['id']);
        }

        $title = 'Edit User';

        return ['template' => 'editUser.html.php',
          'title' => $title,
          'variables' => [
            'user' => $user ?? null
          ]
        ];
      }
    }

  }
?>
