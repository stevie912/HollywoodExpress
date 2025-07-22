<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row justify-content-center text-center">
            <div class="col-lg-12 text-center">
                <br>
                <h1 class="display-1">Hollywood Express</h1>
                <p class="display-6">The movie search and recommendation engine</p>
                <br>
            </div>
                
            <div class="col-sm-6 text-center">
                <p class="lead">Search a movie title:</p>
                <form action="/search" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Movie title" aria-label="Movie title" aria-describedby="button-addon2" name="title">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
                <br>
                <br>
            </div>    
                
            <p class="lead">Or, enter the titles of three favourite movies and we'll recommend a movie we think you'll like:</p>
            
            <div class="col-sm-6">
                <form action="/recommend" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label for="Rtitle1">Movie 1:</label>
                        <input required type="text" id="Rtitle1" class="form-control" name="Rtitle1">
                      </div>
                      <div class="form-group">
                        <label for="Rtitle2">Movie 2:</label>
                        <input required type="text" id="Rtitle2" class="form-control" name="Rtitle2">
                      </div>
                      <div class="form-group">
                        <label for="Rtitle3">Movie 3:</label>
                        <input required type="text" id="Rtitle3" class="form-control" name="Rtitle3">
                      </div>
                        <br>
                        <button type="submit" value ="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
            </div>
                    
            </div>
        </div>
    </div>


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

    <!-- toast for contact email submitted -->
    <?php if (isset($_SESSION['contact_stored'])) { ?>
         <div class="toast show text-grey bg-primary-subtle bg-gradient border-1 position-absolute top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
             <div class="toast-body ">
                 Email saved. We'll be in touch.
                 <div class="mt-2 pt-2 border-top">
                     <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">Close</button>
                 </div>
             </div>
         </div>																				 
    <?php unset($_SESSION['contact_stored']); } ?>

<?php require_once 'app/views/templates/footer.php' ?>
