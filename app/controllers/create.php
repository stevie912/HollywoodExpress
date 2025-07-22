<?php

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }

  public function new_user(){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $password2 = $_REQUEST['password2'];

    $user = $this->model('User');
    $user->createUser($username, $password, $password2); 
  }
}
