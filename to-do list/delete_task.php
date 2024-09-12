<?php
include('db/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_id = $_POST['task_id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :task_id");
    $stmt->execute([':task_id' => $task_id]);

    header('Location: index.php');
    exit();
}
?>
