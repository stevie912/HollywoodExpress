<?php

class Reminder {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {

    }

    public function get_all_reminders () {
      $db = db_connect();
      $statement = $db->prepare("select * from reminders WHERE user_id = ?;");
      $statement->execute([$_SESSION['user_id']]);
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

   public function create_reminder ($subject) {
      $id = $_SESSION['user_id'];
      $db = db_connect();
      $statement = $db->prepare("insert into reminders (user_id, subject) values (?, ?);");
      $statement->execute([$id, $subject]);
   }

    public function update_reminder ($reminder_id, $subject) {
      $db = db_connect();
      $statement = $db->prepare("UPDATE reminders SET subject = ? WHERE id = ?;");
      $statement->execute([$subject, $reminder_id]);
    }

    public function delete_reminder ($reminder_id) {
      $db = db_connect();
      $statement = $db->prepare("delete from reminders where id = ?;"); 
      $statement->execute([$reminder_id]);
    }
}
?>