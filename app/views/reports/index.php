<?php 
    if ($_SESSION['admin'] != true) {    //user is not admin, deny access
        $_SESSION['denied'] = true;
        header('Location: /home');
    }
    require_once 'app/views/templates/header.php' 
?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="link-secondary">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($_SESSION['controller']); ?></li>
                  </ol>
                </nav>
                <h1>Reports</h1>
                <br>
            </div>
        </div>
    </div>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Choose a report
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="reports/reminders_user">Number of reminders by user</a></li>
        <li><a class="dropdown-item" href="reports/logins_user">Number of logins by user</a></li>
        <li><a class="dropdown-item" href="reports/reminders_all">All reminders</a></li>
      </ul>
    </div>
    <br>




<?php require_once 'app/views/templates/footer.php' ?>
  