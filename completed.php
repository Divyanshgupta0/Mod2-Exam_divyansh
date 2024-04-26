<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['taskId'])) {
    $taskId = $_POST['taskId'];
    $connection = mysqli_connect('localhost','divyaansh','Divy@1234','exam');
    if ($connection) {
        $query = "UPDATE todo_items SET status = 'completed' WHERE id = ?;
        ";
        $stmt = $connection->prepare($query);
        if (!$stmt) {
            echo "Failed to prepare statement";
            exit;
        }
        $stmt->bind_param('i', $taskId);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Failed to delete task";
            exit;
        }
    }
}

