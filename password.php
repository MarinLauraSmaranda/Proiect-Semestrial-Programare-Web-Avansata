<?php
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

session_start();

if(!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit;
}

if(isset($_POST['current_password']) && isset($_POST['new_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    $user = auth($_SESSION['username'], $current_password);

    if($user) {
        $connection = connect();

        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = '$new_password_hash' WHERE id = '$user[id]'";

        if (mysqli_query($connection, $sql)) {
            echo "Password changed successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
    } else {
        echo 'Invalid current password';
    }
}
?>

<form action="change_password.php" method="post">
    <label for="current_password">Current Password:</label>
    <input type="password" id="current_password" name="current_password">
    <br>
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password">
    <br>
    <input type="submit" value="Change Password">
</form>

