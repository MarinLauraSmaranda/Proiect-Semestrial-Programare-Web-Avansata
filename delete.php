<?php
  require_once('./secure.php');
  require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

  if(!isset($_SESSION['id_user'])) {
      header('Location: login.php');
      exit;
  }
  
  $id = $_POST['id'];
  
  $conn = connect();
  $sql = "DELETE FROM tasks WHERE id = $id";
  $result = $conn->query($sql);
  
  if ($result === TRUE) {
      echo "Task or event deleted successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  

  // if (!$loggedIn) {
  //   header('Location: login.php');
  // } else {
  //   if (isset($_POST['id'])) {
  //     // deleting
  //     $id = $_POST['id'];
  //     require_once('./readDb.php');
  //     $todosCareRaman = [];

  //     foreach($todos as $todo) {
  //       if (!($todo['userId'] === 1 && $todo['id'] == $id)) {              
  //         $todosCareRaman[] = $todo;
  //       }
  //     }

  //     $todosStr = json_encode($todosCareRaman);
  //     file_put_contents($dbPath, $todosStr);
  //   } 
  //   header('Location: index.php');
  // }

  // if (!$loggedIn) {
  //   header('Location: login.php');
  // } else {
  //   if (isset($_POST['id'])) {
  //     // deleting
  //     $id = $_POST['id'];
  //     require_once('./readDb.php');
  //     $eventsCareRaman = [];

  //     foreach($events as $event) {
  //       if (!($event['userId'] === 1 && $event['id'] == $id)) {              
  //         $eventsCareRaman[] = $event;
  //       }
  //     }

  //     $eventsStr = json_encode($eventsCareRaman);
  //     file_put_contents($dbPath, $eventsStr);
  //   } 
  //   header('Location: index.php');
  // }
?>