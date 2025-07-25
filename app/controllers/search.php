<?php
class Search extends Controller {

  public function index() {    
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
    $api->getmovie($_SESSION['recommendation']['candidates'][0]['content']['parts'][0]['text']);
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
    $type = $_REQUEST['review_type'];
    $api = $this->model('Api');
    $api->review($title, $type);
    $this->view('/search/result');
  }
}