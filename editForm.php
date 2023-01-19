<?php
  $foundTodo = null;
  if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    require_once('./readDb.php');
    foreach($todos as $todo) {
      if ($todo['userId'] === 1 && $todo['id'] == $id) {              
        $foundTodo = $todo;
      }
    }
  }

  if ($foundEvent === null) {
    header('Location: index.php');
  }

  $foundEvent = null;
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    require_once('./readDb.php');
    foreach($events as $event) {
      if ($event['userId'] === 1 && $event['id'] == $id) {              
        $foundEvent = $event;
      }
    }
  }

  if ($foundEvent === null) {
    header('Location: index.php');
  }
?>

