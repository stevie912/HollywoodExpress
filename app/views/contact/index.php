<?php require_once 'app/views/templates/header.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Contact </h1>
                <p class="lead ">Don't call us, we'll call you</p>
                <br>
            </div>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-sm-auto">
    <form action="/contact/store_contact" method="post" >
    <fieldset>
      <div class="form-group">
        <label for="email">Your email:</label>
        <input required type="email" id="email" class="form-control" name="email">
      </div>
      <br>
      <button type="submit" value ="submit" class="btn btn-secondary">Submit</button>
    </fieldset>
    </form> 
  </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
