<?php
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $connection = connect();

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $token = bin2hex(random_bytes(50));

        $sql = "INSERT INTO password_reset (user_id, token) VALUES ('$user[id]', '$token')";

        if (mysqli_query($connection, $sql)) {
            $to = $email;
            $subject = "Password reset request";
            $message = "Please click the following link to reset your password: \n\n" .
                "C:\xampp\htdocs\SEMINAR\proiectpwa\password_reset.php?token=" . $token;

            mail($to, $subject, $message);

            echo "Password reset link sent to your email";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    } else {
        echo "Invalid email address";
    }
    mysqli_close($connection);
}
?>

<form action="password_reset.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <br>
    <input type="submit" value="Reset Password">
</form>
