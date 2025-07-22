<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12 text-center">
                <br>
                <h1 class="display-1">Oh, hey there <?php echo $_SESSION['username'] ?>!</h1>
                <br>
                <p class="display-6">Did you know that today is <?= date("F jS, Y"); ?>?</p>
                <br>
                <p class="lead">Come on in, sit right down (no you're not the first to show),</p>
                <p class="lead">maybe leave yourself a reminder!</p>
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
