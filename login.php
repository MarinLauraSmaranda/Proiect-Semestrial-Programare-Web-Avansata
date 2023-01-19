<?php
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = connect();

    $user = auth($username, $password);

    if($user) {
        $_SESSION['id_user'] = $user['id'];
        header('Location: table.php');
    } else {
        echo 'Invalid login credentials';
    }
}
?>


<!-- <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Log in">
</form> -->


<!DOCTYPE html>
<html>
  <head>
    <title>Log In</title>
    <style>
    body {
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    font-family: Calibri, sans-serif; 
    font-size: 20px;
    color: #1769d4;
    font-weight: bold; 
    background-image: url('Orange-Waves-Powerpoint-Templates-800x600.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
}


.logo {
    width: 200px; 
    height: 100px; 
}
      .form {
        width: 300px;
        margin: 0 auto; 
        padding: 50px;
        background-color: #f1cbb9;
        border: 1px solid rgb(238, 190, 190);
        text-align: center; 
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      
      input[type="text"], input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      input[type="submit"] {
        width: 100%;
        background-color: #1b36ad;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #f09036;
      }
      .form h1 {
        margin-bottom: 30px;
      }
      .form a {
        color: rgb(231, 100, 40);
        text-decoration: none;
      }
      .form a:hover {
        text-decoration: underline;
      }
      .logo {
    position: absolute;
    top: 0;
    left: 0;
}
    </style>
  </head>
  <body>
    <a href="homepage.php">
      <img src="Screenshot 2023-01-15 080635.png" alt="." class="logo">
    </a>
    <div class="form">
      <h1>Log In</h1>
      
      <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br>
      <input type="submit" value="Log in">
        <p>You don't have an account yet?</p>
        <div class="buttons-section">
          <a href="signup.php" class="btn btn-success">Sign Up</a>
      </div>
      <div class="logo">
          <a href="homepage.php" class="btn btn-primary">Home Page</a>
      </div>
      </form>
    </div>
  </body>
</html>
