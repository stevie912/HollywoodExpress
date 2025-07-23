<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <br>
                <h1 class="display-1">Hollywood Express</h1>
                <br>
            </div>
            <div>
                <p class="display-6"><?php 
                if (isset($_SESSION['movie'])) {
                    echo "<pre>";
                    print_r ($_SESSION['movie']);
                } ?>                
                </p>
                <br>
            </div>
            <div class="col-lg-12 text-center">
                <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='/home'">See a review of this movie</button>

            </div>
        </div>


    </div>
</div>


    

<!-- <?php require_once 'app/views/templates/footer.php' ?>
 -->