<?php include('db/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <h1>To-Do List</h1>

        <form action="add_task.php" method="POST">
            <input type="text" name="task_name" placeholder="Task Name" required>
            <textarea name="task_description" placeholder="Task Description"></textarea>
            <button type="submit">Add Task</button>
        </form>

        <h2>Your Tasks</h2>
        <ul>
            <?php
            // Fetch all tasks
            $stmt = $conn->query("SELECT * FROM tasks");
            while ($task = $stmt->fetch()) {
                echo '<li class="' . ($task['status'] ? 'completed' : '') . '">';
                echo ($task['status'] ? '<strike>' : '') . htmlspecialchars($task['task_name']) . ($task['status'] ? '</strike>' : '');
                echo '<form action="delete_task.php" method="POST" style="display:inline-block;">
                        <input type="hidden" name="task_id" value="' . $task['id'] . '">
                        <button type="submit">Delete</button>
                      </form>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>

</body>
</html>
