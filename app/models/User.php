<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function test () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function authenticate($username, $password)   {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		$username = strtolower($username);

      $db = db_connect();
      //check user is in database
      $statement = $db->prepare("SELECT * FROM users WHERE username = ?");
      $statement->execute([$username]);

      if ($statement->rowCount() == 0) {  //user not found
        $_SESSION['no_user'] = true;
        $statement = $db->prepare("INSERT INTO logins (username, password, time, result) VALUES (?, ?, ?, ?)");
        $statement->execute([$username, $password, date("Y-m-d H:i:s"), 0]);
        header("Location: /login");

      }

      else {
        //get hashed password from database
        $statement = $db->prepare("SELECT password FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        $statement->bindColumn('password', $valid_password);
        $$valid_password = $statement->fetch(PDO::FETCH_BOUND);

        //get user id from database
        $statement = $db->prepare("SELECT id FROM users WHERE username = :username");
        $statement->bindParam(':username', $username);
        $statement->execute();
        $statement->bindColumn('id', $_SESSION['user_id']);
        $$_SESSION['user_id'] = $statement->fetch(PDO::FETCH_BOUND);


        //check if password is correct
        if (password_verify($password, $valid_password)) {
          $_SESSION['auth'] = true;
          $_SESSION['username'] = $username;
          $statement = $db->prepare("INSERT INTO logins (username, time, result) VALUES (?,  ?, ?)");
          $statement->execute([$username,  date("Y-m-d H:i:s"), 1]);
          if ($username == 'admin') {
            $_SESSION['admin'] = true;
          }
          header("Location: /home");
          die;
        } else {
          if (!isset($_SESSION['failed_attempts'])) {
            $_SESSION['failed_attempts'] = 1;
          } else {
            $_SESSION['failed_attempts'] += 1;
            }

          $statement = $db->prepare("INSERT INTO logins (username, password, time, result) VALUES (?, ?, ?, ?)");
          $statement->execute([$username, $password, date("Y-m-d H:i:s"), 0]);
          
          header("Location: /login");

        }
      }
    }

   public function createUser($username, $password, $password2) {

     //check if passwords entered match
     if ($password != $password2) {
       $_SESSION['pass_mismatch'] = true;
       header("Location: /create");
     } 

     //check password is at least 8 characters long, lower and upper case, and contains a number
     $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
     if (!preg_match($pattern, $password)) {
       $_SESSION['pass_insecure'] = true;
       header("Location: /create");
     }

     $db = db_connect();
     $username = strtolower($username);
     //check if user already exists
     $statement = $db->prepare("SELECT * FROM users WHERE username = ?");  
     $statement->execute([$username]);
     if ($statement->rowCount() > 0) {
       $_SESSION['user_exists'] = true; 
       header("Location: /create");
     }

     else {  //create new user
       $password = password_hash($password, PASSWORD_DEFAULT); 
       $statement = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
       $statement->execute([$username, $password]);
       $_SESSION['user_created'] = true;
       header("Location: /login");
     }
   }

   public function store_contact($email) {
     $db = db_connect();
     $statement = $db->prepare("UPDATE users SET email = ? WHERE id = ?;");
     $statement->execute([$email, $_SESSION['user_id']]);
     $_SESSION['contact_stored'] = true;
     header("Location: /home");
   }
  
}
      

