<?php
  session_start();

  if (isset($_SESSION['user'])) {
    $loggedIn = true;    
  } 
?>

<?php
// require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

// function auth($user, $password) {
//     $connection = connect();
//     $sql = "SELECT id, username FROM `users` WHERE username = '$user' and active = 1 and password = PASSWORD('$password');";
//     $result = mysqli_query($connection, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//     } else {
//         $row = false;
//     }
//     mysqli_close($connection);
//     return $row;
// }
