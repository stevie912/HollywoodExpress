<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <br>
                <h1 class="display-1">Hollywood Express</h1>
                <br>
            </div>
            
<!-- display search results --> 
            <div class="col-lg-12 text-center">
                    <p class="display-6 text-center"><?php echo $_SESSION['movie']['Title'] . ' (' . $_SESSION['movie']['Year'] . ')' ?></p>
            </div>
            <div class="col-sm-4">
                    <img src="<?php echo $_SESSION['movie']['Poster']?>" alt="Movie Poster" class="img-fluid">
            </div>
            <div class="col-sm-8">

                    <p class="lead-1">Directed by: <?php echo $_SESSION['movie']['Director']?></p>
                    <p class="lead-1">Starring: <?php echo $_SESSION['movie']['Actors']?></p>
                    <p class="lead-1">Plot: <?php echo $_SESSION['movie']['Plot']?></p>
                    <p class="lead-1">Rated: <?php echo $_SESSION['movie']['Rated']?></p>
                    <p class="lead-1">IMDB Rating (/10): <?php
                        $rating = $_SESSION['movie']['imdbRating'];
                        for ($i = 0; $i < $rating; $i++) {
                            echo "★";
                        } ?>
                    </p>
                    <p class="lead-1">Box office revenue: <?php echo $_SESSION['movie']['BoxOffice']?></p>
             
            </div>

<!-- review button -->            
            <div class="row justify-content-center">
                <div class="col-lg-12 ">
                    <form action="/search/review" method="post">
                        <div class="input-group mb-3">
                            <button class="btn btn-secondary" type="submit" name="title" value="<?php echo $_SESSION['movie']['Title'] ?>">Read a review</button>
                        </div>
                    </form>
                </div>
            </div>
<!-- display review -->
            <div class="col-lg-9 text-center" id="review">
                <?php if (isset($_SESSION['review'])) {
                    echo "<pre>";
                    echo $_SESSION['review'];
                    echo $_SESSION['review']['candidates'][0]['content']['parts'][0]['text'];
                    unset($_SESSION['review']);
                } ?>
            </div>
        </div>


    </div>
</div>


    

<!-- <?php require_once 'app/views/templates/footer.php' ?>
 -->