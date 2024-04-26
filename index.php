<?php
require __DIR__ . '/vendor/autoload.php';
use app\Add_item;
use app\Get_data;

$temp = new Add_item;
if (isset($_POST['submit'])) {
  $task = $_POST['todoInput'];
  $temp->upload_item($task);
}

$data = new Get_data;
$pending = $data->pending();
$completed = $data->completed();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo App</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div id="todoapp">
    <h1>Todo App</h1>
    <form method="post">
      <input type="text" name="todoInput" placeholder="Add a new todo" required>
      <button name="submit">Add</button>
    </form>
    <div>
      <h2>Tasks</h2>
      <div id="allTasks">
        <?php foreach ($pending as $task): ?>
          <div id="pendingTasks">
            <h4>Created at <?= $task['created_at'] ?></h4>
            <p><?= $task['task'] ?></p>
            <button class="edit" data-task-id="<?= $task['id'] ?>">Edit</button>
            <button class="delete" data-task-id="<?= $task['id'] ?>">Delete</button>
            <button class="complete" data-task-id="<?= $task['id'] ?>">completed</button>
          </div>
        <?php endforeach; ?>
        <?php foreach ($completed as $task): ?>
          <div id="completedTasks">
            <h4>completed at <?= $task['updated_at'] ?></h4>
            <p><?= $task['task'] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</body>

</html>