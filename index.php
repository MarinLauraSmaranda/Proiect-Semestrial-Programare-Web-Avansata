<?php
    // require_once('./secure.php');
    // require_once('./readDb.php');

    // $data = file_get_contents('todos.json');

    // $todos = json_decode($data, true);

    // if (empty($todos['todos'])) {
    //     echo "No to-do items found.";
    // } else {
    //     echo "<ul>";
    //     foreach ($todos['todos'] as $todo) {
    //         echo "<li>" . $todo['title'] . ": " . $todo['description'] . "</li>";
    //     }
    //     echo "</ul>";
    // }


require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\readDb.php';
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\secure.php';

startSecureSession();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit;
}

$todos = readTodos();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>

    <h2>My Todos</h2>
    <ul>
        <?php foreach($todos as $todo): ?>
            <li><?php echo $todo['task']; ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="add_todo.php" method="post">
        <input type="text" name="task" placeholder="Add a new todo">
        <input type="submit" value="Add">
    </form>

    <h3>My Events</h2>
    <ul>
        <?php foreach($events as $event): ?>
            <li><?php echo $event['event']; ?></li>
        <?php endforeach; ?>
    </ul>

    <form action="add_event.php" method="post">
        <input type="text" name="event" placeholder="Add a new event">
        <input type="submit" value="Add">
    </form>

    <a href="logout.php">Logout</a>
</body>
</html>
?>
