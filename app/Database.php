<?php
namespace app;
use app\Config;
new Config;

class Database {

  /**
   * connection variaable
   */
  public $con;

  /**
   * to connect to database
   */
  public function connection() {
    $this->con = mysqli_connect(DB_servername, DB_username, DB_password, DB_name);
    return $this->con;
  }

  /**
   * to run query
   *
   * @param string $query
   */
  public function query($query){
    if(!$this->con){
        echo"error connecting database";
        return false;
    }
    $run=mysqli_query($this->con,$query);
    return $run ? $run : false;
    }

}

