<?php

class Reports extends Controller {

  public function index() {
    $report = $this->model('Report');
    $this->view('reports/index');
  }

  public function report() {
    $type = $_REQUEST['report_type'];
    $report = $this->model('Report');
    $report->report($type);
    $this->view('reports/index');
  }

}

?>