<?php 
    if ($_SESSION['admin'] != true) {    //user is not admin, deny access
        $_SESSION['denied'] = true;
        header('Location: /home');
    }
    require_once 'app/views/templates/header.php' 
?>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

    <div class="col-lg-12 text-center">
        <p class="display-6 text-center">Admin Reports</p>
        <br>
    </div>
    
    <div class="col-sm-12 justify-content-center text-center">
        <form action="/reports/report" method="post">
            <button class="btn btn-secondary mb-3" type="submit" name="ratings" value="ratings">Ratings</button>
            <input type="hidden" name="report_type" value="ratings">
        </form>
        <form action="/reports/report" method="post">
            <button class="btn btn-secondary mb-3" type="submit" name="logins" value="logins">logins</button>
            <input type="hidden" name="report_type" value="logins">
        </form>
    </div>
    <br>
    <br>

<!-- display ratings report -->
    <div class="col-sm-12 justify-content-center text-center">
        <div>
            <?php if (isset($_SESSION['ratings_report'])) { ?>
                <table class="table table-striped">
                    <tr>                                                                                           
                        <th>User</th>
                        <th>Movie</th>
                        <th>Rating</th>
                    </tr>    
                    <?php
                        foreach ($_SESSION['ratings_report'] as $rating) { ?>
                            <tr>    
                                <td><?php echo $rating['user_id'] ?></td>
                                <td><?php echo $rating['movie_title'] ?></td>
                                <td><?php echo $rating['rating'] ?></td>
                            </tr>
                        <?php } ?>
                </table>    
                <?php unset($_SESSION['ratings_report']); } ?>
        </div>

<!-- display logins report -->
        <div class="col-sm-12 justify-content-center text-center">
            <?php if (isset($_SESSION['logins_report'])) { ?>
               <canvas id="loginsChart" style="width:100%;max-width:700px"></canvas>
               <script>
                   var xValues = [<?php foreach ($_SESSION['logins_report'] as $logins_count) { echo "'" . $logins_count['user'] . "',"; } ?>];
                   var yValues = [<?php foreach ($_SESSION['logins_report'] as $logins_count) { echo $logins_count['user_count'] . ","; } ?>];
                   var barColors = ["cyan", "grey","blue","orange","yellow","purple","pink","brown","green","black","white","red","magenta","maroon","lime","navy","olive","teal","silver","gold"];
                   new Chart("loginsChart", {
                       type: "pie",
                       data: {
                           labels: xValues,
                           datasets: [{
                               backgroundColor: barColors,
                               data: yValues
                           }]
                       }
                   });
               </script>
            <?php unset($_SESSION['logins_report']); } ?>
        </div>
    </div>
</div>
</div>
</div>


<?php require_once 'app/views/templates/footer.php' ?>
  