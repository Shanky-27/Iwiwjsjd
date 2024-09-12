<?php
include('db/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    $stmt = $conn->prepare("INSERT INTO tasks (task_name, task_description) VALUES (:task_name, :task_description)");
    $stmt->execute([
        ':task_name' => $task_name,
        ':task_description' => $task_description
    ]);

    header('Location: index.php');
    exit();
}
?>
