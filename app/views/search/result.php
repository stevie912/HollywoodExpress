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
            </div>
            <div class="col-lg-12 text-center">
                <form action="/search/review" method="post">
                    <div class="input-group mb-3">
                        <button class="btn btn-secondary" type="submit" name="title" value="<?php echo $_SESSION['movie']['Title'] ?>">Read a review</button>
                    </div>
                </form>

            </div>
            <div id="review">

            </div>
        </div>


    </div>
</div>


    

<!-- <?php require_once 'app/views/templates/footer.php' ?>
 -->