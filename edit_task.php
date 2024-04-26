<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['taskId']) && isset($_POST['newTask'])) {
        $taskId = $_POST['taskId'];
        $newTask = $_POST['newTask'];
        $connection = mysqli_connect('localhost','divyaansh','Divy@1234','exam');
        if ($connection) {
            $query = "UPDATE todo_items SET task = ? WHERE id = ?";
            $stmt = $connection->prepare($query);
            if (!$stmt) {
                echo json_encode(['success' => false]);
                exit;
            }
            $stmt->bind_param('si', $newTask, $taskId);
            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
                exit;
            }
        }
    }
}

echo json_encode(['success' => false]);

