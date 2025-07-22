<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Update Reminder</h1>

                <div class="row justify-content-center">
                    <div class="col-sm-auto">
                    <form action="/reminders/update_r" method="post" >
                    <fieldset>
                      <div class="form-group">
                        <label for="subject">New Subject:</label>
                        <input required type="text" id="subject" class="form-control" name="subject">
                        <input type="hidden" name="reminder_id" value="<?php echo $data['reminder_id'];?>">
                      </div>
                       <br>
                        <button type="submit" value ="submit" class="btn bg-primary-subtle">Update  Reminder</button>
                    </fieldset>
                    </form> 
                  </div>
                </div>
                
            </div>
        </div>
    </div>



    <?php require_once 'app/views/templates/footer.php' ?>