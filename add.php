<?php
  require_once('./secure.php');

  require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

  if(!isset($_SESSION['id_user'])) {
      header('Location: login.php');
      exit;
  }
  
  $name = $_POST['name'];
  
  $conn = connect();
  $sql = "INSERT INTO tasks (name) VALUES ('$name')";
  $result = $conn->query($sql);
  
  if ($result === TRUE) {
      echo "New task or event created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  

  // if (!$loggedIn) {
  //   header('Location: login.php');
  // } else {
  //   if (isset($_POST['title'])) {

  //     $title = trim($_POST['title']);

  //     if (strlen($title) > 0) {
  //       require_once('./readDb.php');
      
  //       $max = 0;
  //       foreach($todos as $todo) {
  //         if ($todo['userId'] === 1 && $todo['id'] > $max) {
  //           $max = $todo['id'];
  //         }
  //       }

  //       $todos[] = [
  //         "userId" => 1,
  //         "id" => $max + 1,
  //         "title" => $title,
  //         "completed" => false
  //       ];

  //       $todosStr = json_encode($todos);
  //       file_put_contents($dbPath, $todosStr);
  //     }    
  //   } 
  //   header('Location: index.php');
 // }

  // if (!$loggedIn) {
  //   header('Location: login.php');
  // } else {
  //   if (isset($_POST['title'])) {

  //     $title = trim($_POST['title']);

  //     if (strlen($title) > 0) {
  //       require_once('./readDb.php');
      
  //       $max = 0;
  //       foreach($events as $event) {
  //         if ($event['userId'] === 1 && $event['id'] > $max) {
  //           $max = $event['id'];
  //         }
  //       }

  //       $events[] = [
  //         "userId" => 1,
  //         "id" => $max + 1,
  //         "title" => $title,
  //         "completed" => false
  //       ];

  //       $eventsStr = json_encode($events);
  //       file_put_contents($dbPath, $eventsStr);
  //     }    
  //   } 
  //   header('Location: index.php');
  // }
?>