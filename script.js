$(document).ready(function () {
  $(document).on('click', '.edit', function () {
    var taskId = $(this).data('task-id');
    var newTask = prompt("Enter the new task:");
    if (newTask !== null) {
      $.ajax({
        url: 'edit_task.php',
        method: 'POST',
        data: { taskId: taskId, newTask: newTask },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            alert('Task updated successfully!');
            window.location.reload();
          } else {
            alert('Failed to update task.');
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    }
  });

  $(document).on('click', '.delete', function () {
    var taskId = $(this).data('task-id');
    var taskContainer = $(this).closest('#pendingTasks, #completedTasks').parent();
    if (confirm("Are you sure you want to delete this post?")) {
      $.ajax({
        url: 'delete_task.php',
        method: 'POST',
        data: { taskId: taskId },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            alert('Post deleted successfully!');
            taskContainer.remove();
            window.location.reload();
          } else {
            alert('Failed to delete post.');
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    }
  });
  $(document).on('click', '.complete', function () {
    var taskId = $(this).data('task-id');
    if (confirm("Are you sure this task is done")) {
      $.ajax({
        url: 'completed.php',
        method: 'POST',
        data: { taskId: taskId },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            alert('Marked as complete');
            window.location.reload();
          } else {
            alert('Failed to mark as done.');
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    }
  });
});
