<?php
//---variables---
//-Decks-
$fullDeck; //all 52 cards
$gameDeck; //subset of cards that will actually be in play. Size determined by $deckSize
$playerCard = array();
$compCard = array();
$playerDeck = array();
$compDeck = array();
//-Cards in play-
$playerCardValue;
$compCardValue;
//-card pot-
$pot = array();
//-Other-
$message;
$deckSize;
//-----------------------------------------------------------------------------------------------------------------------------
initializeGame();

  //-----------------------------------------------------------------------------------------------------------------------------
  //Sets up the game
  function initializeGame(){
    global $playerDeck;
    global $compDeck;
    global $pot;

    global $playerCard;
    global $compCard;

    global $playerCardValue;
    global $compCardValue;

    global $deckSize;
    global $message;

    if(isset($_REQUEST["nextTurn"])){ //take the next turn
      takeTurn();
    }

    if(!isset($_REQUEST["dealCards"])){ //Not a form submission, so generate a form.
      $message = "";
      include __DIR__ . "../../../../templates/A6/A6P1/assignment6part1gameStart.html.php";
      exit();
    }
    else{ //form submitted, play the game.
      $deckSize = htmlspecialchars($_REQUEST["deckSize"], ENT_QUOTES, "UTF-8");

      //Valid decksize specified between 2 and 52. Or no size specified, so default to size of 52. Play the game.
      if(2 <= $deckSize && $deckSize <= 52 || !$deckSize){
        if(!$deckSize){
          $deckSize = 52;
        }

        $fullDeck = buildDeck();
        shuffle($fullDeck);

        $gameDeck = createGameDeck($fullDeck);

        dealCards();
        $message = "The deck has been shuffled and dealt, to take your first turn, press the Go! button. <br><br>";
        $message .= "The computer has <strong>" . count($compDeck) . "</strong> cards. <br>";
        $message .= "You have <strong>" . count($playerDeck) . "</strong> cards. <br>";

        //test saving gamestate
        saveState('playerState.txt', $playerDeck);
        saveState('compState.txt', $compDeck);

        include __DIR__ . "../../../../templates/A6/A6P1/assignment6part1gamePlay.html.php";
        exit();
      }
      else{
        //Invalid decksize specified. Redisplay form with error message.
        $message = "Error: Please enter a decksize between 2 and 52.";
        include __DIR__ . "../../../../templates/A6/A6P1/assignment6part1gameStart.html.php";
        exit();
      }
    }
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //Builds the entire deck of 52 cards
  function buildDeck(){
    $deck = array();

    //Creates cards of all 4 suits with numbers 2-9
    for($i = 2; $i < 10; $i++){
      array_push($deck, array($i . "c", $i));
      array_push($deck, array($i . "d", $i));
      array_push($deck, array($i . "h", $i));
      array_push($deck, array($i . "s", $i));
    }
    //create 10s
    array_push($deck, array("tc", 10));
    array_push($deck, array("td", 10));
    array_push($deck, array("th", 10));
    array_push($deck, array("ts", 10));
    //create jacks
    array_push($deck, array("jc", 11));
    array_push($deck, array("jd", 11));
    array_push($deck, array("jh", 11));
    array_push($deck, array("js", 11));
    //create queens
    array_push($deck, array("qc", 12));
    array_push($deck, array("qd", 12));
    array_push($deck, array("qh", 12));
    array_push($deck, array("qs", 12));
    //create kings
    array_push($deck, array("kc", 13));
    array_push($deck, array("kd", 13));
    array_push($deck, array("kh", 13));
    array_push($deck, array("ks", 13));
    //create aces
    array_push($deck, array("ac", 14));
    array_push($deck, array("ad", 14));
    array_push($deck, array("ah", 14));
    array_push($deck, array("as", 14));
    //return the $deck array
    return $deck;
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //shuffles the card deck *this is done before the specified number of playing cards are taken from the deck*
  function shuffleDeck(&$deck){
    shuffle($deck);
    shuffle($deck);
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //draws the specified number of cards ($deckSize) from the top of the $fullDeck and adds them to the $gameDeck.
  //this is the deck that will actually be split in half for both players and used in the game.
  function createGameDeck($deck){
    global $deckSize;
    global $gameDeck;
    $gameDeck = array();

    for($i = 0; $i < $deckSize; $i++){
      array_push($gameDeck, $deck[$i]);
    }

    return $gameDeck;
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //Deals cards from the $gameDeck to each player *incomplete*
  function dealCards(){
    global $gameDeck;
    global $playerDeck;
    global $compDeck;

    $playerDeck = array();
    $compDeck = array();

    while(count($gameDeck) > 0){
      if(count($gameDeck) > 0){
        array_push($playerDeck, array_pop($gameDeck));
      }
      if(count($gameDeck) > 0){
        array_push($compDeck, array_pop($gameDeck));
      }
    }
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //Saves the state of the game to a data file
  function saveState($filename, $deck){
    $data = "";

    $filename = $_SERVER["DOCUMENT_ROOT"] . "/A6/data/" . $filename;
    $filehandle = fopen($filename, "wb") or die("<p>Unable to create the file!</p>\n");

    foreach($deck as $card){
      $data .= $card[0] . "," . $card[1]  . "\r\n"; //***!!! REPLACE THIS WITH "/n" FOR LINUX OS!!!***
    }

    fwrite($filehandle, $data) or die("<p>Unable to append to the file!</p>\n");
    fclose($filehandle);
    //echo "<p>File created and appended successfully.</p>\n";
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //Rebuilds the deck arrays from the data files
  function restoreState($filename, &$deck){
    if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/A6/data/" . $filename)){
      $innerArray = array();

      $tempArray = file($_SERVER["DOCUMENT_ROOT"] . "/A6/data/" . $filename, FILE_IGNORE_NEW_LINES);

      foreach($tempArray as $item){
        $innerArray = explode(',', $item);
        array_push($deck, $innerArray);
      }
    }
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //Delete the specified file.
  function deleteFile($fileName){
    $fileName = $_SERVER["DOCUMENT_ROOT"] . "/A6/data/" . $fileName;

    if(file_exists($fileName)){
      unlink($fileName);
    }
  }

  //-----------------------------------------------------------------------------------------------------------------------------
  //Take a turn
  function takeTurn(){
    global $playerDeck;
    global $compDeck;
    global $pot;

    global $playerCard;
    global $compCard;

    global $playerCardValue;
    global $compCardValue;

    global $deckSize;
    global $message;

    restoreState('playerState.txt', $playerDeck);
    restoreState('compState.txt', $compDeck);
    restoreState('pot.txt', $pot);

    $playerCard = array_shift($playerDeck);
    $compCard = array_shift($compDeck);

    $playerCardValue = $playerCard[1];
    $compCardValue = $compCard[1];

    //$playerCardValue = $playerDeck[count($playerDeck) - 1][1];
    //$compCardValue = $compDeck[count($compDeck) - 1][1];

    array_push($pot, $playerCard);
    array_push($pot, $compCard);

    /*for($i = 0; $i < count($pot); $i++){
      echo($pot[$i][0]);
      echo("<br>");
    }*/

    if($playerCardValue > $compCardValue){ //if player wins..
      $message = "Player plays.. " . $playerCard[0] . " Computer plays.. " . $compCard[0] . "<br><br>";
      $message .= '<img src="C:\Users\rider\Desktop\it-604-site\my_project\Project\public\A6\cards">';
      //$message .= '<img src="' . __DIR__ . '../cards/' . $playerCard[0] . '.gif/><br><br>';

      $message .= "<strong>Player Wins the turn</strong><br><br>";

      $playerDeck = array_merge($playerDeck, $pot);

      $message .= "The computer has <strong>" . count($compDeck) . "</strong> cards. <br>";
      $message .= "You have <strong>" . count($playerDeck) . "</strong> cards. <br>";

      deleteFile('pot.txt');

      unset($pot);
      $pot = array();
      }

    else if($compCardValue > $playerCardValue){ //if comp wins..
      $message = "Player plays.. " . $playerCard[0] . " Computer plays.. " . $compCard[0] . "<br><br>";
      $message .= "<strong>Computer Wins the turn</strong><br><br>";

      $compDeck = array_merge($compDeck, $pot);

      $message .= "The computer has <strong>" . count($compDeck) . "</strong> cards. <br>";
      $message .= "You have <strong>" . count($playerDeck) . "</strong> cards. <br>";

      deleteFile('pot.txt');

      unset($pot);
      $pot = array();
      }
      else if($playerCardValue == $compCardValue){ //if tie..
        array_push($pot, array_shift($playerDeck));
        array_push($pot, array_shift($compDeck));
        array_push($pot, array_shift($playerDeck));
        array_push($pot, array_shift($compDeck));
        array_push($pot, array_shift($playerDeck));
        array_push($pot, array_shift($compDeck));

        saveState('pot.txt', $pot);

        unset($pot);
        $pot = array();

        takeTurn();
      }

    if(count($playerDeck != 0)){
      saveState('playerState.txt', $playerDeck);
    }
    if(count($compDeck != 0)){
      saveState('compState.txt', $compDeck);
    }

    include __DIR__ . "../../../../templates/A6/A6P1/assignment6part1gamePlay.html.php";
    exit();
  }
?>
