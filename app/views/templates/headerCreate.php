<?php
if (isset($_SESSION['pass_mismatch'])) {
  echo "Passwords do not match<br>";
  unset($_SESSION['pass_mismatch']);
}
if (isset($_SESSION['user_exists'])) {
  echo "User already exists<br>"; 
  unset($_SESSION['user_exists']);
}
if (isset($_SESSION['pass_insecure'])) {
  echo "Password must contain at least 8 characters, lower and upper case, and a number<br>";
  unset($_SESSION['pass_insecure']);
}

?>

<!DOCTYPE html>
<html lang="en">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="icon" href="/favicon.png">
    <title>Create new user</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
</head>
<body>