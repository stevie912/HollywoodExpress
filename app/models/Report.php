<?php

class Report {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {

    }

  public function report($type) {
    if ($type == 'ratings') {
      $db = db_connect();
      $statement = $db->prepare("select * from ratings;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['ratings_report'] = (array)$rows;
    } else if ($type == 'logins') {
      $db = db_connect();
      $statement = $db->prepare("select username as user, count(*) as user_count from logins group by username;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      $_SESSION['logins_report'] = (array)$rows;
    }
  }

}
?>