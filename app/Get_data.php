<?php 
namespace app;
use app\Database;

class Get_data{
  public $con;

  /**
   * to connnect to database
   */
  public function __construct() {
      $this->con = new Database;
      $this->con->connection();
  }

  /**
   * to get pendinng tasks from database
   */
  public function pending(){
    if ($this->con) {
      $query = "SELECT * FROM todo_items WHERE status = 'pending'";
      $result = $this->con->query($query);
      if (mysqli_num_rows($result) > 0) {
          $tasks = [];
          while ($row = mysqli_fetch_assoc($result)) {
              $tasks[] = $row;
          }
          return $tasks;
      } else {
        //return empty array if no pending task exists
          return [];
      }
  } else {
      return [];
  }
  }

  /**
   * get completeed tasks
   *
   */
  public function completed(){
    if ($this->con) {
      $query = "SELECT * FROM todo_items WHERE status = 'completed'";
      $result = $this->con->query($query);
      if (mysqli_num_rows($result) > 0) {
          $tasks = [];
          while ($row = mysqli_fetch_assoc($result)) {
              $tasks[] = $row;
          }
          return $tasks;
      } else {
          return [];
      }
  } else {
      return [];
  }
  }
}

