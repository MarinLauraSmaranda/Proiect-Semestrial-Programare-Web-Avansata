<?php
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\mysql.php';
require_once 'C:\xampp\htdocs\SEMINAR\proiectpwa\secure.php';

startSecureSession();

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit;
}

$todos = readTodos();
$events = readEvents();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            font-family: Calibri, sans-serif; 
            font-size: 20px;
            color: #043778;
            font-weight: bold; 
            background-image: url('Orange-Waves-Powerpoint-Templates-800x600.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ffffff;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #fe7722;
        }
        .logo {
            width: 200px; 
            height: 100px; 
            position: absolute;
            top: 0;
            left: 0;
        }
        
    </style>
</head>
<body>
    <a href="homepage.php">
        <img src="Screenshot 2023-01-15 080635.png" alt="Home Page" class="logo">
      </a>
      <div class="logo">
        <a href="homepage.php" class="btn btn-primary">Home Page</a>
    </div>

    <h1>Welcome! <?php echo $_SESSION['username']; ?></h1>

    <h2>My Tasks</h2>
    <table>
        <thead>
            <tr>
                <th>NR.</th>
                <th>TITLE</th>
                <th>CHECKED</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todos as $index => $todo): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $todo['task']; ?></td>
                </tr>
            <?php endforeach; ?>
    

    <tr>
        <td>1</td>
        <td>Buy groceries</td>
        <td>
            <input type="checkbox" name="checked_1">
        </td>
        <td>
            <form action="add.php" method="post">
                <input type="submit" value="Add">
            </form>
            <form action="delete.php" method="post">
                <input type="submit" value="Delete">
            </form>
            <form action="edit.php" method="post">
                <input type="text" name="new_task" placeholder="New task name">
                <input type="submit" value="Edit">
            </form>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>Wash the car</td>
        <td>
            <input type="checkbox" name="checked_2">
        </td>
        <td>
            <form action="add.php" method="post">
                <input type="submit" value="Add">
            </form>
            <form action="delete.php" method="post">
                <input type="submit" value="Delete">
            </form>
            <form action="edit.php" method="post">
                <input type="text" name="new_task" placeholder="New task name">
                <input type="submit" value="Edit">
            </form>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td>Pay the bills</td>
        <td>
            <input type="checkbox" name="checked_3">
        </td>
        <td>
        <form action="add.php" method="post">
        <input type="submit" value="Add">
        </form>
        <form action="delete.php" method="post">
        <input type="submit" value="Delete">
        </form>
        <form action="edit.php" method="post">
        <input type="text" name="new_task" placeholder="New task name">
        <input type="submit" value="Edit">
        </form>
        </td>
        </tr>

        </tbody>
    </table>

    <h2>My Events</h2>
    <table>
        <thead>
            <tr>
                <th>NR.</th>
                <th>TITLE</th>
                <th>ATTENDED</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $index => $event): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $event['title']; ?></td>

                </tr>
            <?php endforeach; ?>

            <tr>
                <td>1</td>
                <td>Meeting</td>
                <td>
                    <input type="radio" name="attended_1" value="1">Yes
                    <input type="radio" name="attended_1" value="0">No
                </td>
                <td>
                    <form action="add.php" method="post">
                        <input type="submit" value="Add">
                    </form>
                    <form action="delete.php" method="post">
                        <input type="submit" value="Delete">
                    </form>
                    <form action="edit.php" method="post">
                        <input type="text" name="new_event" placeholder="New event name">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Concert</td>
                <td>
                    <input type="radio" name="attended_2" value="1">Yes
                    <input type="radio" name="attended_2" value="0">No
                </td>
                <td>
                    <form action="add.php" method="post">
                        <input type="submit" value="Add">
                    </form>
                    <form action="delete.php" method="post">
                        <input type="submit" value="Delete">
                    </form>
                    <form action="edit.php" method="post">
                        <input type="text" name="new_event" placeholder="New event name">
                        <input type="submit" value="Edit">
                    </form>
                    </td>
                    </tr>
                    <tr>
                    <td>3</td>
                    <td>Reunion 10 years</td>
                    <td>
                    <input type="radio" name="attended_3" value="1">Yes
                    <input type="radio" name="attended_3" value="0">No
                    </td>
                    <td>
                    <form action="add.php" method="post">
                    <input type="submit" value="Add">
                    </form>
                    <form action="delete.php" method="post">
                    <input type="submit" value="Delete">
                    </form>
                    <form action="edit.php" method="post">
                    <input type="text" name="new_event" placeholder="New event name">
                    <input type="submit" value="Edit">
                    </form>
                    </td>
                    </tr>
        </tbody>
    </table>
    <p></p>
    <p></p>
    <a href="logout.php">Logout</a>
</body>
</html>