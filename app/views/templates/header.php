
<!DOCTYPE html>
<html lang="en" >
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

        <link rel="icon" href="/favicon.png">
        <title>Hollywood Express</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="description" content="Hollywood Express is a movie search engine that lets you search for movie info, leave a rating for a movie, or discover new favourites.">
        <meta name="author" content="Steve Rhodes"
        <meta name="robots" content="noindex, nofollow"
    </head>
    <body class="text-bg-dark p-3">
    <!-- <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
  <div class="container"> -->
    <nav class="navbar sticky-top navbar-dark bg-dark" data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand" href="/home"><img src="/film-movie-reel-icon4.png" width="130" height="100" alt="Hollywood"></a>
        <!-- <a class="navbar-brand" href="/home"><img src="/chair-director-icon.png" width="100" height="100" alt="Hollywood"></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if (isset($_SESSION['admin'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="/reports">Reports</a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
            <?php if (isset($_SESSION['auth'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
<div class="container">
  <div class="page-header" id="banner">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
              <br>
              <a href="/home" style="text-decoration: none; color: inherit;"><h1 class="display-1" style="font-weight: 700; font-size: 6rem;">Hollywood Express</h1></a>
              <p class="display-6">The movie search and recommendation engine</p>
              <br>
              <br>
              <br>
          </div>