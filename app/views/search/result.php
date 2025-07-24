<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <br>
                <a href="/home" style="text-decoration: none; color: inherit;"><h1 class="display-1">Hollywood Express</h1></a>    
                <br>
            </div>
            
<!-- display search results --> 
            <div class="col-lg-12 text-center">
                <p class="display-6 text-center"><?php echo $_SESSION['movie']['Title'] . ' (' . $_SESSION['movie']['Year'] . ')' ?></p>
            </div>
            <div class="col-sm-3">
                <img src="<?php echo $_SESSION['movie']['Poster']?>" alt="Movie Poster" class="img-fluid">
            </div>
            <div class="col-sm-9">

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
                <p class="lead-1">Your rating of this movie (/10): <?php 
                    if (isset($_SESSION['rating'])) {
                        for ($i = 0; $i < $_SESSION['rating']; $i++) {
                            echo "★";
                        }
                    } else { ?>
                        <form action="/search/rate" method="post">
                            <input type="number" name="rating" min="1" max="10" step="1">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Rate</button>
                            <input type="hidden" name="title" value="<?php echo $_SESSION['movie']['Title']?>">
                        </form>
                    <?php }
                ?></p>
            </div>

<!-- review section -->
            <div class="col-sm-12 justify-content-center text-center">
<!-- review button -->            
                <div>
                    <form action="/search/review" method="post">
                            <button class="btn btn-secondary" type="submit" name="title" value="<?php echo $_SESSION['movie']['Title'] ?>">Read a review</button>
                    </form>
                    <br>
                </div>
<!-- display review -->
                <div class="col-sm-8 justify-content-center text-center" id="review">
                    <?php if (isset($_SESSION['review'])) { ?>

                        <p class="lead-1"><?php echo $_SESSION['review']['candidates'][0]['content']['parts'][0]['text']; ?></p>
                        
                    <?php unset($_SESSION['review']); } ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
