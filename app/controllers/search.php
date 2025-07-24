<?php
class Search extends Controller {

  public function index() {    //do we need this???
     $this->view('search/index');
   }

  public function get() {
    $title = $_REQUEST['title'];
    $api = $this->model('Api');
    $api->getmovie($title); 
  }

  public function reco() {
    $title1 = $_REQUEST['Rtitle1'];
    $title2 = $_REQUEST['Rtitle2'];
    $title3 = $_REQUEST['Rtitle3'];
    $api = $this->model('Api');
    $api->recommend($title1, $title2, $title3);
  }

  public function result() {
    $this->view('search/result');
  }

  public function rate() {
    $rating = $_REQUEST['rating'];
    $title = $_REQUEST['title'];
    $_SESSION['rating'] = $rating;
    $user = $this->model('User');
    $user->rate($title, $rating);
    $this->view('search/result');
  }

  public function review() {
    $title = $_REQUEST['title'];
    $api = $this->model('Api');
    $api->review($title);
    $this->view('/search/result');
  }
}