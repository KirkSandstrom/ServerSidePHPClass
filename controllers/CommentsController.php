<?php
  class CommentsController{
    private $usersTable;
    private $commentsTable;

    public function __construct(DatabaseTable $commentsTable, DatabaseTable $usersTable){
      $this->commentsTable = $commentsTable;
      $this->usersTable = $usersTable;
    }

    public function list(){
      $result = $this->commentsTable->findAll();

      $comments = [];
      foreach($result as $comment){
        $contributor =
        $this->usersTable->findById($comment['contributor_id']);

        $comments[] = [
          'id' => $comment['id'],
          'feedback_message' => $comment['feedback_message'],
          'time_added' => $comment['time_added'],
          'name' => $contributor['fname'] . ' ' . $contributor['lname'],
          'email' => $contributor['email']
        ];
      }

      $title = 'Comments List';

      $totalComments = $this->commentsTable->total();

      return ['template' => 'comments.html.php',
        'title' => $title,
        'variables' => [
          'totalComments' => $totalComments,
          'comments' => $comments
        ]
      ];
    }

    public function home(){
      $title = 'IT604 Assignment9';

      return ['template' => 'home.html.php', 'title' => $title];
    }

    public function delete(){

      $title = 'IT604 Assignment9';

      $this->commentsTable->delete($_POST['id']);

      //header('location: comments.php');

      return ['template' => 'home.html.php', 'title' => $title];
    }

    public function edit(){
      if(isset($_POST['comment'])) {

        $comment = $_POST['comment'];
        $comment['time_added'] = new DateTime();
        $comment['contributor_id'] = 1;

        $this->commmentsTable->save($comment);

        header('location: comments.php');
      }
      else {
        if(isset($_GET['id'])){
          $commment = $this->commentsTable->findById($_GET['id']);
        }

        $title = 'Edit Comment';

        return ['template' => 'editComment.html.php',
          'title' => $title,
          'variables' => [
            'comment' => $comment ?? null
          ]
        ];
      }
    }

  }
?>
