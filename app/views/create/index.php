<?php require_once 'app/views/templates/headerCreate.php'?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
                <br>
                <h1>Create new user</h1>
                <br>
                <br>
            </div>
        </div>
    </div>

<div class="row justify-content-center">
    <div class="col-sm-auto">
    <form action="/create/new_user" method="post" >
    <fieldset>
      <div class="form-group">
        <label for="username">New username:</label>
        <input required type="text" id="username" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="password">New Password:</label>
        <input required type="password" id="password" class="form-control" name="password">
      </div>
      <div class="form-group">
        <label for="password">Confirm Password:</label>
        <input required type="password" id="password2" class="form-control" name="password2">
       </div>
       <br>
        <button type="submit" value ="submit" class="btn btn-secondary">Submit</button>
    </fieldset>
    </form> 
  </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
