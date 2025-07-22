<?php

class Reminders extends Controller {

  public function index() {
    $reminder = $this->model('Reminder');
    $reminders_list = $reminder->get_all_reminders();
    $this->view('reminders/index', ['reminders_list' => $reminders_list]);
  }

  public function create() {
    $this->view('reminders/create_reminder');
    $reminder = $this->model('Reminder');
  }

  public function create_r() {
    $subject = $_REQUEST['subject'];
    $reminder = $this->model('Reminder');
    $reminder->create_reminder($subject);
    header("Location: /reminders");    
  }

  public function update() {
    $reminder_id = $_REQUEST['reminder_id'];
    $this->view('reminders/update_reminder', ['reminder_id' => $reminder_id]);
    $reminder = $this->model('Reminder');
  }

  public function update_r() {
    $subject = $_REQUEST['subject'];
    $reminder_id = $_REQUEST['reminder_id'];
    $reminder = $this->model('Reminder');
    $reminder->update_reminder($reminder_id, $subject);
    header("Location: /reminders");    
  }

  public function delete() {
    $reminder_id = $_REQUEST['reminder_id'];
    $reminder = $this->model('Reminder');
    $reminder->delete_reminder($reminder_id);
    header("Location: /reminders");    

  }
  
}
?>