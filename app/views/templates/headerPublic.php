<?php
if (isset($_SESSION['auth']) == 1) {    //user is logged in
    header('Location: /home');
}

if ($_SESSION['failed_attempts'] > 2) {    //lockout after 3 failed login attempts
  unset($_SESSION['failed_attempts']);
  header('Location: /lockout');
} ?>

<!DOCTYPE html>
<html lang="en">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="description" content="web application for COSC 4806 assignment">
    <meta name="author" content="Steve Rhodes"
    <meta name="robots" content="noindex, nofollow"
</head>
<body>
    <!-- toast for denied access -->
    <?php if (isset($_SESSION['denied'])) { ?>
         <div class="toast show text-grey bg-danger bg-gradient border-1 position-absolute top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
             <div class="toast-body ">
                 You are not authorized to access that page.
                 <div class="mt-2 pt-2 border-top">
                     <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">Close</button>
                 </div>
             </div>
         </div>																				 
    <?php unset($_SESSION['denied']); } ?>