<?php

class Contact extends Controller {

  public function index() {
    $this->view('contact/index');
  }

  public function store_contact(){
    $email = $_REQUEST['email'];
    $user = $this->model('User');
    $user->store_contact($email);
  }

}
?>