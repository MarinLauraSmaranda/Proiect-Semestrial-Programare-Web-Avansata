<?php
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';

session_start();

if(!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit;
}

$todos = readTodos();
$events = readEvents();
?>

<h1>My Todos</h1>

<ul>
    <?php foreach($todos as $todo): ?>
        <li><?php echo $todo['task']; ?></li>
    <?php endforeach; ?>
</ul>

<form action="add_todo.php" method="post">
    <input type="text" name="task" placeholder="Add a new todo">
    <input type="submit" value="Add">
</form>

<h1>My Events</h1>

<ul>
    <?php foreach($events as $event): ?>
        <li><?php echo $event['event']; ?></li>
    <?php endforeach; ?>
</ul>

<form action="add.php" method="post">
    <input type="text" name="event" placeholder="Add a new event">
    <input type="submit" value="Add">
</form>