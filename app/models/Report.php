<?php

class Report {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function get_reminders_count () {
      $db = db_connect();
      $statement = $db->prepare("select user_id as id, count(*) as user_count from reminders group by user_id;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function get_logins_count () {
      $db = db_connect();
      $statement = $db->prepare("select username as user, count(*) as user_count from logins group by username;");
      $statement->execute();
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

}
?>