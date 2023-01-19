<?php
  require_once('./secure.php');
  require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

  if(!isset($_SESSION['id_user'])) {
      header('Location: login.php');
      exit;
  }
  
  $id = $_POST['id'];
  $new_name = $_POST['new_name'];
    

  if (!$loggedIn) {
    header('Location: login.php');
  } else {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $title = trim(isset($_POST['title'])) ? trim($_POST['title']) : null;
    $foundTodoIndex = null;
    
    if ($id && strlen($title)) {

      require_once('./readDb.php');

      foreach($todos as $index => $todo) {
        if ($todo['userId'] === 1 && $todo['id'] == $id) {              
          $foundTodoIndex = $index;
        }
      }

      if ($foundTodoIndex !== null) {
        $todos[$foundTodoIndex]['title'] = $title;

        $todosStr = json_encode($todos);
        file_put_contents($dbPath, $todosStr);
      }
    } 

    header('Location: index.php');
  }

  if (!$loggedIn) {
    header('Location: login.php');
  } else {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $title = trim(isset($_POST['title'])) ? trim($_POST['title']) : null;
    $foundEventIndex = null;
    
    if ($id && strlen($title)) {

      require_once('./readDb.php');

      foreach($events as $index => $event) {
        if ($event['userId'] === 1 && $event['id'] == $id) {              
          $foundEventIndex = $index;
        }
      }

      if ($foundEventIndex !== null) {
        $events[$foundEventIndex]['title'] = $title;

        $eventsStr = json_encode($events);
        file_put_contents($dbPath, $eventsStr);
      }
    } 

    header('Location: index.php');
  }
?>