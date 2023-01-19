<?php

// define("HOST", "localhost");
// define("USER", "username");
// define("PASSWORD", "password");
// define("DATABASE", "database.sql");
//   function createConnection() {
//     $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }
//     return $conn;
// }

function connect () {
  $connection = mysqli_connect(
    'localhost',
    'root',
    null,
    'todos'
  );

  return $connection;
}
  function auth ($user, $password) {
    $connection = connect();
    $sql = "SELECT id, username FROM `users` WHERE username = '$user' and active = 1 and password = PASSWORD('$password');";
    $result = mysqli_query($connection, $sql);



    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $close = mysqli_close($connection);

      return $row;
    } else {
      $close = mysqli_close($connection);

      return false;

    }
  }

  function readTodos () {
    $connection = connect();
    $todos = [];

    if (isset($_SESSION['id_user'])) {
      $sql = "SELECT * FROM todos WHERE id_user = " . $_SESSION['id_user'] . ";";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $todos[] = $row;
      }
    }
    mysqli_close($connection);
    return $todos;
  }

  function readEvents () {
    $connection = connect();
    $events = [];

    if (isset($_SESSION['id_user'])) {
      $sql = "SELECT * FROM events WHERE id_user = " . $_SESSION['id_user'] . ";";
      $result = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
      }
    }
    mysqli_close($connection);
    return $events;
  }

?>

