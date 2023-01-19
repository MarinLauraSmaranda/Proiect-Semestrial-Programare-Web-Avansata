<?php
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

if(isset($_GET['token'])) {
    $token = $_GET['token'];
    $connection = connect();

    $sql = "SELECT user_id FROM password_reset WHERE token = '$token'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if(isset($_POST['password'])) {
            $password = $_POST['password'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password = '$password_hash' WHERE id = '$user[user_id]'";

            if (mysqli_query($connection, $sql)) {
                echo "Password changed successfully";
                $sql = "DELETE FROM password_reset WHERE token = '$token'";
                mysqli_query($connection, $sql);

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
        }
    } else {
        echo "Invalid token";
    }
    mysqli_close($connection);
}
?>

<form action="password_confirm.php?token=<?php echo $token; ?>" method="post">
    <label for="password">New Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Change Password">
</form>
