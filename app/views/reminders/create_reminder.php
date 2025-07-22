<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>New Reminder</h1>

                <div class="row justify-content-center">
                    <div class="col-sm-auto">
                    <form action="/reminders/create_r" method="post" >
                    <fieldset>
                      <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input required type="text" id="subject" class="form-control" name="subject">
                      </div>
                       <br>
                        <button type="submit" value ="submit" class="btn btn bg-primary-subtle">Create Reminder</button>
                    </fieldset>
                    </form> 
                  </div>
                </div>
                
            </div>
        </div>
    </div>



    <?php require_once 'app/views/templates/footer.php' ?>