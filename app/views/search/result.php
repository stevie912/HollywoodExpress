<?php require_once 'app/views/templates/header.php' ?>
            
<!-- display search results --> 
    <div class="col-lg-12 text-center">
        <p class="display-6 text-center"><?php echo $_SESSION['movie']['Title'] . ' (' . $_SESSION['movie']['Year'] . ')' ?></p>
        <br>
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
        <?php
            $db = db_connect();
            $statement = $db->prepare("SELECT rating FROM ratings WHERE movie_title = ?");
            $statement->execute([$_SESSION['movie']['Title']]);
            $ratings = $statement->fetchAll(PDO::FETCH_ASSOC);
            $total = 0;
            foreach ($ratings as $rating) { 
                $total += $rating['rating'];
            }
            if (count($ratings) != 0) {
                $avg_rating = $total / count($ratings);
            } else {
                $avg_rating = "No ratings yet";
            }
        ?>
        <p class="lead-1">Average Hollywood Express user rating (/10): <?php 
             for ($i = 0; $i < (int)$avg_rating; $i++) {
                 echo "★";
             }
            ?></p>

        <p class="lead-1">Leave a rating for this movie (/10): </p>
                <form action="/search/rate" method="post">
                    <input type="number" name="rating" min="1" max="10" step="1">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Rate</button>
                    <input type="hidden" name="title" value="<?php echo $_SESSION['movie']['Title']?>">
                </form>
    </div>

            

<!-- review section -->
    <div class="col-sm-8 justify-content-center text-center">
<!-- review button -->            
        <div>
            <form action="/search/review" method="post">
                <button class="btn btn-secondary mb-3" id="review" onclick="loading()" type="submit" name="title" value="<?php echo $_SESSION['movie']['Title'] ?>">
                    <i class="spinner-grow spinner-grow-sm" style="display:none;"></i>
                    <span class="btn-text">Read a review</span>
                </button>
                <input type="hidden" name="review_type" value="review">
            </form>
            <form action="/search/review" method="post">
                <button class="btn btn-secondary mb-3" id="grumpy" onclick="loading2()" type="submit" name="title" value="<?php echo $_SESSION['movie']['Title'] ?>">
                    <i class="spinner-grow spinner-grow-sm" id="grumpy" style="display:none;"></i>
                    <span class="btn-text" id="grumpy">Read a grumpy review</span>
                </button>
                <input type="hidden" name="review_type" value="grumpy">
            </form>
            <form action="/search/review" method="post">
                <button class="btn btn-secondary mb-3" id="shakespeare" onclick="loading3()" type="submit" name="title" value="<?php echo $_SESSION['movie']['Title'] ?>">
                    <i class="spinner-grow spinner-grow-sm" id="shakespeare" style="display:none;"></i>
                    <span class="btn-text" id="shakespeare">Read a review by Shakespeare</span>
                </button>
                <input type="hidden" name="review_type" value="shakespeare">
            </form>
            <br>
        </div>
<!-- display review -->
        <div >
            <?php if (isset($_SESSION['review'])) { ?>
                <p class="lead-1" id="target"><?php echo $_SESSION['review']['candidates'][0]['content']['parts'][0]['text']; ?></p>
            <?php unset($_SESSION['review']); } ?>
        </div>
    </div>
            
        </div>
    </div>
</div>

 <!-- script for review button progress indicator -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function loading() {
      $("#review .spinner-grow").show();
      $("#review .btn-text").html("Loading");
    }

    function loading2() {
      $("#grumpy .spinner-grow").show();
      $("#grumpy .btn-text").html("Loading");
    }

    function loading3() {
      $("#shakespeare .spinner-grow").show();
      $("#shakespeare .btn-text").html("Loading");
    }
</script>
<!-- script to scroll to review when it is displayed -->
<script> 
    window.addEventListener('load', function() {
        const targetElement = document.getElementById('target');

        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' }); 
        }
    });
</script>

<?php require_once 'app/views/templates/footer.php' ?>
