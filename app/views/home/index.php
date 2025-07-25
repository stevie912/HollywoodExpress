<?php require_once 'app/views/templates/header.php' ?>
                
    <div class="col-sm-6 text-center">
        <p class="lead">Search for a movie:</p>
        <form action="/search/get" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Movie title" aria-label="Movie title" aria-describedby="button-addon2" name="title">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
        <br>
        <br>
    </div>    
        
    <p class="lead text-center">Or, enter the titles of upto three favourite movies and we'll recommend a movie we think you'll like:</p>
    
    <div class="col-sm-6 justify-content-center text-center">
        <form action="/search/reco" method="post">
            <fieldset>
              <div class="form-group mb-3">
                <input required type="text" id="Rtitle1" class="form-control" name="Rtitle1" placeholder="Movie 1">
              </div>
              <div class="form-group mb-3">
                <input type="text" id="Rtitle2" class="form-control" name="Rtitle2" placeholder="Movie 2">
              </div>
              <div class="form-group mb-3">
                <input type="text" id="Rtitle3" class="form-control" name="Rtitle3" placeholder="Movie 3">
              </div>
                <br>
                <button class="btn btn-outline-secondary" onclick="loading()" type="submit" value="submit">
                    <i class="spinner-grow spinner-grow-sm" style="display:none;"></i>
                    <span class="btn-text">Get my next favourite movie</span>
                </button>
            </fieldset>
        </form>
    </div>
                    
        </div>
    </div>
</div>

    <!-- toast for movie not found -->
    <?php if (isset($_SESSION['no_movie'])) { ?>
         <div class="toast show text-grey bg-primary-subtle bg-gradient border-1 position-absolute top-50 start-50 translate-middle" role="alert" aria-live="assertive" aria-atomic="true">
             <div class="toast-body ">
                 Sorry, we were unable to locate that movie. Please check the title or try another.
                 <div class="mt-2 pt-2 border-top">
                     <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">Close</button>
                 </div>
             </div>
         </div>																				 
    <?php unset($_SESSION['no_movie']); } ?>
    
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

<!-- script for recommendation button progress indicator -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function loading() {
          $(".btn .spinner-grow").show();
          $(".btn .btn-text").html("Thinking...");
        }
    </script>
    
<?php require_once 'app/views/templates/footer.php' ?>
