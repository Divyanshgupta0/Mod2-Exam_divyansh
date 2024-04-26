<?php 
namespace app;

use app\Database;

/**
 * class to add items to database
 */
class Add_item{
  public $temp;

  /**
   * to connect to database
   */
  public function __construct() {
      $this->temp = new Database;
      $this->temp->connection();
  }

  /**
   * to enter data into database
   *
   * @param string $task
   * @return void
   */
  public function upload_item($task){
    $query="INSERT INTO todo_items (task, status, created_at, updated_at)
    VALUES ('$task', 'pending', NOW(), NOW());";
    $run=$this->temp->query($query);
    if($run){
      echo "data added successfully";
    }
    else {
      echo "error data not entered";
    }
  }
}

