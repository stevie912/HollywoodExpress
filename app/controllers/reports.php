<?php

class Reports extends Controller {

  public function index() {
    $report = $this->model('Report');
    $this->view('reports/index');
  }

  public function reminders_all() {
    $report = $this->model('Report');
    $reminders_list = $report->get_all_reminders();
    $this->view('reports/reminders_all', ['reminders_list' => $reminders_list]);
  }

  public function reminders_user() {
    $report = $this->model('Report');
    $reminders_count = $report->get_reminders_count();
    $this->view('reports/reminders_count', ['reminders_count' => $reminders_count]);
  }

  public function logins_user() {
    $report = $this->model('Report');
    $logins_count = $report->get_logins_count();
    $this->view('reports/logins_count', ['logins_count' => $logins_count]);
  }

}

?>